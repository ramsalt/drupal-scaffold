<?php

$your_email = 'your_username@ramsalt.com';

// Disable caches.
$config['system.performance']['css']['preprocess'] = FALSE;
$config['system.performance']['js']['preprocess'] = FALSE;

// Disable AdvAgg
$config['advagg.settings']['enabled'] = FALSE;

$settings['cache']['bins']['render'] = 'cache.backend.null';
$settings['cache']['bins']['page'] = 'cache.backend.null';
$settings['cache']['bins']['dynamic_page_cache'] = 'cache.backend.null';
$settings['cache']['bins']['discovery'] = 'cache.backend.null';

// Enable logging with Monolog to dblog.
// NB: The module monolog and dblog needs to be enabled for this to work.
$settings['container_yamls'][] = 'sites/default/monolog.dblog.services.yml';

// A default value for users' private files path.
$settings['file_private_path'] = 'sites/default/files/private';

/*****************************************************************/
/**                                                             **/
/**     You should not need change anything below this line     **/
/**                                                             **/
/*****************************************************************/

// Load services definition files.
$settings['container_yamls'][] = __DIR__ . '/services.yml';
$settings['container_yamls'][] = DRUPAL_ROOT . '/sites/development.services.yml';

// Overwrite the site config.
$config['system.site']['mail'] = $your_email;

// Enable update.php access even when not being logged in.
$settings['update_free_access'] = TRUE;

// Set a hash for secure one-time login links, cancel links, form tokens, etc.
$settings['hash_salt'] = 'some-very-long-random-string-to-be-changed';

// Enable verbose logging.
$config['system.logging']['error_level'] = 'verbose';

// Do not scan heavily nested frontend related folders.
$settings['extension_discovery_scan_tests'] = TRUE;
$settings['file_scan_ignore_directories'] = [
  'node_modules',
  'bower_components',
  '.sass-cache',
];

// Drupal access settings.
$settings['rebuild_access'] = TRUE;
$settings['skip_permissions_hardening'] = TRUE;
