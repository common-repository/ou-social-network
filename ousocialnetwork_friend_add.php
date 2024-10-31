<?php
if(!defined('ABSPATH')) exit;
$oucode14 = $_POST['nonce'];
if (!wp_verify_nonce($oucode14, 'hy67hgfv'))
{
    wp_die();
}
if(is_user_logged_in())
{
    global $wpdb;
    $idfriend = intval($_POST['idfriend']);

    $ou_sn_table_friendsdel = $wpdb->prefix . "ousocialnetworkfriends";
    $wpdb->update($ou_sn_table_friendsdel,
                  array( 'ousnfriends_status_to' => 1 ),
                  array( 'ousnfriends_id' =>$idfriend));

    $ou_s_n_check_user_idmez3khgdi = get_current_user_id();

    $ou_s_n_check_user_idmez3 = intval($ou_s_n_check_user_idmez3khgdi);

    if(!$ou_s_n_check_user_idmez3 || !$idfriend)
    {
        wp_die();
    }

    echo $uo_sn_friend_maybea3 = mysql_result (mysql_query( "SELECT COUNT(*) FROM  $ou_sn_table_friendsdel  where  ousnfriends_status_from ='1' AND ousnfriends_status_to ='1' AND ( (ousnfriends_from  = '$ou_s_n_check_user_idmez3') OR (ousnfriends_to = '$ou_s_n_check_user_idmez3')) " ),0);
}
?>