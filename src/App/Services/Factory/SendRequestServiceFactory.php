<?php
namespace App\Services\Factory;

use Interop\Container\ContainerInterface, Zend\Expressive\Router\RouterInterface, App\Action\SendRequestAction;

/**
 *
 * @author ghostbyte
 *
 */
class SendRequestServiceFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $router = $container->get(RouterInterface::class);
        $config = $container->get('config');

        return new SendRequestAction($config);
    }
}



