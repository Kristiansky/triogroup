<?php

  namespace Drupal\greeting_message\Form;

  use Drupal\Core\Form\ConfigFormBase;
  use Drupal\Core\Form\FormStateInterface;

  /**
   * Configure example settings for this site.
   */
  class GreetingMessageSettingsForm extends ConfigFormBase {

    /**
     * Config settings.
     *
     * @var string
     */
    const SETTINGS = 'greeting_message.settings';

    /**
     * {@inheritdoc}
     */
    public function getFormId() {
      return 'greeting_message_admin_settings';
    }

    /**
     * {@inheritdoc}
     */
    protected function getEditableConfigNames() {
      return [
        static::SETTINGS,
      ];
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
      $config = $this->config(static::SETTINGS);

      $form['greeting_block_message'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Message'),
        '#description' => $this->t('What do you want to say to your website visitors?'),
        '#default_value' => $config->get('greeting_block_message'),
      ];

      return parent::buildForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
      $this->config(static::SETTINGS)
        ->set('greeting_block_message', $form_state->getValue('greeting_block_message'))
        ->save();

      parent::submitForm($form, $form_state);
    }

  }
