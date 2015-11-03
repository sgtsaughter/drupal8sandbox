<?php

/**
 * @file
 * Contains Drupal\form_example\Form\ConfigForm.
 */

namespace Drupal\form_example\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class ConfigForm.
 *
 * @package Drupal\form_example\Form
 */
class ConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'form_example.config_config'
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'config_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('form_example.config_config');
    $form['first_name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('First Name'),
      '#description' => $this->t('Enter your first name'),
      '#maxlength' => 256,
      '#size' => 40,
      '#default_value' => $config->get('first_name'),
    );
    $form['last_name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Last Name'),
      '#description' => $this->t('Enter your Last Name'),
      '#maxlength' => 256,
      '#size' => 40,
      '#default_value' => $config->get('last_name'),
    );
    $form['dob'] = array(
      '#type' => 'date',
      '#title' => $this->t('DOB'),
      '#description' => $this->t('Enter your DOB'),
      '#default_value' => $config->get('dob'),
    );

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('form_example.config_config')
      ->set('first_name', $form_state->getValue('first_name'))
      ->set('last_name', $form_state->getValue('last_name'))
      ->set('dob', $form_state->getValue('dob'))
      ->save();
  }

}
