<?php

declare(strict_types=1);

namespace BowlOfSoup\CouchbaseAccessLayerBundle;

use BowlOfSoup\CouchbaseAccessLayerBundle\DependencyInjection\CouchbaseAccessLayerExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class CouchbaseAccessLayerBundle extends Bundle
{
    public function getContainerExtension(): ?ExtensionInterface
    {
        return new CouchbaseAccessLayerExtension();
    }
}
