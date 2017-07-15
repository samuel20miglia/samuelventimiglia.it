<?php
namespace App\Services\Factory;

use App\Action\AboutAction, Zend\Expressive\Router\RouterInterface, Interop\Container\ContainerInterface, Zend\Expressive\Template\TemplateRendererInterface;

class AboutPageFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $router   = $container->get(RouterInterface::class);
        $template = ($container->has(TemplateRendererInterface::class))
        ? $container->get(TemplateRendererInterface::class)
        : null;
        $config = $container->get('config');

        return new AboutAction($router,$template,$config);
    }
}
