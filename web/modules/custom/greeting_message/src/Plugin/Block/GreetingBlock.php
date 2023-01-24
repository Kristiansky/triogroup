<?php

  namespace Drupal\hello_world\Plugin\Block;

  use Drupal\Core\Block\BlockBase;
  use Drupal\Core\Form\FormStateInterface;

  /**
   * Provides a 'Greeting' Block.
   *
   * @Block(
   *   id = "greeting_block",
   *   admin_label = @Translation("Hello block"),
   *   category = @Translation("Hello World"),
   * )
   */
  class GreetingBlock extends BlockBase
  {

    /**
     * {@inheritdoc}
     */
    public function build() {
      $config = $this->getConfiguration();

      if (!empty($config['greeting_block_message'])) {
        $message = $config['greeting_block_message'];
      }
      else {
        $message = $this->t('Greetings!');
      }

      return [
        '#markup' => $message,
      ];
    }

    /**
     * {@inheritdoc}
     */
    public function defaultConfiguration() {
      $default_config = \Drupal::config('greeting_message.settings');
      return [
        'greeting_block_message' => $default_config->get('message'),
      ];
    }

    /**
     * {@inheritdoc}
     */
    public function blockForm($form, FormStateInterface $form_state) {
      $form['greeting_block_message'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Message'),
        '#description' => $this->t('What do you want to say to your website visitors?'),
        '#default_value' => $this->configuration['greeting_block_message'],
      ];

      return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function blockSubmit($form, FormStateInterface $form_state) {
      $this->configuration['greeting_block_message'] = $form_state->getValue('greeting_block_message');
    }

  }
