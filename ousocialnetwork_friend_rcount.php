<?php
if(!defined('ABSPATH')) exit;
$oucode13 = $_POST['nonce'];
if (!wp_verify_nonce($oucode13, '59683ghieo'))
{
    wp_die();
}
if(is_user_logged_in())
{
    global $wpdb;
    $ou_s_n_check_user_idmez2 = intval(get_current_user_id());

    if(!$ou_s_n_check_user_idmez2)
    {
        wp_die();
    }

    $ou_sn_table_myprofilexz2 = $wpdb->prefix . "ousocialnetworkfriends";
    echo $uo_sn_friend_maybe2 = mysql_result (mysql_query( "SELECT COUNT(*) FROM $ou_sn_table_myprofilexz2  where  ousnfriends_status_from ='1' AND ousnfriends_status_to ='0' AND ousnfriends_request_to  = '$ou_s_n_check_user_idmez2' " ),0);
}
?>