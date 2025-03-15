<?php

defined('CORE') or (header($_SERVER["SERVER_PROTOCOL"] . " 403 Forbidden") and die('403.14 - Access denied.'));

class CoreConfig {

  private static $instance; // to store the singleton instance
  private static $dbConfigFilename = 'db.ini';
  private $config; // to store the configuration data

  const CONFIG_TYPE_APP       = 'app';
  const CONFIG_TYPE_SHARED    = 'shared';
  const CONFIG_TYPE_RUNTIME   = 'runtime';
  const CONFIG_TYPE_CORE      = 'core';
  const CONFIG_TYPE_CLIENT    = 'client';
  const CONFIG_TYPE_DB        = 'db';
  const CONFIG_TYPE_ALL       = 'all';

  const CONFIG_FILE_TYPE_INI  = 'ini';
  const CONFIG_FILE_TYPE_JSON = 'json';

  public static function instance($coreConfig = null) {
    if (!self::$instance) self::$instance = new CoreConfig($coreConfig);
    return self::$instance;
  }

  private function __construct($coreConfig = null) {
    $this->config = $coreConfig ? $coreConfig : parse_ini_file('core.config.ini', true);
    $this->config[CoreConfig::CONFIG_TYPE_APP] = array();
    $this->loadSharedConfig($this->get('default_config_file', CoreConfig::CONFIG_TYPE_CORE));
  }

  public function loadSharedConfig($filename, $filetype = CoreConfig::CONFIG_FILE_TYPE_INI, $configtype = CoreConfig::CONFIG_TYPE_APP) {
    $configFile = CORE_SHARED_PATH
      . $this->get('core_config_directory', CoreConfig::CONFIG_TYPE_CORE) . DS
      . $filename;
    $appConfig = ($filetype == CoreConfig::CONFIG_FILE_TYPE_INI) ?
      parse_ini_file($configFile) :
      json_decode(file_get_contents($filename));
    if ($appConfig && count($appConfig)) 
      $this->config[$configtype] = array_merge($this->config[$configtype], $appConfig);
    return $this;
  }

  public function loadDatabaseConfig() {
    $sharedDbConfigFile = CORE_SHARED_PATH . CORE_SHARED_CONFIG . self::$dbConfigFilename;
    $appDbConfigFile = CORE_APP_PATH . CORE_APP_CONFIG . self::$dbConfigFilename;
    $moduleDbConfigFile = CORE_MODULE_PATH . CORE_APP_CONFIG . self::$dbConfigFilename;

    if (!file_exists($appDbConfigFile) && !file_exists($sharedDbConfigFile) && !file_exists($moduleDbConfigFile))
      throw CoreError::instance('Database config file: ' . self::$dbConfigFilename . ' does not exists.');

    // build DB configuration data, app-defined config have higher precedence
    $dbConfig = [];
    if (file_exists($sharedDbConfigFile)) $dbConfig = array_merge(parse_ini_file($sharedDbConfigFile, true));
    if (file_exists($appDbConfigFile)) $dbConfig = array_merge(parse_ini_file($appDbConfigFile, true));
    if (file_exists($moduleDbConfigFile)) $dbConfig = array_merge(parse_ini_file($moduleDbConfigFile, true));

    $this->set('dbkeys', $dbConfig, CoreConfig::CONFIG_TYPE_DB);
    return $dbConfig; 
  }

  public function load($filename, $filetype = CoreConfig::CONFIG_FILE_TYPE_INI, $configtype = CoreConfig::CONFIG_TYPE_APP) {
    switch ($configtype) {
      case CoreConfig::CONFIG_TYPE_SHARED:
        // load SHARED config, but store in APP type group
        $this->loadSharedConfig($filename, $filetype, CoreConfig::CONFIG_TYPE_APP);
        break;
      default:
        $configFile = CORE_APP_PATH
          . $this->get('core_config_directory', CoreConfig::CONFIG_TYPE_CORE) . DS
          . $filename;
        if (!file_exists($configFile)) break;
        $appConfig = ($filetype == CoreConfig::CONFIG_FILE_TYPE_INI) ?
          parse_ini_file($configFile) :
          json_decode(file_get_contents($filename));
        if ($appConfig && count($appConfig)) 
          $this->config[$configtype] = array_merge($this->config[$configtype], $appConfig);
    }
    return $this->config[$configtype];
  }

  public function get($key, $type = CoreConfig::CONFIG_TYPE_APP) {
    return isset($this->config[$type][$key]) ? $this->config[$type][$key] : null;
  }

  public function set($key, $value, $configtype = CoreConfig::CONFIG_TYPE_APP) {
    $key = strtolower(preg_replace('/[^a-z0-9]/i', "", $key));
    $this->config[$configtype][$key] = $value;
    return $this;
  }
  
  public function dump($type = CoreConfig::CONFIG_TYPE_APP) {
    if ($type == CoreConfig::CONFIG_TYPE_ALL) return isset($this->config) ? $this->config : null;
    return isset($this->config[$type]) ? $this->config[$type] : null;
  }
}