<?php

namespace Andou;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of App
 *
 * @author andou
 */
class Renderer {

  protected $_config;

  /**
   * 
   * @return \Andou\Renderer
   */
  public static function getInstance() {
    $res = new Renderer();
    $res->setConfig(Inireader\Inireader::getInstance(BASEDIR . "/configs/config.ini", TRUE));
    return $res;
  }

  protected function setConfig($config) {
    $this->_config = $config;
    return $this;
  }

  public function renderPage($name) {
    $out = $this->renderTemplate($name);
    echo $out;
  }

  protected function renderTemplate($template_name, $echo = FALSE) {
    ob_start();
    require $this->getTemplateLocation($template_name);
    $output = ob_get_contents();
    ob_end_clean();
    if ($echo) {
      echo $output;
    }
    return $output;
  }

  protected function getConfig($config) {
    $method = "get" . $config;
    return $this->_config->$method();
  }

  protected function getTemplateLocation($template_name) {
    $folder = $this->_config->getTemplatesFolder();
    return sprintf("%s/%s/%s.phtml", BASEDIR, $folder, $template_name);
  }

}
