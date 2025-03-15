<?php

defined('CORE') or (header($_SERVER["SERVER_PROTOCOL"] . " 403 Forbidden") and die('403.14 - Access denied.'));

class CoreLanguage
{
  private static $instance;
  private static $CORE_LANG; // loaded language entries storage
  private const GENERAL_LANG = "general";
  
  const DEFAULT_LANG_CODE = "en";
  const LOCATION_APP = "asset/lang/";
  const LOCATION_APP_ROOT = "";
  const LOCATION_CORE = ".asset/core/lang/";
  const LOCATION_SHARED = ".shared/lang/";

  function __construct()
  {
    CoreLanguage::$CORE_LANG = array();
  }

  public static function instance($path = null, $langCode = self::DEFAULT_LANG_CODE, $location = CoreLanguage::LOCATION_APP)
  {
    if (CoreLanguage::$instance === null) {
      CoreLanguage::$instance = new CoreLanguage();
      CoreLanguage::$instance->load(self::GENERAL_LANG, CoreLanguage::LOCATION_CORE, self::DEFAULT_LANG_CODE);      
    }
    if ($path) CoreLanguage::$instance->load($path, $langCode, $location);
    return CoreLanguage::$instance;
  }

  /**
   * Load language files, merge language information,
   * and return loaded languages.
   * Fallback to English.
   * @param $path String path to language JSON file
   * @param $basePath String base path to language JSON file relative to /assets
   * @return JSONString loaded languages key-value pairs JSON String
   */
  public function load($path, $location = CoreLanguage::LOCATION_APP, $langCode = "en")
  {
    $langCode = $_SESSION['core-lang'] ?? $langCode;
    $langJson = null;

    if ($location == self::LOCATION_CORE) {

      $warnFlagS = false;
      $warnFlagA = false;
      // echo $path;
      $langPath = CORE_LANG_PATH 
        . trim($path, DS) . ".lang." . self::DEFAULT_LANG_CODE . ".json";
      $codeLangPath = CORE_LANG_PATH 
        . trim($path, DS) . ".lang." . $langCode . ".json";  
      // var_dump($langPath, $codeLangPath);
      if (file_exists($langPath)) {
        $langEntries = (array) json_decode(file_get_contents($langPath));
        CoreLanguage::$CORE_LANG = array_merge(CoreLanguage::$CORE_LANG, $langEntries);
      } else $warnFlagA = true;
      if (file_exists($codeLangPath)) {
        $langEntries = (array) json_decode(file_get_contents($codeLangPath));
        CoreLanguage::$CORE_LANG = array_merge(CoreLanguage::$CORE_LANG, $langEntries);
      } else $warnFlagS = true;
      if ($warnFlagA && $warnFlagS) {
        echo "<!-- Warning: default general language file on: $langPath does not exists. -->\n";
      }
      return CoreLanguage::$CORE_LANG;
    }

    // Force load English version
    $langPath = CORE_APP_PATH . $location . trim($path, DS) . ".lang." . self::DEFAULT_LANG_CODE . ".json";
    $sharedLangPath = CORE_ROOT_PATH . CORE_SHARED_LANG 
      . trim($path, DS) . ".lang." . self::DEFAULT_LANG_CODE . ".json";

    $warnFlagS = false;
    $warnFlagA = false;
    
    if (file_exists($sharedLangPath)) {
      // echo "shared ok";
      $langEntries = (array) json_decode(file_get_contents($sharedLangPath));
      CoreLanguage::$CORE_LANG = array_merge(CoreLanguage::$CORE_LANG, $langEntries);
    } else $warnFlagS = true;
    
    if (file_exists($langPath)) {
      // echo "app ok";
      $langEntries = (array) json_decode(file_get_contents($langPath));
      CoreLanguage::$CORE_LANG = array_merge(CoreLanguage::$CORE_LANG, $langEntries);
    } else $warnFlagA = true;
    
    if ($warnFlagA && $warnFlagS) {
      echo "<!-- Warning: default requested English language file on: $langPath or $sharedLangPath does not exists. -->\n";
    }

    // Load intended language file, replaces the English entries 
    if ($langCode != self::DEFAULT_LANG_CODE) {
      $langPath = CORE_APP_PATH . $location 
        . trim($path, DS) . ".lang." . strtolower(trim($langCode)) . ".json";
      $sharedLangPath = CORE_ROOT_PATH . CORE_SHARED_LANG 
        . trim($path, DS) . ".lang." . strtolower(trim($langCode)) . ".json";

      $warnFlagS = false;
      $warnFlagA = false;
      
      if (file_exists($sharedLangPath)) {
        // echo "shared ok";
        $langEntries = (array) json_decode(file_get_contents($sharedLangPath));
        CoreLanguage::$CORE_LANG = array_merge(CoreLanguage::$CORE_LANG, $langEntries);
      } else $warnFlagS = true;
      
      if (file_exists($langPath)) {
        // echo "app ok";
        $langEntries = (array) json_decode(file_get_contents($langPath));
        CoreLanguage::$CORE_LANG = array_merge(CoreLanguage::$CORE_LANG, $langEntries);
      } else $warnFlagA = true;
      
      if ($warnFlagA && $warnFlagS) {
        echo "<!-- Warning: default requested language file on: $langPath or $sharedLangPath does not exists. -->\n";
      }
  
      // if (file_exists($langPath)) {
      //   $langEntries = (array) json_decode(file_get_contents($langPath));
      //   CoreLanguage::$CORE_LANG = array_merge(CoreLanguage::$CORE_LANG, $langEntries);
      // } else echo "<!-- Warning: requested language file on: $langPath does not exists. -->\n";
    }

    return CoreLanguage::$CORE_LANG;
  }

  public function get($key = '', ...$args)
  {
    // $args = func_get_args();
    // array_shift($args);
    return (isset(CoreLanguage::$CORE_LANG[$key]))
      ? $this->f(CoreLanguage::$CORE_LANG[$key], ...$args)
      : $key;
  }

  static function l(...$args) {
    $ent = CoreLanguage::instance()->get(...$args);
    return $ent;
  }

  private function f(...$args)
  {
    $content = array_shift($args);
    $i = count($args);
    while ($i--)
      $text = preg_replace('/\{' . $i . '\}/i', $args[$i], $content);
    return $text ?? $content;
  }

  public function dump() {
    return CoreLanguage::$CORE_LANG;
  }
}
