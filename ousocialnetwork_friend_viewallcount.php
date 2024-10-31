<?php
if(!defined('ABSPATH')) exit;
$oucode16 = $_POST['nonce'];
if (!wp_verify_nonce($oucode16, 'hjygf45gv'))
{
    wp_die();
}
if(is_user_logged_in())
{
    global $wpdb;
    $ou_sn_table_friendsdel = $wpdb->prefix . "ousocialnetworkfriends";
    $ou_s_n_check_user_idmez3 = intval(get_current_user_id());

    if(!$ou_s_n_check_user_idmez3)
    {
        wp_die();
    }

    echo $uo_sn_friend_maybea3 = mysql_result (mysql_query( "SELECT COUNT(*) FROM  $ou_sn_table_friendsdel  where  ousnfriends_status_from ='1' AND ousnfriends_status_to ='1' AND ( (ousnfriends_from  = '$ou_s_n_check_user_idmez3') OR (ousnfriends_to = '$ou_s_n_check_user_idmez3')) " ),0);
    
}
?>