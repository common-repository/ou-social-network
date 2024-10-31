<?php
/*
Plugin Name: OU Social Network
Plugin URI: http://oleksandrustymenko.com/ousocialnetwork
Description: This is a plugin that allows you to run a small social network on the site. You can add friends and send them messages. Simply enter the [ousocialnetwork] shortcode in a post or page.
Version: 1.0
Author: Oleksandr Ustymenko
Author URI: http://oleksandrustymenko.com
*/

/*  
	Copyright 2016 oleksandr87 (email:ustymenkooleksandrnew@gmail.com)

   This program is free software; you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation; either version 2 of the License, or
   (at your option) any later version.

   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with this program; if not, write to the Free Software
   Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if(!defined('ABSPATH')) exit;
global $jal_db_version;
$jal_db_version = "1.0";

function ousnactivate() 
{
	global $wpdb;
	global $jal_db_version;
    $outablecreate = $wpdb->prefix . "ousocialnetworkprofile";
	if($wpdb->get_var("show tables like '$outablecreate'") != $outablecreate)
	{     
        $sql = "CREATE TABLE " .$outablecreate. " (
		ousocialnetprofile_id INTEGER NOT NULL AUTO_INCREMENT,
		ousocialnetprofile_id_user INTEGER,
		ousocialnetprofile_firstname TEXT,
		ousocialnetprofile_lastname TEXT,
		ousocialnetprofile_avatar TEXT,
		ousocialnetprofile_gender TEXT,
		ousocialnetprofile_email TEXT,
		ousocialnetprofile_interests TEXT,
		ousocialnetprofile_skills TEXT,
		ousocialnetprofile_aboutme TEXT,
		ousocialnetprofile_status TEXT,
        ousocialnetprofile_phone TEXT,
        ousocialnetprofile_skype TEXT,
        ousocialnetprofile_facebook TEXT,
        ousocialnetprofile_twitter TEXT,
        ousocialnetprofile_instagram TEXT,
        ousocialnetprofile_date_register TEXT,
        ousocialnetprofile_date TEXT,
		UNIQUE KEY  (ousocialnetprofile_id));"; 
	  
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
		add_option("jal_db_version", $jal_db_version);  
	}
    
    
    $outablecreatefriends = $wpdb->prefix . "ousocialnetworkfriends";
	if($wpdb->get_var("show tables like '$outablecreatefriends'") != $outablecreatefriends)
	{     
        $sql2 = "CREATE TABLE " .$outablecreatefriends. " (
		ousnfriends_id INTEGER NOT NULL AUTO_INCREMENT,
		ousnfriends_from INTEGER,
        ousnfriends_to INTEGER,
        ousnfriends_status_from INTEGER,
        ousnfriends_status_to INTEGER,
        ousnfriends_request_to INTEGER,    
		UNIQUE KEY (ousnfriends_id));"; 
	  
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql2);
		add_option("jal_db_version", $jal_db_version);  
	}
    
    $outablecreatemessage = $wpdb->prefix . "ousocialnetworkmessage";
	if($wpdb->get_var("show tables like '$outablecreatemessage'") != $outablecreatemessage)
	{     
        $sql2 = "CREATE TABLE " .$outablecreatemessage. " (
		ousnmessage_id INTEGER NOT NULL AUTO_INCREMENT,
		ousnmessage_from INTEGER,
        ousnmessage_to INTEGER,
        ousnmessage_status INTEGER,
        ousnmessage_code INTEGER,
        ousnmessage_message TEXT,
        ousnmessage_date TEXT,    
		UNIQUE KEY (ousnmessage_id));"; 
	  
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql2);
		add_option("jal_db_version", $jal_db_version);  
	}
    
    $outablecreatewall = $wpdb->prefix . "ousocialnetworwall";
	if($wpdb->get_var("show tables like '$outablecreatewall'") != $outablecreatewall)
	{     
        $sql2 = "CREATE TABLE " .$outablecreatewall. " (
		ousocialnetworwall_id INTEGER NOT NULL AUTO_INCREMENT,
		ousocialnetworwall_from INTEGER,
        ousocialnetworwall_to INTEGER,
        ousocialnetworwall_message TEXT,
        ousocialnetworwall_date TEXT,    
		UNIQUE KEY (ousocialnetworwall_id));"; 
	  
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql2);
		add_option("jal_db_version", $jal_db_version);  
	}
}
register_activation_hook(__FILE__,'ousnactivate');

function ousocialnetdeactivate()
{
	global $wpdb;
	$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}ousocialnetworkprofile");
    $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}ousocialnetworkfriends");
    $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}ousocialnetworkmessage");
    $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}ousocialnetworwall");
}
register_uninstall_hook(__FILE__, 'ousocialnetdeactivate');


function ousocialnetwork_file()
{
    wp_register_style('ousimpleprofile-style', plugins_url('ousocialnetwork.css', __FILE__));
	wp_enqueue_style('ousimpleprofile-style');
    
    wp_enqueue_script( 'jquery');
    wp_localize_script( 'jquery', 'ousnajaxcode', 
	array(
   'ousnajax_url'   => admin_url('admin-ajax.php'),
   'ousnajax_nonce' => wp_create_nonce('ousncreatenonce')
	));
    
}


add_action('wp_enqueue_scripts', 'ousocialnetwork_file');

function ousnformresult1()
{	
	require_once( plugin_dir_path(__FILE__).'ousocialnetworkdb1.php');
	exit;
}

add_action( 'wp_ajax_ousnformresult1', 'ousnformresult1' );

function ousnformresult2()
{	
	require_once( plugin_dir_path(__FILE__).'ousocialnetwork_edit.php');
	exit;
}

add_action( 'wp_ajax_ousnformresult2', 'ousnformresult2' );

function ousnformresult3()
{	
	require_once( plugin_dir_path(__FILE__).'ousocialnetwork_uploadimage.php');
	exit;
}

add_action( 'wp_ajax_ousnformresult3', 'ousnformresult3');

function ousnformresult4()
{	
	require_once( plugin_dir_path(__FILE__).'ousocialnetwork_removeimage.php');
	exit;
}

add_action( 'wp_ajax_ousnformresult4', 'ousnformresult4');

function ousnformresult5()
{
	require_once( plugin_dir_path(__FILE__).'ousocialnetwork_upginfo.php');
	exit;
}

add_action( 'wp_ajax_ousnformresult5', 'ousnformresult5');

function ousnformresult6()
{
	require_once( plugin_dir_path(__FILE__).'ousocialnetwork_viewprofile.php');
	exit;
}

add_action( 'wp_ajax_ousnformresult6', 'ousnformresult6');

function ousnformresult7()
{	
	require_once( plugin_dir_path(__FILE__).'ousocialnetwork_search.php');
	exit;
}

add_action( 'wp_ajax_ousnformresult7', 'ousnformresult7');

function ousnformresult8()
{	
	require_once( plugin_dir_path(__FILE__).'ousocialnetwork_search_result.php');
	exit;
}

add_action( 'wp_ajax_ousnformresult8', 'ousnformresult8');

function ousnformresult9()
{	
	require_once( plugin_dir_path(__FILE__).'ousocialnetwork_add_friend.php');
	exit;
}

add_action( 'wp_ajax_ousnformresult9', 'ousnformresult9');

function ousnformresult10()
{	
	require_once( plugin_dir_path(__FILE__).'ousocialnetwork_mymenu_friend.php');
	exit;
}

add_action( 'wp_ajax_ousnformresult10', 'ousnformresult10');

function ousnformresult11()
{	
	require_once( plugin_dir_path(__FILE__).'ousocialnetwork_friend_request.php');
	exit;
}

add_action( 'wp_ajax_ousnformresult11', 'ousnformresult11');

function ousnformresult12()
{	
	require_once( plugin_dir_path(__FILE__).'ousocialnetwork_friend_remove.php');
	exit;
}

add_action( 'wp_ajax_ousnformresult12', 'ousnformresult12');

function ousnformresult13()
{	
	require_once( plugin_dir_path(__FILE__).'ousocialnetwork_friend_rcount.php');
	exit;
}

add_action( 'wp_ajax_ousnformresult13', 'ousnformresult13');

function ousnformresult14()
{
	require_once( plugin_dir_path(__FILE__).'ousocialnetwork_friend_add.php');
	exit;
}
add_action( 'wp_ajax_ousnformresult14', 'ousnformresult14');

function ousnformresult15()
{
	require_once( plugin_dir_path(__FILE__).'ousocialnetwork_friend_viewall.php');
	exit;
}
add_action( 'wp_ajax_ousnformresult15', 'ousnformresult15');

function ousnformresult16()
{
	require_once( plugin_dir_path(__FILE__).'ousocialnetwork_friend_viewallcount.php');
	exit;
}
add_action( 'wp_ajax_ousnformresult16', 'ousnformresult16');

function ousnformresult17()
{
	require_once( plugin_dir_path(__FILE__).'ousocialnetwork_friend_remove2.php');
	exit;
}
add_action( 'wp_ajax_ousnformresult17', 'ousnformresult17');

function ousnformresult18()
{
	require_once( plugin_dir_path(__FILE__).'ousocialnetwork_profile_friendsresult.php');
	exit;
}
add_action( 'wp_ajax_ousnformresult18', 'ousnformresult18');

function ousnformresult19()
{
	require_once( plugin_dir_path(__FILE__).'ousocialnetwork_profilesendmessage.php');
	exit;
}
add_action( 'wp_ajax_ousnformresult19', 'ousnformresult19');

function ousnformresult20()
{
	require_once( plugin_dir_path(__FILE__).'ousocialnetwork_mymessage.php');
	exit;
}
add_action( 'wp_ajax_ousnformresult20', 'ousnformresult20');

function ousnformresult21()
{
	require_once( plugin_dir_path(__FILE__).'ousocialnetwork_message_viewall.php');
	exit;
}
add_action( 'wp_ajax_ousnformresult21', 'ousnformresult21');

function ousnformresult22()
{
	require_once( plugin_dir_path(__FILE__).'ousocialnetwork_message_outbox.php');
	exit;
}
add_action( 'wp_ajax_ousnformresult22', 'ousnformresult22');

function ousnformresult23()
{
	require_once( plugin_dir_path(__FILE__).'ousocialnetwork_message_read.php');
	exit;
}
add_action( 'wp_ajax_ousnformresult23', 'ousnformresult23');

function ousnformresult24()
{
	require_once( plugin_dir_path(__FILE__).'ousocialnetwork_message_send2.php');
	exit;
}
add_action( 'wp_ajax_ousnformresult24', 'ousnformresult24');

function ousnformresult25()
{
	require_once( plugin_dir_path(__FILE__).'ousocialnetwork_message_delete.php');
	exit;
}
add_action( 'wp_ajax_ousnformresult25', 'ousnformresult25');

function ousnformresult26()
{
	require_once( plugin_dir_path(__FILE__).'ousocialnetwork_wall_add.php');
	exit;
}
add_action( 'wp_ajax_ousnformresult26', 'ousnformresult26');

function ousnformresult27()
{
	require_once( plugin_dir_path(__FILE__).'ousocialnetwork_wall_delete.php');
	exit;
}
add_action( 'wp_ajax_ousnformresult27', 'ousnformresult27');

function ousocialnetwork_function()
{
    global $wpdb;
    echo '<div id="ou_socialnetwork_main" style="width:800px; overflow: hidden; min-height:50px; background: #142952;">';
           
        $ou_s_n_check_user = get_current_user_id();
    
        if(is_user_logged_in())
        {    
            require_once( plugin_dir_path(__FILE__).'ousocialnetwork_start.php');
        }
        else
        {
            require_once( plugin_dir_path(__FILE__).'ousocialnetwork_nostart.php');
        }
    
    echo '</div>';
    
    
}

add_shortcode('ousocialnetwork', 'ousocialnetwork_function');

add_action('admin_menu', 'ou_socialnetwork_option_pages');

function ou_socialnetwork_option_pages() 
{
	add_options_page( 'OU Social Network', 'OU Social Network', 'manage_options', 'ou_sn_option', 'ou_socialnetwork_option_function');
}

function ou_socialnetwork_option_function()
{
    $ousnfacebook ="https://www.facebook.com/oleksandrustymenko87";
    $ousntwitter ="https://twitter.com/OUstymenko";
    
    $ou_s_p_filen = plugin_dir_url( __FILE__ );
    $user_twitter = $ou_s_p_filen.'images/twitter.png';
    $user_facebook = $ou_s_p_filen.'images/facebook.png';
    
    echo '<div style="width:648px; margin:5px 5px 0px 5px; color: #f2f2f2; background: #0073e6; text-align:left; overflow: hidden;">';
        echo '<div style="padding:5px 20px 5px 20px; font-size:20px;">';
            echo 'OU Social Network';
        echo '</div>';
    echo '</div>';
    
    echo '<div style="width:646px; margin:0px 5px; border: 1px solid #0073e6; overflow: hidden;">';
        echo '<div style="padding:5px 20px 5px 20px; text-align:right; color:#000000; font-size:20px;">';
            echo '<div style="padding:0px 0px 10px 0px; text-align:justify; font-size:20px; color:#000000;">';
                echo '<b>';
                    echo esc_html('OU Social Network');
                echo '</b>';
                echo esc_html('- This is a plugin that allows you to run a small social network on the site. You can add friends and send them messages.');
                echo '<br />';
                echo '<br />';
                echo esc_html('Simply enter the [ousocialnetwork] shortcode in a post or page.');
            echo '</div>';
            echo '<a href="'.esc_url($ousnfacebook).'"><img src="'.esc_url($user_facebook).'" border="none" style="width:50px; height:50px;"></a>';
            echo ' <a href="'.esc_url($ousntwitter).'"><img src="'.esc_url($user_twitter).'" border="none" style="width:50px; height:50px;"></a>';
        echo '</div>';
    echo '</div>';
}
?>