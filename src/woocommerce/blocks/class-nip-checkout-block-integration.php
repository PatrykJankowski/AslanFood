<?php
class NIP_Checkout_Block_Integration extends \Automattic\WooCommerce\Blocks\Integrations\AbstractIntegration {
    public function get_name() {
        return 'nip-field';
    }

    public function initialize() {
        $this->register_frontend_scripts();
        $this->register_editor_scripts();
        $this->register_block_fields();
    }

    protected function register_block_fields() {
        add_filter('__experimental_woocommerce_blocks_checkout_fields', function($fields) {
            $fields['billing']['billing_nip'] = [
                'label' => __('NIP/VAT Number', 'woocommerce'),
                'required' => false,
                'attributes' => [
                    'placeholder' => __('Enter your VAT number', 'woocommerce')
                ]
            ];
            return $fields;
        });
    }
}