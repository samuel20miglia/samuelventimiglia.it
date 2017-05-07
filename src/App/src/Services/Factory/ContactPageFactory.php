<?php
namespace App\Services\Factory;

use App\Action\ContactAction, Zend\Expressive\Router\RouterInterface, Interop\Container\ContainerInterface, Zend\Expressive\Template\TemplateRendererInterface;


class ContactPageFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $router   = $container->get(RouterInterface::class);
        $template = ($container->has(TemplateRendererInterface::class))
        ? $container->get(TemplateRendererInterface::class)
        : null;
        $config = $container->get('config');

        return new ContactAction($router,$template,$config);
    }
}
