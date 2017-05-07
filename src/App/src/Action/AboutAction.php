<?php
namespace App\Action;

use Psr\Http\Message\ResponseInterface, Psr\Http\Message\ServerRequestInterface, Zend\Diactoros\Response\HtmlResponse, Zend\Expressive\Router, Zend\Expressive\Template,
 Zend\View\Model\ViewModel;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;




 class AboutAction implements MiddlewareInterface
{
    private $router;
    private $template;
    private $config;

    public function __construct(Router\RouterInterface $router, Template\TemplateRendererInterface $template, $config)
    {
        $this->router   = $router;
        $this->template = $template;
        $this->config = $config;
    }

 /**
  * {@inheritDoc}
  * @see \Interop\Http\ServerMiddleware\MiddlewareInterface::process()
  */
 public function process(ServerRequestInterface $request, DelegateInterface $delegate) {

     $delegate->process($request);

     $model = [];
     $model['headTitle']= 'About - samuelventimglia.it';
     $model['pageHeader']= 'About';
     $model['pageContainer']= 'about';

     $layout = new ViewModel($model);
     $layout->setTemplate('layout::pages');

     return new HtmlResponse($this->template->render('app::about', [
         'layout' => $layout
     ]));
 }

}

