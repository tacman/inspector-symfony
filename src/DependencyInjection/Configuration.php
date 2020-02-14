<?php


namespace Inspector\Symfony\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * @inheritDoc
     */
    public function getConfigTreeBuilder()
    {
        $tree = new TreeBuilder('inspector');
        $tree->getRootNode()->children()
            ->booleanNode('enabled')->defaultTrue()->end()
            ->scalarNode('url')->defaultValue('https://ingest.inspector.dev')->end()
            ->scalarNode('api_key')->defaultNull()->end()
            ->booleanNode('unhandled_exceptions')->defaultTrue()->end()
            ->booleanNode('query')->defaultTrue()->end()
            ->booleanNode('query_bindings')->defaultFalse()->end()
            ->booleanNode('user')->defaultTrue()->end()
            ->scalarNode('transport')->defaultValue('sync')->end()
            ->end();

        return $tree;
    }
}
