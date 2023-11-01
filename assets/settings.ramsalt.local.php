<?php

$your_email = 'your_username@ramsalt.com';

// Configure the database credentials. Remove these lines if you are providing.
// the credentials in your root .env file following the .env.example.
//$db_host      = 'mariadb';
//$db_port      = '3306';
//$db_name      = 'drupal';
//$db_user      = 'drupal';
//$db_password  = 'drupal';

// Disable caches.
$config['system.performance']['css']['preprocess'] = FALSE;
$config['system.performance']['js']['preprocess'] = FALSE;

// Disable AdvAgg
$config['advagg.settings']['enabled'] = FALSE;

$settings['cache']['bins']['render'] = 'cache.backend.null';
$settings['cache']['bins']['page'] = 'cache.backend.null';
$settings['cache']['bins']['dynamic_page_cache'] = 'cache.backend.null';

// Enable logging with Monolog to dblog.
// NB: The module monolog and dblog needs to be enabled for this to work.
$settings['container_yamls'][] = 'sites/default/monolog.dblog.services.yml';

// A default value for non-docker users' private files path.
if (!$is_docker4drupal) {
  $settings['file_private_path'] = 'sites/default/files/private';
}

/** Stage file proxy configuration. **/
// Set the real hostname of the site, it will be used for `stage_file_proxy` set it to any "FALSE" value to disable it.
$real_host = 'example.com';
// This is used if the files are not in the typical  structure: sites/{$real_host}/files but in a sites/{$real_host_directory}/files
$real_host_directory = 'default';
// if your online host (in this config: $real_host) has an http authentication authentication set here the info using
// the format: username:password.
// $real_host_access = 'username:password';
$real_host_use_https = TRUE;

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

// Configure mail modules to not send out mails in local environments.
// if ($is_docker4drupal) {
$config['smtp.settings']['smtp_port'] = '1025';
$config['smtp.settings']['smtp_host'] = 'mailhog';
$config['smtp.settings']['smtp_from'] = $your_email;
// }
// else {
$config['smtp.settings']['smtp_reroute_address'] = $your_email;
$config['swiftmailer.transport']['transport'] = 'native';
// }

// Enable update.php access even when not being logged in.
$update_free_access = TRUE;

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


// Stage File Proxy settings. Do not change them, they can be configured on top of the file.
if ($real_host) {
  $real_host_directory = isset($real_host_directory) ? $real_host_directory : $real_host;
  if (isset($real_host_access) )
    $config['stage_file_proxy.settings']['origin'] = ($real_host_use_https ? 'https://' : 'http://').$real_host_access.'@'.$real_host;
  else
    $config['stage_file_proxy.settings']['origin'] = ($real_host_use_https ? 'https://' : 'http://').$real_host;

  $config['stage_file_proxy.settings']['hotlink'] = FALSE;
  $config['stage_file_proxy.settings']['origin_dir'] = 'sites/'.$real_host_directory.'/files';
}

// Configure the database.
$default_db_host      = 'mariadb';
$default_db_port      = '3306';
$default_db_name      = 'drupal';
$default_db_user      = 'drupal';
$default_db_password  = 'drupal';

// Use .env database credential format if provided.
if (empty($db_user) && !empty(getenv('MYSQL_USER'))) {
  $db_user = getenv('MYSQL_USER');
}

if (empty($db_password) && !empty(getenv('MYSQL_PASSWORD'))) {
  $db_password = getenv('MYSQL_PASSWORD');
}
if (empty($db_name) && !empty(getenv('MYSQL_DATABASE'))) {
  $db_name = getenv('MYSQL_DATABASE');
}
if (empty($db_host) && !empty(getenv('MYSQL_HOSTNAME'))) {
  $db_host = getenv('MYSQL_HOSTNAME');
}
if (empty($db_port) && !empty(getenv('MYSQL_PORT'))) {
  $db_port = getenv('MYSQL_PORT');
}

if (empty($db_user)) {
  $db_user = $default_db_user;
  $db_password = $default_db_password;
}
if (empty($db_name)) {
  $db_name = $default_db_name;
}
if (empty($db_host)) {
  $db_host = $default_db_host;
}
if (empty($db_port)) {
  $db_port = $default_db_port;
}

$databases['default']['default'] = array(
  'database' => $db_name,
  'username' => $db_user,
  'password' => $db_password,
  'prefix' => '',
  'host' => $db_host,
  'port' => $db_port,
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
);
