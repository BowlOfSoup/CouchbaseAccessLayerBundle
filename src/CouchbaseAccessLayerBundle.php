<?php

declare(strict_types=1);

namespace BowlOfSoup\CouchbaseAccessLayerBundle;

use BowlOfSoup\CouchbaseAccessLayerBundle\DependencyInjection\CouchbaseAccessLayerExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class CouchbaseAccessLayerBundle extends AbstractBundle
{
    public function getContainerExtension(): ?ExtensionInterface
    {
        return new CouchbaseAccessLayerExtension();
    }
}
