<?php
/**
 * Expressive routed middleware
 */

/** @var \Zend\Expressive\Application $app */
$app->get('/', \App\Action\HomePageAction::class, 'home');
$app->get('/about', \App\Action\AboutAction::class, 'about');
$app->get('/get/resume', \App\Action\ResumeAction::class, 'resume');
$app->get('/portfolio', \App\Action\PortfolioAction::class, 'portfolio');
$app->get('/my/blog', \App\Action\BlogAction::class, 'blog');
$app->get('/my/contacts', \App\Action\ContactAction::class, 'contacts');
$app->post('/send/request', \App\Action\SendRequestAction::class, 'send');
