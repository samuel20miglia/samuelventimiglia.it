<?php
namespace App\Action;

use Psr\Http\Message\ResponseInterface, Psr\Http\Message\ServerRequestInterface, Zend\Diactoros\Response\HtmlResponse, Zend\Expressive\Router, Zend\Expressive\Template,
 Zend\View\Model\ViewModel;




class BlogAction
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
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {



        $model = new ViewModel(['foo' => 'bar']);

        $model->setTemplate('layout/pages');

        $model->setTemplate('layout/pages')->pageHeader = 'Blog';
        $model->setTemplate('layout/pages')->pageContainer = 'blog';
        $model->setTemplate('layout/pages')->headTitle = 'Blog - samuelventimglia.it';
        return new HtmlResponse($this->template->render('app::blog', [
            'layout' => $model
        ]));

    }
}

