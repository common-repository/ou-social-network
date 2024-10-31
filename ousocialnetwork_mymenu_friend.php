<?php if(!defined('ABSPATH')) exit; 
$oucode10 = $_POST['nonce'];
if (!wp_verify_nonce($oucode10, '8ujhg45g'))
{
    wp_die();
}
if(is_user_logged_in())
{
    ?>
    <script>
    function ousnfriends_tab2()
    {
        var formData = new FormData();
        formData.append('action', 'ousnformresult11');
        formData.append('nonce', '<?php echo wp_create_nonce('cdrthkgsx');?>');
        jQuery.ajax({
        type: "post",
        url: ousnajaxcode.ousnajax_url,
        data: formData,
        contentType:false,
        processData:false,
        beforeSend: function() 
        {
            jQuery("#ousnfriendsviewmmyfriends").hide();
            jQuery("#ousnfriendsviewmmyloader").show();
        },
        success: function(html)
        {
            jQuery("#ousnfriendsviewmmyfriends").empty();
            jQuery("#ousnfriendsviewmmyfriends").append(html);
            jQuery("#ousnfriendsviewmmyloader").hide();
            jQuery("#ousnfriendsviewmmyfriends").show();
        }
        });
    }
    </script>

    <script>
    function ousnfriends_tab1()
    {
        var formData = new FormData();
        formData.append('action', 'ousnformresult15');
        formData.append('nonce', '<?php echo wp_create_nonce('2f6g7h8a3');?>');
        jQuery.ajax({
        type: "post",
        url: ousnajaxcode.ousnajax_url,
        data: formData,
        contentType:false,
        processData:false,
        beforeSend: function() 
        {
            jQuery("#ousnfriendsviewmmyfriends").hide();
            jQuery("#ousnfriendsviewmmyloader").show();
        },
        success: function(html)
        {
            jQuery("#ousnfriendsviewmmyfriends").empty();
            jQuery("#ousnfriendsviewmmyfriends").append(html);
            jQuery("#ousnfriendsviewmmyloader").hide();
            jQuery("#ousnfriendsviewmmyfriends").show();
        }
        });
    }
    </script>
    <?php
    echo '<div style="width:800px;  background: #0073e6; text-align:right; overflow: hidden;">';
        echo '<div style="padding:5px 20px 5px 20px; font-size:20px;">';
            echo esc_html('Friends');
        echo '</div>';
    echo '</div>';
    global $wpdb;
    $ou_s_n_check_user_idme2 = intval(get_current_user_id());

    if(!$ou_s_n_check_user_idme2)
    {
        wp_die();
    }

    $ou_sn_table_myprofilex2 = $wpdb->prefix . "ousocialnetworkfriends";
    
    $uo_sn_friend_yes1 = mysql_result (mysql_query( "SELECT COUNT(*) FROM $ou_sn_table_myprofilex2  where ( ( ousnfriends_from = '$ou_s_n_check_user_idme2') OR (ousnfriends_to = '$ou_s_n_check_user_idme2' ) ) AND ousnfriends_status_from ='1' AND ousnfriends_status_to ='1' " ),0);

    $uo_sn_friend_maybe1 = mysql_result (mysql_query( "SELECT COUNT(*) FROM $ou_sn_table_myprofilex2  where  ousnfriends_status_from ='1' AND ousnfriends_status_to ='0' AND ousnfriends_request_to  = '$ou_s_n_check_user_idme2' " ),0);

    if($uo_sn_friend_yes1 == 0 && $uo_sn_friend_maybe1 ==0)
    {
        echo '<div  style="width:800px; font-size:24px; overflow: hidden; min-height:10px; color: #f2f2f2;">';
            echo '<div style="padding:100px 0px 100px 0px; text-align:center;">';
                echo esc_html('You Have 0 Friends!');
            echo '</div>';
        echo '</div>';
    }
    else
    {
        echo '<div style="width:800px; min-height:10px; margin:5px 0px 0px 0px; overflow: hidden;">';
            echo '<div style="padding:5px 5px 5px 5px; text-align:right; font-size:20px; color:#0073e6;">';
                echo '<a href="" onclick="ousnfriends_tab1(); return false;" class="ou_photouser" style="font-size: 20px !important;">'.esc_html('Friends').' (<span id="oufriendssntab1_friends">'.esc_html($uo_sn_friend_yes1).'</span>)</a>'; 
                if($uo_sn_friend_maybe1 >=1)
                {
                    echo ' | <a href="" onclick="ousnfriends_tab2(); return false;" class="ou_photouser" style="font-size: 20px !important;">'.esc_html('Requests').' (<span id="oufriendssntab2_request1">'.esc_html($uo_sn_friend_maybe1).'</span>)</a>'; 
                }
            echo '</div>';
         echo '</div>';
    }

    if($uo_sn_friend_yes1 == 0 && $uo_sn_friend_maybe1 >=1)
    {
        echo '<div id="ousnfriendsviewmmyfriends"  style="width:800px; font-size:24px; overflow: hidden; min-height:100px; color: #f2f2f2;">';
            echo '<div style="padding:100px 0px 100px 0px; text-align:center;">';
                echo esc_html('You Have 0 Friends and ');
                echo esc_html($uo_sn_friend_maybe1);
                echo esc_html(' request(s)!');
            echo '</div>';
        echo '</div>'; 
    }
    else
    {
        echo '<div id="ousnfriendsviewmmyfriends"  style="width:800px; font-size:24px; overflow: hidden; min-height:100px; color: #f2f2f2;">';
            require_once( plugin_dir_path(__FILE__).'ousocialnetwork_friend_viewall2.php');
        echo '</div>';
    }

    echo '<div id="ousnfriendsviewmmyloader"  style="width:800px; display:none; font-size:24px; overflow: hidden; min-height:100px; text-align:center; color: #f2f2f2;">';
        echo '<div style="padding:100px 0px 100px 0px; text-align:center;">';
            $ou_s_p_filet3 = plugin_dir_url( __FILE__ );
            $ou_loadert3 = $ou_s_p_filet3.'images/loader.gif';
            echo '<img src="'.esc_url($ou_loadert3).'" border="none" style="width:74px; height:74px;">';
        echo '</div>';
    echo '</div>'; 
}
?>