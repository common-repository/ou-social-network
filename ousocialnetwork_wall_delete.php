<?php
if(!defined('ABSPATH')) exit;
$oucode27 = $_POST['nonce'];
if (!wp_verify_nonce($oucode27, 'fgv56f4'))
{
    wp_die();
}
if(is_user_logged_in())
{
    global $wpdb;
    $ouidpost = intval($_POST['ouidpost']);

    if(!$ouidpost)
    {
        wp_die();
    }

    $ou_sn_table_wall = $wpdb->prefix . "ousocialnetworwall";

    $wpdb->delete($ou_sn_table_wall, array( 'ousocialnetworwall_id' => $ouidpost ) );
}
?>