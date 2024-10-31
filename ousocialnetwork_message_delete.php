<?php
if(!defined('ABSPATH')) exit;
$oucode25 = $_POST['nonce'];
if (!wp_verify_nonce($oucode25, 'v5hgxws'))
{
    wp_die();
}
if(is_user_logged_in())
{
    global $wpdb;
    $iduser = intval($_POST['iduser']);

    $ou_s_n_check_user_idmenuiu = get_current_user_id();

    $ou_s_n_check_user_idmen = intval($ou_s_n_check_user_idmenuiu);

    if(!$ou_s_n_check_user_idmen || !$iduser)
    {
        wp_die();
    }

    $ou_sn_table_message = $wpdb->prefix . "ousocialnetworkmessage";

    $wpdb->delete($ou_sn_table_message, array( 'ousnmessage_to' => $ou_s_n_check_user_idmen, 'ousnmessage_from' => $iduser, 'ousnmessage_code' => 1 ) );

    $wpdb->delete($ou_sn_table_message, array( 'ousnmessage_to' => $iduser, 'ousnmessage_from' => $ou_s_n_check_user_idmen, 'ousnmessage_code' => 0 ) );
}
?>
