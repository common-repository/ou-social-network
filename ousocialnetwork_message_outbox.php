<?php
if(!defined('ABSPATH')) exit;
$oucode22 = $_POST['nonce'];
if (!wp_verify_nonce($oucode22, 'vrrg34w'))
{
    wp_die();
}
if(is_user_logged_in())
{
    global $wpdb;
    $ou_s_n_check_user_idmen2 = intval(get_current_user_id());

    if(!$ou_s_n_check_user_idmen2)
    {
        wp_die();
    }

    $outable_messagemenu2 = $wpdb->prefix . "ousocialnetworkmessage";

    $uo_sn_message_cncheckcounta2 = mysql_result (mysql_query( "SELECT COUNT(*) FROM  $outable_messagemenu2  where ousnmessage_from ='$ou_s_n_check_user_idmen2' AND ousnmessage_code = 0" ),0);

    if($uo_sn_message_cncheckcounta2 ==0)
    {
        echo '<div style="padding:100px 0px 100px 0px; text-align:center;">';
            echo esc_html('You Have 0 Messages!');
        echo '</div>';
    }

    if($uo_sn_message_cncheckcounta2 >=1)
    {
        require_once( plugin_dir_path(__FILE__).'ousocialnetwork_message_outbox2.php');
    }
}
?>