<?php

  namespace Drupal\greeting_message\Controller;

  use Drupal\Core\Controller\ControllerBase;

    class GreetingController extends ControllerBase {

      /**
       * Config settings.
       *
       * @var string
       */
      const SETTINGS = 'greeting_message.settings';

      public function content() {
        $config = $this->config(static::SETTINGS);
        return [
          '#type' => 'markup',
          '#markup' => $this->t($config->get('greeting_block_message')),
        ];
      }

    }
