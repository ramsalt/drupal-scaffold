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


```json
{
    …
    "require": {
        "ramsalt/drupal-scaffold"
    },
    …
    "extra": {
        "drupal-scaffold": {
            "allowed-packages": [
                "ramsalt/drupal-scaffold"
            ]
        }
    }
}
```