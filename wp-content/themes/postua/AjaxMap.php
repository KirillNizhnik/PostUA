<?php


class AjaxMap
{


    public function __construct()
    {
        wp_enqueue_script('jquery');
        add_action('wp_ajax_get_map_point', array($this, 'ajaxGetMapPoint'));
        add_action('wp_ajax_nopriv_get_map_point', array($this, 'ajaxGetMapPoint'));
    }


    public function ajaxGetMapPoint(): void {
        wp_send_json_success();

        wp_die();
    }


}new AjaxMap();