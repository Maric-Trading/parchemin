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
                ->scalarNode('edit_role')->end()
                ->arrayNode('additional_sitemap_routes')
                    ->scalarPrototype()->end()
                ->end()
                ->booleanNode('allow_raw')->defaultTrue()
                ->end()
            ->end()
        ;
    }

    public function loadExtension(array $config, ContainerConfigurator $containerConfigurator, ContainerBuilder $containerBuilder): void
    {
        $containerConfigurator->import('../config/services.yaml');

        $containerConfigurator->parameters()
            ->set('maric_trading.parchemin.edit_role', $config['edit_role'] ?? 'ROLE_ADMIN')
            ->set('maric_trading.parchemin.additional_sitemap_routes', $config['additional_sitemap_routes'] ?? [])
            ->set('maric_trading.parchemin.allow_raw', $config['allow_raw'] ?? true);
    }
}
