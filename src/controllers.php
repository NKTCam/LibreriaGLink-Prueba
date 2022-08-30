<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

//Request::setTrustedProxies(array('127.0.0.1'));

$app->get('/', function () use ($app) {
   $libro= json_decode(file_get_contents('http://www.etnassoft.com/api/v1/get/?category_id=212&results_range=0,10')); 
   $categoria= json_decode(file_get_contents('http://www.etnassoft.com/api/v1/get/?get_categories=all'));
   
   //echo '<pre>';
   //var_dump (array("categoria"=>$categoria));
   //echo '</pre>';
    return $app['twig']->render('index.html.twig', array("categoria"=>$categoria,"libro"=>$libro));
    
})
->bind('homepage')
;

$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html.twig',
        'errors/'.substr($code, 0, 2).'x.html.twig',
        'errors/'.substr($code, 0, 1).'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
