<?php

declare(strict_types=1);

namespace BowlOfSoup\CouchbaseAccessLayerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('couchbase_access_layer');
        $rootNode
            ->children()
            ->scalarNode('host')->isRequired()->end()
            ->scalarNode('user')->isRequired()->end()
            ->scalarNode('password')->isRequired()->end()
            ->scalarNode('bucket_default')->isRequired()->end()
            ->end()
        ;
        return $treeBuilder;
    }
}