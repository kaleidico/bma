<?php

namespace MailOptin\DripConnect;

use DrewM\Drip\Drip;
use MailOptin\Core\Connections\AbstractConnect;
use MailOptin\Core\PluginSettings\Connections;
use MailOptin\Core\PluginSettings\Settings;
use MailOptin\Core\Repositories\OptinCampaignsRepository;

class AbstractDripConnect extends AbstractConnect
{
    /** @var \MailOptin\Core\PluginSettings\Settings */
    protected $plugin_settings;

    /** @var \MailOptin\Core\PluginSettings\Connections */
    protected $connections_settings;

    public function __construct()
    {
        $this->plugin_settings = Settings::instance();
        $this->connections_settings = Connections::instance();

        parent::__construct();
    }

    /**
     * Is Drip successfully connected to?
     *
     * @return bool
     */
    public static function is_connected()
    {
        $db_options = get_option(MAILOPTIN_CONNECTIONS_DB_OPTION_NAME);

        return !empty($db_options['drip_api_token']) && !empty($db_options['drip_account_id']);
    }

    public function get_integration_data($data_key, $integration_data = [], $default = '')
    {
        if (empty($integration_data) && ! empty($_POST['optin_campaign_id'])) {
            $optin_campaign_id = absint($_POST['optin_campaign_id']);
            $index             = absint($_POST['integration_index']);
            $val = json_decode(OptinCampaignsRepository::get_customizer_value($optin_campaign_id, 'integrations'), true);

            if(isset($val[$index])) {
                $integration_data = $val[$index];
            }
        }

        return parent::get_integration_data($data_key, $integration_data, $default);
    }

    public function get_first_name_custom_field()
    {
        $firstname_key    = 'first_name';
        $db_firstname_key = $this->get_integration_data('DripConnect_first_name_field_key');

        if ( ! empty($db_firstname_key) && $db_firstname_key !== $firstname_key) {
            $firstname_key = $db_firstname_key;
        }

        return apply_filters('mo_connections_drip_firstname_key', $firstname_key);
    }

    public function get_last_name_custom_field()
    {
        $lastname_key    = 'last_name';
        $db_lastname_key = $this->get_integration_data('DripConnect_last_name_field_key');

        if ( ! empty($db_lastname_key) && $db_lastname_key !== $lastname_key) {
            $lastname_key = $db_lastname_key;
        }

        return apply_filters('mo_connections_drip_lastname_key', $lastname_key);
    }

    /**
     * Return instance of drip API class.
     *
     * @throws \Exception
     *
     * @return Drip
     */
    public function drip_instance()
    {
        $api_token = $this->connections_settings->drip_api_token();
        $account_id = $this->connections_settings->drip_account_id();

        if (empty($api_token)) {
            throw new \Exception(__('Drip API Token not found.', 'mailoptin'));
        }

        if (empty($account_id)) {
            throw new \Exception(__('Drip Account ID not found.', 'mailoptin'));
        }

        return new Drip($api_token, $account_id);
    }
}