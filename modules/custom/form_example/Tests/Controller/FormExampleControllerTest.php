<?php

/**
 * @file
 * Contains Drupal\form_example\Tests\FormExampleController.
 */

namespace Drupal\form_example\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Provides automated tests for the form_example module.
 */
class FormExampleControllerTest extends WebTestBase {
  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return array(
      'name' => "form_example FormExampleController's controller functionality",
      'description' => 'Test Unit for module form_example and controller FormExampleController.',
      'group' => 'Other',
    );
  }

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
  }

  /**
   * Tests form_example functionality.
   */
  public function testFormExampleController() {
    // Check that the basic functions of module form_example.
    $this->assertEqual(TRUE, TRUE, 'Test Unit Generated via App Console.');
  }

}
