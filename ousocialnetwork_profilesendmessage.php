<?php
if(!defined('ABSPATH')) exit;
$oucode19 = $_POST['nonce'];
if (!wp_verify_nonce($oucode19, 'ccds34t3ws'))
{
    wp_die();
}
if(is_user_logged_in())
{
    $idusersend = intval($_POST['idusersend']);

    $ou_s_n_check_me = intval(get_current_user_id());

    $outextmessage =  sanitize_text_field($_POST['outextmessage']);

    if(!$outextmessage || !$ou_s_n_check_me || !$idusersend)
    {
        wp_die();
    }

    global $wpdb;
    $ousocialtablemessage = $wpdb->prefix . "ousocialnetworkmessage";
    $oudate1 = current_time('d m Y H:i');

    $wpdb->insert( $ousocialtablemessage, array( 'ousnmessage_from' => $ou_s_n_check_me, 'ousnmessage_to' => $idusersend, 'ousnmessage_message' => $outextmessage, 'ousnmessage_date' => $oudate1, 'ousnmessage_status' => 1, 'ousnmessage_code' => 1) );

    $wpdb->insert( $ousocialtablemessage, array( 'ousnmessage_from' => $ou_s_n_check_me, 'ousnmessage_to' => $idusersend, 'ousnmessage_message' => $outextmessage, 'ousnmessage_date' => $oudate1, 'ousnmessage_status' => 0, 'ousnmessage_code' => 0) );
}
?>