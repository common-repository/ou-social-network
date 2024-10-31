<?php
if(!defined('ABSPATH')) exit;
$oucode9 = $_POST['nonce'];
if (!wp_verify_nonce($oucode9, 'we54fdlse'))
{
    wp_die();
}
if(is_user_logged_in())
{
    $ouidfriend = intval($_POST['ouidfriend']);
    $ouiduser = $ouidfriend;

    global $wpdb;
    $ou_s_n_check_user_idme1 = intval(get_current_user_id());

    if(!$ou_s_n_check_user_idme1 || !$ouiduser)
    {
        wp_die();
    }

    $ou_sn_table_myprofilex1 = $wpdb->prefix . "ousocialnetworkfriends";
    
    $uo_sn_friend_yes = mysql_result (mysql_query( "SELECT COUNT(*) FROM $ou_sn_table_myprofilex1  where ( ( ousnfriends_from = '$ou_s_n_check_user_idme1' AND ousnfriends_to = '$ouiduser' ) OR ( ousnfriends_from = '$ouiduser' AND ousnfriends_to = '$ou_s_n_check_user_idme1' ) ) AND ousnfriends_status_from ='1' AND ousnfriends_status_to ='1' " ),0);

    $uo_sn_friend_maybe = mysql_result (mysql_query( "SELECT COUNT(*) FROM $ou_sn_table_myprofilex1  where ( ( ousnfriends_from = '$ou_s_n_check_user_idme1' AND ousnfriends_to = '$ouiduser' ) OR ( ousnfriends_from = '$ouiduser' AND ousnfriends_to = '$ou_s_n_check_user_idme1' ) ) AND    ( (ousnfriends_status_from ='0' AND ousnfriends_status_to ='1') OR (ousnfriends_status_from ='1' AND ousnfriends_status_to ='0') ) " ),0);

    if($uo_sn_friend_yes == 0 && $uo_sn_friend_maybe == 0)
    {
        $wpdb->insert( $ou_sn_table_myprofilex1, array( 'ousnfriends_from' => $ou_s_n_check_user_idme1, 'ousnfriends_to' => $ouiduser, 'ousnfriends_status_from' =>1, 'ousnfriends_status_to' => 0, 'ousnfriends_request_to' => $ouiduser) );
    }
}
?>