<?php

/**
 * @file
 * Contains Drupal\form_example\Controller\FormExampleController.
 */

namespace Drupal\form_example\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class FormExampleController.
 *
 * @package Drupal\form_example\Controller
 */
class FormExampleController extends FormBase {

  public function getFormId() {
    return 'form_example_form';
  }

  /**
   * Formcreator.
   *
   * @return string
   *   Return Hello string.
   */



  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['name'] = array(
      '#type' => 'textfield',
      '#title' => 'Name',
    );

    $form['tel'] = array(
      '#type' => 'tel',
      '#title' => 'Everything except numbers',
      '#pattern' => '[^\d]*',
    );

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Save'),
    );

    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (strlen($form_state->getValue('tel')) < 3) {
      $form_state->setErrorByName('tel', $this->t('The phone number is too short. Please enter a full phone number.'));
    }
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    drupal_set_message($this->t('Your phone number is @number', array('@number' => $form_state->getValue('tel'))));
  }

}
