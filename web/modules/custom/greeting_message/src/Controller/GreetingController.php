<?php

  namespace Drupal\greeting_message\Controller;

  use Drupal\Core\Controller\ControllerBase;

    class GreetingController extends ControllerBase {

      public function content() {
        return [
          '#type' => 'markup',
          '#markup' => $this->t('Greetings!'),
        ];
      }

    }
