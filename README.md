[![Minimum PHP Version](https://img.shields.io/badge/php-%5E%207.0-blue.svg?no-cache=1)](https://php.net/)
[![Minimum Symfony Version](https://img.shields.io/badge/symfony-%5E%203.4-green.svg)](https://symfony.com/)

- [Installation](#installation)
- [When using parameters.yml](#when-using-parametersyml)
- [Usage of this bundle](#usage-of-this-bundle)

This Symfony bundle is a wrapper around [bowlofsoup/couchbase-access-layer](https://github.com/BowlOfSoup/couchbase-access-layer).
Checkout the README.md of that repository for how to use!

Installation
------------
Require the bundle via composer in your Symfony ^3.4 project.

    composer require bowlofsoup/couchbase-access-layer-bundle

Add the bundle to your `AppKernel.php`.

    $bundles = [
        ...
        new \BowlOfSoup\CouchbaseAccessLayerBundle\CouchbaseAccessLayerBundle()
        ...
    ];

Add the correct parameters in `app/config/config.yml`.

    couchbase_access_layer:
        host:
        user:
        password:
        bucket_default:

When using parameters.yml
-------------------------
If you're working with an additional `app/config/parameters.yml`, put in these parameters.

    couchbase_host:
    couchbase_user:
    couchbase_password:
    couchbase_default_bucket:

Then use/change the following parameters `app/config/config.yml`

    couchbase_access_layer:
        host: %couchbase_host%
        user: %couchbase_user%
        password: %couchbase_password%
        bucket_default: %couchbase_default_bucket%

Usage of this bundle
--------------------
You can use `BowlOfSoup\CouchbaseAccessLayer\Repository\BucketRepository` as dependency for your service.
It will take the 'default' bucket you configured for you to use the query builder on.

See the [README.md](https://github.com/BowlOfSoup/couchbase-access-layer)
of the bowlofsoup/couchbase-access-layer repository on how to use this 'query builder'.

You can also make your own definition of a BucketRepository to use a different bucket than the default you configured.

    my_own_bucket_repository:
        class: BowlOfSoup\CouchbaseAccessBundle\Factory\BucketRepository
        arguments:
            - 'your bucket'
            - '@BowlOfSoup\CouchbaseMigrationsBundle\Factory\ClusterFactory'

This goes in your own `services.yml` definition.