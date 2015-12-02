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
class App {

  /**
   * 
   * @return \Andou\App
   */
  public static function getInstance() {
    return new App();
  }

  public function home() {
    $renderer = Renderer::getInstance();
    $renderer->renderPage("home");
  }

}
