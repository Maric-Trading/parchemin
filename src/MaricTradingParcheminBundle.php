<?php

namespace MaricTrading\Parchemin;



use MaricTrading\Parchemin\Service\ParcheminService;
use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\RouterInterface;

class MaricTradingParcheminBundle extends AbstractBundle {


    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    public function configure(DefinitionConfigurator $definition): void
    {
        $definition->rootNode()
            ->children()
            ->arrayNode('twitter')
            ->children()
            ->integerNode('client_id')->end()
            ->scalarNode('client_secret')->end()
            ->end()
            ->end() // twitter
            ->end()
        ;
    }

    public function loadExtension(array $config, ContainerConfigurator $containerConfigurator, ContainerBuilder $containerBuilder): void
    {
        $containerConfigurator->import('../config/services.yaml');

        $containerConfigurator->parameters()
            ->set('maric_trading.parchemin.twitter.client_id', $config['twitter']['client_id'])
            ->set('maric_trading.parchemin.twitter.client_secret', $config['twitter']['client_secret']);


       /* $containerConfigurator->services()
            ->get(ParcheminService::class)
            ->arg(0, $config['twitter']['client_id'])
            ->arg(1, $config['twitter']['client_secret'])
        ;*/
        // Contrary to the Extension class, the "$config" variable is already merged
        // and processed. You can use it directly to configure the service container.
    /*    var_dump($config);
        var_dump($containerConfigurator->services()->get('maric_trading.parchemin'));
        die();
        $containerConfigurator->services()
            ->get('maric_trading.parchemin.twitter')
            ->arg(0, $config['twitter']['client_id'])
            ->arg(1, $config['twitter']['client_secret'])
        ;*/
    }
}
