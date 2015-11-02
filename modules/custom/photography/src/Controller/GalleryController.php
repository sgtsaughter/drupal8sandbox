<?php

/**
 * @file
 * Contains Drupal\photography\Controller\GalleryController.
 */

namespace Drupal\photography\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class GalleryController.
 *
 * @package Drupal\photography\Controller
 */

class GalleryController extends ControllerBase {
  /**
   * Gallery.
   *
   * @return string
   *   Return Hello string.
   */
  public function gallery() {

    $langcode = $this->languageManager()->getCurrentLanguage('language');
    $photographs = $this->loadAllPhotos();
    $view_mode = 'teaser';
    $gallery = array();

    //Loop through the loaded photograph node objects and output their rendered result into a list.
    $view_builder = $this->entityManager()->getViewBuilder('node');

    foreach ($photographs as $photograph) {
      $gallery[] = $view_builder->view($photograph, $view_mode);
    }

    if(empty($gallery)) {
      return [
        '#type' => 'markup',
        '#markup' => $this->t('Sorry, I have no photographs to share at this moment'),
        '#prefix' => '<h2>',
        '#suffix' => '</h2>',
      ];
    }

    return [
        '#theme' => 'item_list',
        '#items' => $gallery,
    ];
  }

  public function loadAllPhotos($bundle_type = 'photograph') {
    //Return the entity manager service and load the storage instance for nodes.
    //That way we have access to the entity api while keeping our controller lean.
    $storage = $this->entityManager()->getStorage('node');

    //loadByProperties() allows us to query and load entities in one line.
    return $storage->loadByProperties(array(
      'type' => $bundle_type,
      'status' => 1,
    ));
  }

}
