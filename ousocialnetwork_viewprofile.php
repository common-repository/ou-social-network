<?php
if(!defined('ABSPATH')) exit;
$oucode6 = $_POST['nonce'];
$ouiduser = intval($_POST['iduser']);
if (!wp_verify_nonce($oucode6, '2secw45'))
{
    wp_die();
}
	
if(!$ouiduser)
{
    wp_die();
}
if(is_user_logged_in())
{
    global $wpdb;
    $ou_s_n_check_user_idme1 = intval(get_current_user_id());

    if(!$ou_s_n_check_user_idme1)
    {
        wp_die();
    }

    $ou_sn_table_myprofile = $wpdb->prefix . "ousocialnetworkprofile";
    $ou_myprofile_sql = $wpdb->get_results( "SELECT * FROM $ou_sn_table_myprofile where ousocialnetprofile_id_user = $ouiduser AND ousocialnetprofile_firstname !='' AND ousocialnetprofile_lastname !=''");
    foreach ($ou_myprofile_sql as $ou_myprofile_sql1)
    { 
        $ousocialnetprofile_id_a1 = $ou_myprofile_sql1->ousocialnetprofile_id;
        $ousocialnetprofile_id_user_a1 = $ou_myprofile_sql1->ousocialnetprofile_id_user;
        $ousocialnetprofile_firstname_a1 = $ou_myprofile_sql1->ousocialnetprofile_firstname;
        $ousocialnetprofile_lastname_a1 = $ou_myprofile_sql1->ousocialnetprofile_lastname;
        $ousocialnetprofile_avatar_a1 = $ou_myprofile_sql1->ousocialnetprofile_avatar;
        $ousocialnetprofile_gender_a1 = $ou_myprofile_sql1->ousocialnetprofile_gender;
        $ousocialnetprofile_email_a1 = $ou_myprofile_sql1->ousocialnetprofile_email;
        $ousocialnetprofile_interests_a1 = $ou_myprofile_sql1->ousocialnetprofile_interests;
        $ousocialnetprofile_skills_a1 = $ou_myprofile_sql1->ousocialnetprofile_skills;
        $ousocialnetprofile_aboutme_a1 = $ou_myprofile_sql1->ousocialnetprofile_aboutme;
        $ousocialnetprofile_status_a1 = $ou_myprofile_sql1->ousocialnetprofile_status;
        $ousocialnetprofile_phone_a1 = $ou_myprofile_sql1->ousocialnetprofile_phone;
        $ousocialnetprofile_skype_a1 = $ou_myprofile_sql1->ousocialnetprofile_skype;
        $ousocialnetprofile_facebook_a1 = $ou_myprofile_sql1->ousocialnetprofile_facebook;
        $ousocialnetprofile_twitter_a1 = $ou_myprofile_sql1->ousocialnetprofile_twitter;
        $ousocialnetprofile_instagram_a1 = $ou_myprofile_sql1->ousocialnetprofile_instagram;
        $ousocialnetprofile_date_register_a1 = $ou_myprofile_sql1->ousocialnetprofile_date_register;
        $ousocialnetprofile_date_a1 = $ou_myprofile_sql1->ousocialnetprofile_date;
    }

    echo '<div id="ousn_results_activated2" style="width:800px; overflow: hidden; min-height:10px; color: #f2f2f2;">';

        echo '<div style="width:800px; background: #0073e6; text-align:right; overflow: hidden;">';
            echo '<div style="padding:5px 20px 5px 20px; font-size:20px;">';
                echo esc_html($ousocialnetprofile_firstname_a1).' '.esc_html($ousocialnetprofile_lastname_a1);
            echo '</div>';
        echo '</div>';

        echo '<div style="width:800px; min-height:100px; margin:5px 0px 10px 0px; overflow: hidden;">';
        
            echo '<div style="float:left; width:220px; min-height:120px;">';
                require_once( plugin_dir_path(__FILE__).'ousocialnetwork_left.php');
            echo '</div>';

            echo '<div style="float:left; width:580px; min-height:120px;">';
                require_once( plugin_dir_path(__FILE__).'ousocialnetwork_right.php');
            echo '</div>';

        echo '</div>';

    echo '</div>';
}
?>