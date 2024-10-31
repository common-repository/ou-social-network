<?php
if(!defined('ABSPATH')) exit;
$oucode1 = $_POST['nonce'];
if (!wp_verify_nonce($oucode1, 'b45asxt4zwer'))
{
    wp_die();
}
if(is_user_logged_in())
{
    global $wpdb;
    $ou_s_n_check_usersaveinfodb = intval(get_current_user_id());

    $ou_sp_a1_firstname =  sanitize_text_field($_POST['ou_social_add_first_name']);
    $ou_sp_a1_lasttname =  sanitize_text_field($_POST['ou_social_add_last_name']);	

    if(!$ou_s_n_check_usersaveinfodb || !$ou_sp_a1_firstname || !$ou_sp_a1_lasttname)
    {
        wp_die();
    }

    if(!empty($ou_sp_a1_firstname) && !empty($ou_sp_a1_lasttname))
    {
        $ousocialtableprofile1 = $wpdb->prefix . "ousocialnetworkprofile";
    
        $ousocialnetwork_check_user1 =	$wpdb->get_var( "SELECT COUNT(*) FROM $ousocialtableprofile1 where ousocialnetprofile_id_user = $ou_s_n_check_usersaveinfodb " );
    
        if($ousocialnetwork_check_user1 ==0)
        {
            $oustatus1 = 'yes';
            $oudate1 = $blogtime = current_time('d m Y H:i');
            $wpdb->insert( $ousocialtableprofile1, array( 'ousocialnetprofile_id_user' => $ou_s_n_check_usersaveinfodb, 'ousocialnetprofile_status' => $oustatus1, 'ousocialnetprofile_date_register' => $oudate1, 'ousocialnetprofile_firstname' => $ou_sp_a1_firstname, 'ousocialnetprofile_lastname' => $ou_sp_a1_lasttname ) );
        
            require_once( plugin_dir_path(__FILE__).'ousocialnetwork_main.php');
        }
    }
}
?>