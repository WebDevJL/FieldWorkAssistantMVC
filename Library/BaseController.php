<?php

namespace Library;

if (!defined('__EXECUTION_ACCESS_RESTRICTION__'))
  exit('No direct script access allowed');

abstract class BaseController extends ApplicationComponent {

  protected $action = '';
  protected $module = '';
  protected $page = null;
  protected $view = '';
  protected $managers = null;

  public function __construct(Application $app, $module, $action) {
    parent::__construct($app);
    $this->managers = new \Library\DAL\Managers('PDO', $app);
    $this->page = new Page($app);

    $this->setModule($module);
    $this->setAction($action);
    $this->setView($action);
  }

  public function execute() {
    $method = 'execute' . ucfirst($this->action);

    if (!is_callable(array($this, $method))) {
      throw new \RuntimeException('L\'action "' . $this->action . '" n\'est pas définie sur ce module');
    }
    //Get resources for the left menu
    $resx_left_menu = $this->app->i8n->getCommonResourceArray("menu_left");
    //Init left menu
    $leftMenu = new UC\LeftMenu($this->app(), $resx_left_menu);
    //Add left menu to layout
    $this->page->addVar("leftMenu", $leftMenu->Build());

    $br = new UC\Breadcrumb($this->app());
    //Load controller method
    $result = $this->$method($this->app->HttpRequest());
    if ($result !== NULL) {
      $result["br"] = $br->Build();
      echo \Library\HttpResponse::encodeJson($result);
    } else {
      $this->page->addVar("br", $br->Build());
    }
  }

  public function page() {
    return $this->page;
  }

  public function leftMenu() {
    return $this->leftMenu;
  }

  public function setModule($module) {
    if (!is_string($module) || empty($module)) {
      throw new \InvalidArgumentException('Le module doit être une chaine de caractères valide');
    }

    $this->module = $module;
  }

  public function setAction($action) {
    if (!is_string($action) || empty($action)) {
      throw new \InvalidArgumentException('L\'action doit être une chaine de caractères valide');
    }

    $this->action = $action;
  }

  public function setView($view) {
    if (!is_string($view) || empty($view)) {
      throw new \InvalidArgumentException('La vue doit être une chaine de caractères valide');
    }

    $this->view = $view;

    $this->page->setContentFile(
            __ROOT__ . Enums\FolderName::AppsFolderName
            . $this->app->name()
            . Enums\FolderName::ViewsFolderName
            . $this->module
            . '/'
            . $this->view . '.php');
  }

  /**
   * Set the default response from WS
   * 
   * @param string $resxKey
   * @param string $step
   * @param \Applications\PMTool\Models\Dao\Project_manager $user
   * @return aeeay
   */
  public function ManageResponseWS($params = array("resx_file" => "ws_defaults", "resx_key" => "", "step" => "error")) {
    if ($params["step"] === "success") {
      return array(
          "result" => 1,
          "message" => $params["resx_file"] === "ws_defaults" ?
                  $this->app->i8n->getCommonResource($params["resx_file"], "message_success" . $params["resx_key"]) :
                  $this->app->i8n->getLocalResource($params["resx_file"], "message_success" . $params["resx_key"])
      );
    } else {
      return array(
          "result" => 0,
          "message" => $params["resx_file"] === "ws_defaults" ?
                  $this->app->i8n->getCommonResource($params["resx_file"], "message_error" . $params["resx_key"]) :
                  $this->app->i8n->getLocalResource($params["resx_file"], "message_error" . $params["resx_key"])
      );
    }
  }

  /**
   * Set the default response from WS
   * 
   * @param string $resxKey
   * @param string $step
   * @param \Applications\PMTool\Models\Dao\Project_manager $user
   * @return aeeay
   */
  public function UpdateResponseWS($result, $params) {
    if ($params["step"] === "success") {
      $result["result"] = 1;
      $result["message"] = $params["resx_file"] === "ws_defaults" ?
              $this->app->i8n->getCommonResource($params["resx_file"], "message_success" . $params["resx_key"]) :
              $this->app->i8n->getLocalResource($params["resx_file"], "message_success" . $params["resx_key"]);
    } else {
      $result["result"] = 0;
      $result["message"] = $params["resx_file"] === "ws_defaults" ?
              $this->app->i8n->getCommonResource($params["resx_file"], "message_error" . $params["resx_key"]) :
              $this->app->i8n->getLocalResource($params["resx_file"], "message_error" . $params["resx_key"]);
    }
    return $result;
  }

  public function LoadDataIntoForms($data_found) {
    $this->page->addVar("data_to_edit", $data_found);
  }
}
