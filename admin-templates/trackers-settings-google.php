<?php

namespace Mini_Wp_Gdpr;

defined('WPINC') || die();

printf('<h3><span class="dashicons dashicons-google"></span> %s</h3>', esc_html__('Google Analytics', 'mini-wp-gdpr'));

if (is_external_ga_injector_plugin_installed()) {
    // <span class="dashicons dashicons-info"></span>
    printf('<p class="ml-3">%s</p>', esc_html__('Using a third party plugin to inject Google tracker into the HTML.', 'mini-wp-gdpr'));
} else {
    echo '<p class="pp-form-row pp-checkbox">';
    // $props = '';
    // if ($settings->get_bool(OPT_IS_GA_TRACKING_ENABLED)) {
    // 	$props .= ' checked';
    // }

    $control_id = get_next_control_id();
    printf(
        '<input id="%s" name="%s" type="checkbox" %s class="cb-section"/><label for="%s">%s</label>',
        esc_attr($control_id),
        OPT_IS_GA_TRACKING_ENABLED,
        $settings->get_bool(OPT_IS_GA_TRACKING_ENABLED) ? 'checked' : '',
        esc_attr($control_id),
        esc_html__('Add Google Analytics tracker', 'mini-wp-gdpr')
    );
    echo '</p>';

    // $props = '';
    // if (!$settings->get_bool(OPT_IS_GA_TRACKING_ENABLED)) {
    // 	$props = 'style="display:none;"';
    // }
    // printf('<section %s>', $props);

    printf('<section %s class="mt-2 ml-3">', $settings->get_bool(OPT_IS_GA_TRACKING_ENABLED) ? '' : 'style="display:none;"');

    echo '<p class="pp-form-row">';
    $control_id = get_next_control_id();
    printf(
        '<label for="%s">%s</label><span class="pp-help">%s</span><input id="%s" name="%s" type="text" value="%s" />',
        esc_attr($control_id),
        esc_html__('Google Analytics Tracking Code', 'mini-wp-gdpr'),
        esc_html__('e.g. "G-XXXXX" or "UA-XXXXX-X"', 'mini-wp-gdpr'),
        esc_attr($control_id),
        OPT_GA_TRACKING_CODE,
        esc_attr($settings->get_string(OPT_GA_TRACKING_CODE))
    );
    echo '</p>';

    echo '</section>';
}
