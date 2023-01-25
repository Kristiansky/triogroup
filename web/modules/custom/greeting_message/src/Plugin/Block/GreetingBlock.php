<?php

  namespace Drupal\greeting_message\Plugin\Block;

  use Drupal\Core\Block\BlockBase;

  /**
   * Provides a 'Greeting' Block.
   *
   * @Block(
   *   id = "greeting_block",
   *   admin_label = @Translation("Greeting message"),
   *   category = @Translation("Greeting Message"),
   * )
   */
  class GreetingBlock extends BlockBase
  {

    /**
     * {@inheritdoc}
     */
    public function build() {
      $config = \Drupal::config('greeting_message.settings');

      return [
        '#markup' => $this->t($config->get('greeting_block_message')),
      ];
    }

  }
