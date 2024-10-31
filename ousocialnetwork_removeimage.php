<?php
if(!defined('ABSPATH')) exit;
$oucode4 = $_POST['nonce'];
if (!wp_verify_nonce($oucode4, 'cr5fghgts'))
{
    wp_die();
}
if(is_user_logged_in())
{
    global $wpdb;
    $ou_s_n_check_usersaveinfodb3g = get_current_user_id();

    $ou_s_n_check_usersaveinfodb3 = intval(get_current_user_id());

    if(!$ou_s_n_check_usersaveinfodb3)
    {
        wp_die();
    }

    $ou_sn_table_myprofile3 = $wpdb->prefix . "ousocialnetworkprofile";
    $ou_myprofile_sql3 = $wpdb->get_results( "SELECT * FROM $ou_sn_table_myprofile3 where ousocialnetprofile_id_user = $ou_s_n_check_usersaveinfodb3 AND ousocialnetprofile_firstname !='' AND ousocialnetprofile_lastname !=''");
    foreach ($ou_myprofile_sql3 as $ou_myprofile_sql4)
    { 
        $ousocialnetprofile_id_a3 = $ou_myprofile_sql4->ousocialnetprofile_id;
        $ousocialnetprofile_id_user_a3 = $ou_myprofile_sql4->ousocialnetprofile_id_user;
        $ousocialnetprofile_avatar_a3 = $ou_myprofile_sql4->ousocialnetprofile_avatar;
    }
    
    if(!empty($ousocialnetprofile_avatar_a3))
    {
        $ou_sn_upload_dir = wp_upload_dir();
        $ou_sn_upload_start_before = str_replace($ou_sn_upload_dir['baseurl'], "",              $ousocialnetprofile_avatar_a3);
        $ou_nsaz_upload_start = '../../uploads'.$ou_sn_upload_start_before;
			
        if (file_exists($ou_nsaz_upload_start))
        {
            unlink($ou_nsaz_upload_start);
        } 			
    }
    
    $wpdb->update($ou_sn_table_myprofile3,
    array( 'ousocialnetprofile_avatar' => ''),
    array( 'ousocialnetprofile_id_user' =>$ousocialnetprofile_id_user_a3));

    $ou_s_p_filer = plugin_dir_url( __FILE__ );
    $user_logonor = $ou_s_p_filer.'images/nouser.png';

    echo '<img src="'.esc_url($user_logonor).'"  border="none" style="width:195px; height:195px;">';
}
?>