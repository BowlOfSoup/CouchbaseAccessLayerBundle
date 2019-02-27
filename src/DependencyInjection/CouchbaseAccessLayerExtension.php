<?php

declare(strict_types=1);

namespace BowlOfSoup\CouchbaseAccessLayerBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class CouchbaseAccessLayerExtension extends Extension
{
    /**
     * @param array $configs
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     *
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $container->setParameter('couchbase_access_layer.bucket_default', (string) $config['bucket_default']);
        $container->setParameter('couchbase_access_layer.host', (string) $config['host']);
        $container->setParameter('couchbase_access_layer.user', (string) $config['user']);
        $container->setParameter('couchbase_access_layer.password', (string) $config['password']);
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );
        $loader->load('services.yml');
    }
}
