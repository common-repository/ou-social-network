<?php
if(!defined('ABSPATH')) exit;
$oucode17 = $_POST['nonce'];
if (!wp_verify_nonce($oucode17, 'd45gdvwvbrgtnrt'))
{
    wp_die();
}
if(is_user_logged_in())
{
    $ouidfriend = intval($_POST['ouidfriend']);
    global $wpdb;
    $ou_s_n_check_user_idme9bvfg = get_current_user_id();
    $ou_s_n_check_user_idme9 = intval($ou_s_n_check_user_idme9bvfg);

    if(!$ouidfriend || !$ou_s_n_check_user_idme9)
    {
        wp_die();
    }

    $ou_sn_table_friends = $wpdb->prefix . "ousocialnetworkfriends";
    $ousqlfriends = $wpdb->get_results( "SELECT * FROM $ou_sn_table_friends where ousnfriends_status_from ='1' AND ousnfriends_status_to ='1' AND ( (ousnfriends_from  = '$ou_s_n_check_user_idme9' AND ousnfriends_to = '$ouidfriend' ) OR (ousnfriends_to = '$ou_s_n_check_user_idme9' AND ousnfriends_from  ='$ouidfriend')) ");
    foreach ($ousqlfriends as $ousqlfriends1)
    { 
        $ousnfriends_id_a1 = $ousqlfriends1->ousnfriends_id;
        $ousnfriends_from_a1 = $ousqlfriends1->ousnfriends_from;
        $ousnfriends_to_a1 = $ousqlfriends1->ousnfriends_to;
        $ousnfriends_status_from = $ousqlfriends1->ousnfriends_status_from;
        $ousnfriends_status_to = $ousqlfriends1->ousnfriends_status_to;
        $ousnfriends_request_to = $ousqlfriends1->ousnfriends_request_to;

        $wpdb->delete($ou_sn_table_friends, array( 'ousnfriends_id' => $ousnfriends_id_a1 ) );
    }
}
?>