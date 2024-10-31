<?php
if(!defined('ABSPATH')) exit;
$oucode12 = $_POST['nonce'];
if (!wp_verify_nonce($oucode12, 'ddj45slmj'))
{
    wp_die();
}
if(is_user_logged_in())
{
    $idfriend = intval($_POST['idfriend']);

    if(!$idfriend)
    {
        wp_die();
    }

    global $wpdb;
    $ou_sn_table_friendsdel = $wpdb->prefix . "ousocialnetworkfriends";
    $wpdb->delete( $ou_sn_table_friendsdel, array( 'ousnfriends_id' => $idfriend ) );
}
?>