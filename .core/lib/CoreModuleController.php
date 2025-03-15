<?php

abstract class CoreModuleController extends CoreController {

  protected $ui;

  public function __construct() {
    parent::__construct();
    $this->ui = CoreModuleView::instance($this);
  }

  public abstract function preamble();

  public function init($module = null, $controller = null, $controllerId = null, $method = null, $args = array()) {
    Core::lib(Core::CONFIG)
      ->set('module', $module, CoreConfig::CONFIG_TYPE_CLIENT)
      ->set('controller', $controller, CoreConfig::CONFIG_TYPE_CLIENT)
      ->set('controllerId', $controllerId, CoreConfig::CONFIG_TYPE_CLIENT)
      ->set('method', $method, CoreConfig::CONFIG_TYPE_CLIENT);
  }

  protected function menuId($menuId) {
    $config = Core::lib(Core::CONFIG);
    $config->set('menuid', $menuId, CoreConfig::CONFIG_TYPE_APP);
    $config->set('menu', $menuId, CoreConfig::CONFIG_TYPE_CLIENT);
  }


  // private $moduleRuntimeFile = CORE_APP_PATH . "runtime" . DS . "modules.ini";
  
  // protected $menus   = [];
  // protected $modules = [];
  // protected $scripts = [];
  // protected $styles  = [];
  // protected $plugins = [];

  // private $module;
  // private $controller;
  // private $method;

  // public function __construct() {
  //   parent::__construct();
  //   // should be read from runtime file
  //   $defaultLangCode = "jp"; // echo CoreLanguage::DEFAULT_LANG_CODE;
  //   Core::lib(Core::CONFIG)->set('defaultlang', $defaultLangCode, CoreConfig::CONFIG_TYPE_CLIENT);
  //   $this->ui->usePlugin('core-language');
  //   // $this->ui->language('admin', CoreLanguage::LOCATION_APP, $defaultLangCode);
  // }

  // protected function isAppAuthorized($app = null) {
  //   $isAuthorized = CoreAuth::isAppAuthorized($app);
  //   if (!$isAuthorized) {
  //     $this->renderDenied();
  //     exit;
  //   }
  //   return $isAuthorized;
  // }

  // protected function getModules() {
  //   if (file_exists($this->moduleRuntimeFile))
  //     $moduleRuntime = (parse_ini_file($this->moduleRuntimeFile, true));
  //     $this->modules = @$moduleRuntime['modules'] ? $moduleRuntime['modules'] : [];
  // }

  // protected function loadModuleMenus() {
  //   foreach($this->modules as $m) {
  //     $sidebarMenuDefinition = CORE_APP_PATH . "module" . DS . $m . DS . "sidebar.menu.json";
  //     if (file_exists($sidebarMenuDefinition)) 
  //       $this->menus[$m] = json_decode(file_get_contents($sidebarMenuDefinition));
  //   }
  // }

  // private function loadModuleStyles() {
  //   $app = Core::lib(Core::URI)->get(CoreUri::APP);
  //   foreach($this->styles as $s) {
  //     $this->ui->useStyle($s->path, $s->pad, 
  //       $s->assetPath ? $s->assetPath : $app . DS . "module" . DS . $this->module . DS);  
  //   }
  // }

  // private function loadModuleScripts() {
  //   $app = Core::lib(Core::URI)->get(CoreUri::APP);
  //   foreach($this->scripts as $s) {
  //     $this->ui->useScript($s->path, $s->pad, 
  //       $s->assetPath ? $s->assetPath : $app . DS . "module" . DS . $this->module . DS);  
  //   }
  // }



  // protected function render($content = "", $options = []) {
  //   $this->ui->useCoreLib();
  //   $this->ui->usePlugin('core-language', 
  //     'bootstrap', 
  //     'bootstrap-icons', 
  //     'general-ui');
  //   $this->ui->useScript('js/admin.js');
  //   $this->ui->useStyle('css/admin.css');
  //   $this->ui->usePlugin(...$this->plugins);
  //   $this->loadModuleScripts();
  //   $this->loadModuleStyles();
  //   $this->getModules();
  //   $this->loadModuleMenus();
  //   $this->head($options);
  //   echo $content;
  //   $this->foot($options);
  // }

  // protected function renderDenied($message = null, $options = []) {
  //   $this->ui->useCoreLib();
  //   $this->ui->usePlugin('core-language', 
  //     'bootstrap', 
  //     'bootstrap-icons', 
  //     'general-ui');
  //   $this->ui->useScript('js/admin.js');
  //   $this->ui->useStyle('css/admin.css');
  //   $this->ui->usePlugin(...$this->plugins);
  //   $this->loadModuleScripts();
  //   $this->loadModuleStyles();
  //   $this->getModules();
  //   $this->loadModuleMenus();
  //   $this->head($options);
  //   echo $message ? $message : '<div class="card m-5 p-4 fs-4"><span class="card-body"><span class="text-danger">Access denied:</span> Insufficient permission.</span></div>';
  //   $this->foot($options);
  // }

  // protected function view($view, $data = array(), $options = null) {
  //   return $this->ui->view("module" . DS . $this->module . DS . "view" . DS . $view , $data, $options | CoreView::RETURN | CoreView::APP);
  // }

  // // protected function pluginView($key, $data = null, $index = CoreView::ALL_VIEW, $options = CoreView::SHARED) {
  // //   $this->ui->pluginView($key, $data, $index, $options);
  // // }

  // protected function useStyle($path, $pad = null, $assetPath = null) {
  //   $style = new stdClass;
  //   $style->path = $path;
  //   $style->pad = $pad;
  //   $style->assetPath = $assetPath;
  //   $this->styles[] = $style;
  // }

  // protected function useScript($path, $pad = null, $assetPath = null) {
  //   $script = new stdClass;
  //   $script->path = $path;
  //   $script->pad = $pad;
  //   $script->assetPath = $assetPath;
  //   $this->scripts[] = $script;
  // }

  // protected function usePlugin(...$plugins) {
  //   $this->plugins = array_merge($this->plugins, $plugins);
  //   $this->ui->usePlugin(...$plugins);
  // }

  // protected function language($file, $location = CoreLanguage::LOCATION_APP, $langCode = CoreLanguage::DEFAULT_LANG_CODE) {

  // }

}