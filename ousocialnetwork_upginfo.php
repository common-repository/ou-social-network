<?php
if(!defined('ABSPATH')) exit;
$oucode5 = $_POST['nonce'];
if (!wp_verify_nonce($oucode5, 'cdr69mn'))
{
    wp_die();
}
if(is_user_logged_in())
{
    $ou_sn_check_usersaveinfodb = intval(get_current_user_id());

    if(!$ou_sn_check_usersaveinfodb)
    {
        wp_die();
    }

    $ou2_gender =  sanitize_text_field($_POST['ou2_gender']);
	
    if(!$ou2_gender)
    {
	   $ou2_gender = '';
    }
	
    $ou_social_bd =  sanitize_text_field($_POST['ou_social_bd']);
	
    if(!$ou_social_bd)
    {
	   $ou_social_bd = '';
    }

    $ou_social_edit_email =  sanitize_email($_POST['ou_social_edit_email']);
	
    if(!$ou_social_edit_email)
    {
	   $ou_social_edit_email = '';
    }

    $ou_social_edit_phone =  sanitize_text_field($_POST['ou_social_edit_phone']);
	
    if(!$ou_social_edit_phone)
    {
	   $ou_social_edit_phone = '';
    }

    $ou_social_edit_skype =  sanitize_text_field($_POST['ou_social_edit_skype']);
	
    if(!$ou_social_edit_skype)
    {
	   $ou_social_edit_skype = '';
    }

    $ou_social_edit_facebook =  esc_url_raw($_POST['ou_social_edit_facebook']);
	
    if(!$ou_social_edit_facebook)
    {
	   $ou_social_edit_facebook = '';
    }

    $ou_social_edit_twitter =  esc_url_raw($_POST['ou_social_edit_twitter']);
	
    if(!$ou_social_edit_twitter)
    {
	   $ou_social_edit_twitter = '';
    }

    $ou_social_edit_instagram =  esc_url_raw($_POST['ou_social_edit_instagram']);
	
    if(!$ou_social_edit_instagram)
    {
	   $ou_social_edit_instagram = '';
    }

    $ou_social_edit_interest =  sanitize_text_field($_POST['ou_social_edit_interest']);
	
    if(!$ou_social_edit_interest)
    {
	   $ou_social_edit_interest = '';
    }

    $ou_social_edit_skills =  sanitize_text_field($_POST['ou_social_edit_skills']);
	
    if(!$ou_social_edit_skills)
    {
	   $ou_social_edit_skills = '';
    }

    $ou_social_edit_aboutme =  sanitize_text_field($_POST['ou_social_edit_aboutme']);
	
    if(!$ou_social_edit_aboutme)
    {
	   $ou_social_edit_aboutme = '';
    }

    global $wpdb;
    $ou_sn_table_myprofile4 = $wpdb->prefix . "ousocialnetworkprofile";
    $wpdb->update($ou_sn_table_myprofile4,
    array( 'ousocialnetprofile_gender' => $ou2_gender, 'ousocialnetprofile_date' => $ou_social_bd, 'ousocialnetprofile_email' => $ou_social_edit_email, 'ousocialnetprofile_phone' => $ou_social_edit_phone, 'ousocialnetprofile_skype' => $ou_social_edit_skype, 'ousocialnetprofile_facebook' => $ou_social_edit_facebook, 'ousocialnetprofile_twitter' => $ou_social_edit_twitter, 'ousocialnetprofile_instagram' => $ou_social_edit_instagram, 'ousocialnetprofile_interests' => $ou_social_edit_interest, 'ousocialnetprofile_skills' => $ou_social_edit_skills, 'ousocialnetprofile_aboutme' => $ou_social_edit_aboutme ),
    array( 'ousocialnetprofile_id_user' =>$ou_sn_check_usersaveinfodb));
}
?>