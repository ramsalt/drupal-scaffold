<?php

/**
 * @file
 */

declare(strict_types=1);

use DrupalFinder\DrupalFinder;
use DrupalRector\Set\Drupal10SetList;
use DrupalRector\Set\Drupal8SetList;
use DrupalRector\Set\Drupal9SetList;
use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\SetList;

return static function (RectorConfig $rectorConfig): void {
  // Use our own phpstan config.
  $rectorConfig->phpstanConfig(__DIR__ . '/phpstan.neon');

  // Adjust the set lists to be more granular to your Drupal requirements.
  $rectorConfig->sets([
    Drupal10SetList::DRUPAL_10,
    SetList::PHP_83,
  ]);

  $drupalFinder = new DrupalFinder();
  $drupalFinder->locateRoot(__DIR__);
  $drupalRoot = $drupalFinder->getDrupalRoot();
  $rectorConfig->autoloadPaths([
      $drupalRoot . '/core',
      $drupalRoot . '/modules',
      $drupalRoot . '/profiles',
      $drupalRoot . '/themes'
  ]);

  $rectorConfig->skip(['*/upgrade_status/tests/modules/*']);
  $rectorConfig->fileExtensions(['php', 'module', 'theme', 'install', 'profile', 'inc', 'engine']);
  $rectorConfig->importNames(TRUE, FALSE);
  $rectorConfig->importShortClasses(FALSE);
  $rectorConfig->removeUnusedImports();
};
