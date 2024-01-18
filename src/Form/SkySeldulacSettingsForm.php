<?

namespace Drupal\skyseldulac_new\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class ThemeNameSettingsForm extends ConfigFormBase {

    // Le nom de la configuration que vous avez défini dans le fichier .yml
    protected $configName = 'theme_name.settings';

    public function getFormId() {
        return 'theme_name_settings_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state) {
        $config = $this->config($this->configName);

        $form['menu'] = [
            '#type' => 'details',
            '#title' => $this->t('Setting 1'),
            '#default_value' => $config->get('setting_1'),
        ];

        $form['setting_2'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Setting 2'),
            '#default_value' => $config->get('setting_2'),
        ];

        $form['details'] = [
            '#type' => 'details',
            '#title' => $this->t('Menu'),
            '#open' => TRUE,
        ];


        $form['details']['menu'] = [
            '#type' => 'select',
            '#title' => $this->t('Select Field'),
            '#options' => [
                'option_1' => $this->t('Option 1'),
                'option_2' => $this->t('Option 2'),
                'option_3' => $this->t('Option 3'),
            ],
            '#default_value' => $config->get('select_field'),
        ];
        return parent::buildForm($form, $form_state);
    }

    public function submitForm(array &$form, FormStateInterface $form_state) {
        $config = $this->config($this->configName);
        $config->set('setting_1', $form_state->getValue('setting_1'));
        $config->set('setting_2', $form_state->getValue('setting_2'));
        $config->set('menu', $form_state->getValue('menu'));
        $config->save();

        parent::submitForm($form, $form_state);
    }

    protected function getEditableConfigNames() {
        return [$this->configName];
    }
}
