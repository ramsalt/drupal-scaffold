# Ramsalt Drupal Scaffold

Add this project to any Drupal site based on drupal/core-composer-scaffold to enable it for use at Ramsalt.

This project enables the following features:

* Adds `settings.php` for the use in wodby
* Adds settings files for each environment
* Provides `wodby.yml` post deployment scripts
* Enables drupal-patches with an separate `composer.patches.json` file
* Provides the default circleci deployment configuration used at Ramsalt


## Enabling this project

This package must be enabled in the top-level composer.json file, or it will be ignored and will not perform any o
its functions.

1. Add the package in the 'drupal-scaffold' allow-list:

    `composer config extra.drupal-scaffold.allowed-packages --json '["ramsalt/drupal-scaffold"]'`

    **Note**: If you *already have* other packages listed in *drupal-scaffold.allowed-packages* configuration this command is not for you.
    In this case you need to manually add `"ramsalt/drupal-scaffold"` to the array.

2. Require this package as you normally would:

    `composer require ramsalt/drupal-scaffold`


The resulting composer.json should *contain* the following:

```json
{
    "require": {
        "ramsalt/drupal-scaffold": "^1@beta"
    },
    "extra": {
        "drupal-scaffold": {
            "allowed-packages": [
                "ramsalt/drupal-scaffold"
            ]
        }
    }
}
```
