[![Minimum PHP Version](https://img.shields.io/badge/php-%5E%208.3-blue.svg?no-cache=1)](https://php.net/)
[![Minimum Symfony Version](https://img.shields.io/badge/symfony-%5E%207.0-green.svg)](https://symfony.com/)

- [Installation](#installation)
- [When using parameters.yml](#when-using-parametersyml)
- [Usage of this bundle](#usage-of-this-bundle)

This Symfony bundle is a wrapper around [bowlofsoup/couchbase-access-layer](https://github.com/BowlOfSoup/couchbase-access-layer).
Checkout the README.md of that repository on how to use it.

Installation
------------
Require the bundle via composer in your Symfony ^7.0 project.

    composer require bowlofsoup/couchbase-access-layer-bundle

Add the bundle to your `AppKernel.php`.

    $bundles = [
        ...
        new \BowlOfSoup\CouchbaseAccessLayerBundle\CouchbaseAccessLayerBundle()
        ...
    ];

Add the correct parameters in a new file: `config/packages/couchbase_access_layer.yml`.

    couchbase_access_layer:
        host: '%env(COUCHBASE_HOST)%'
        user: '%env(COUCHBASE_USER)%'
        password: '%env(COUCHBASE_PASSWORD)%'
        bucket_default: '%env(COUCHBASE_DEFAULT_BUCKET)%'

Update your .env file
---------------------
Make sure to add the correct configuration values to your .env file:

```
COUCHBASE_HOST="127.0.0.1"
COUCHBASE_USER="couchbase_user"
COUCHBASE_PASSWORD="couchbase_password"
COUCHBASE_DEFAULT_BUCKET="default"
```

Usage of this bundle
--------------------
You can use `BowlOfSoup\CouchbaseAccessLayer\Repository\BucketRepository` as dependency for your service.
It will take the 'default' bucket you configured for you to use the query builder on.

See the [README.md](https://github.com/BowlOfSoup/couchbase-access-layer)
of the bowlofsoup/couchbase-access-layer repository on how to use this 'query builder'.

You can also make your own definition of a BucketRepository to use a different bucket than the default you configured.

    my_own_bucket_repository:
        class: BowlOfSoup\CouchbaseAccessLayer\Repository\BucketRepository
        arguments:
            - 'your bucket'
            - '@BowlOfSoup\CouchbaseAccessLayer\Factory\ClusterFactory'

This goes in your own `services.yml` definition.
