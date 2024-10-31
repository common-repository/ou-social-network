<?php if(!defined('ABSPATH')) exit; 
$oucode20 = $_POST['nonce'];
if (!wp_verify_nonce($oucode20, 's3db689'))
{
    wp_die();
}
if(is_user_logged_in())
{
    ?>
    <script>
    function oumessage_tab1()
    {
        var formData = new FormData();
        formData.append('action', 'ousnformresult21');
        formData.append('nonce', '<?php echo wp_create_nonce('s7fsz35s');?>');
        jQuery.ajax({
        type: "post",
        url: ousnajaxcode.ousnajax_url,
        data: formData,
        contentType:false,
        processData:false,
        beforeSend: function() 
        {
            jQuery("#ousnmymessageview").hide();
            jQuery("#ousnmymessageviewdisplay").hide();
            jQuery("#ousnmymessagesloader").show();
        },
        success: function(html)
        {
            jQuery("#ousnmymessageview").empty();
            jQuery("#ousnmymessageview").append(html);
            jQuery("#ousnmymessagesloader").hide();
            jQuery("#ousnmymessageview").show();
        }
        });
    }
    </script>

    <script>
    function oumessage_tab2()
    {
        var formData = new FormData();
        formData.append('action', 'ousnformresult22');
        formData.append('nonce', '<?php echo wp_create_nonce('vrrg34w');?>');
        jQuery.ajax({
        type: "post",
        url: ousnajaxcode.ousnajax_url,
        data: formData,
        contentType:false,
        processData:false,
        beforeSend: function() 
        {
            jQuery("#ousnmymessageview").hide();
            jQuery("#ousnmymessageviewdisplay").hide();
            jQuery("#ousnmymessagesloader").show();
        },
        success: function(html)
        {
            jQuery("#ousnmymessageview").empty();
            jQuery("#ousnmymessageview").append(html);
            jQuery("#ousnmymessagesloader").hide();
            jQuery("#ousnmymessageview").show();
        }
        });
    }
    </script>
    <?php
    global $wpdb;
    $ou_s_n_check_user_idmen = intval(get_current_user_id());

    if(!$ou_s_n_check_user_idmen)
    {
        wp_die();
    }

    $outable_messagemenu1 = $wpdb->prefix . "ousocialnetworkmessage";

    $uo_sn_message_cncheckcount1 = mysql_result (mysql_query( "SELECT COUNT(*) FROM        $outable_messagemenu1  where ousnmessage_to ='$ou_s_n_check_user_idmen'" ),0);

    echo '<div style="width:800px;  background: #0073e6; text-align:right; overflow: hidden;">';
        echo '<div style="padding:5px 20px 5px 20px; font-size:20px;">';
            echo esc_html('Messages');
        echo '</div>';
    echo '</div>';

    echo '<div style="width:800px; min-height:10px; margin:5px 0px 0px 0px; overflow: hidden;">';
        echo '<div style="padding:5px 5px 5px 5px; text-align:right; font-size:20px; color:#0073e6;">';
            echo '<a href="" onclick="oumessage_tab1(); return false;" class="ou_photouser" style="font-size: 20px !important;">'.esc_html('Inbox').'</a>'; 
            echo ' | <a href="" onclick="oumessage_tab2(); return false;" class="ou_photouser" style="font-size: 20px !important;">'.esc_html('Outbox').'</a>'; 
        echo '</div>';
    echo '</div>';

    if($uo_sn_message_cncheckcount1 == 0)
    {
        echo '<div id="ousnmymessageview"  style="width:800px; font-size:24px; overflow: hidden; min-height:100px; color: #f2f2f2;">';
            echo '<div style="padding:100px 0px 100px 0px; text-align:center;">';
                echo esc_html('You Have 0 Messages!');
            echo '</div>';
        echo '</div>';
    
        echo '<div id="ousnmymessageviewdisplay"  style="width:800px; display:none; font-size:24px; overflow: hidden; min-height:100px; color: #f2f2f2;">';
        echo '</div>';
    }
    if($uo_sn_message_cncheckcount1 >=1)
    {
        echo '<div id="ousnmymessageview"  style="width:800px; font-size:24px; overflow: hidden; min-height:100px; color: #f2f2f2;">';
            require_once( plugin_dir_path(__FILE__).'ousocialnetwork_message_viewall2.php');
        echo '</div>';
    
        echo '<div id="ousnmymessageviewdisplay"  style="width:800px; display:none; font-size:24px; overflow: hidden; min-height:100px; color: #f2f2f2;">';
        echo '</div>';
    }

    echo '<div id="ousnmymessagesloader"  style="width:800px; display:none; font-size:24px; overflow: hidden; min-height:100px; text-align:center; color: #f2f2f2;">';
        echo '<div style="padding:100px 0px 100px 0px; text-align:center;">';
            $ou_s_p_filet83 = plugin_dir_url( __FILE__ );
            $ou_loadert83 = $ou_s_p_filet83.'images/loader.gif';
            echo '<img src="'.esc_url($ou_loadert83).'" border="none" style="width:74px; height:74px;">';
        echo '</div>';
    echo '</div>'; 
}
?>