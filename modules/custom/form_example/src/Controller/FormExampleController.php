<?php

/**
 * @file
 * Contains Drupal\form_example\Controller\FormExampleController.
 */

namespace Drupal\form_example\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class FormExampleController.
 *
 * @package Drupal\form_example\Controller
 */
class FormExampleController extends ControllerBase {
  /**
   * Formcreator.
   *
   * @return string
   *   Return Hello string.
   */
  public function formCreator() {
    return [
        '#type' => 'markup',
        '#markup' => $this->t('Implement method: formCreator')
    ];
  }

}
