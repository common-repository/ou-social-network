<?php
if(!defined('ABSPATH')) exit;
if(is_user_logged_in())
{
    global $wpdb;
    $ou_s_n_check_user_idme = intval(get_current_user_id());

    if(!$ou_s_n_check_user_idme)
    {
        wp_die();
    }

    $ou_sn_table_myprofile = $wpdb->prefix . "ousocialnetworkprofile";
    $ou_myprofile_sql = $wpdb->get_results( "SELECT * FROM $ou_sn_table_myprofile where ousocialnetprofile_id_user = $ou_s_n_check_user_idme AND ousocialnetprofile_firstname !='' AND ousocialnetprofile_lastname !=''");
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

    $ou_sn_table_scfriends = $wpdb->prefix . "ousocialnetworkfriends";
    $uo_sn_friend_cncheckcount = mysql_result (mysql_query( "SELECT COUNT(*) FROM  $ou_sn_table_scfriends  where  ousnfriends_status_from ='1' AND ousnfriends_status_to ='0' AND ousnfriends_request_to  = '$ou_s_n_check_user_idme' " ),0);
    if($uo_sn_friend_cncheckcount >=1)
    {
        $ousnmenucountfriend = ' (<span id="oufriendssntab2_request">'.esc_html($uo_sn_friend_cncheckcount).'</span>)';
    }

    $outable_messagemenu = $wpdb->prefix . "ousocialnetworkmessage";
    $uo_sn_message_cncheckcount = mysql_result (mysql_query( "SELECT COUNT(*) FROM  $outable_messagemenu  where ousnmessage_to ='$ou_s_n_check_user_idme' AND ousnmessage_status = '1' " ),0);
    if($uo_sn_message_cncheckcount >=1)
    {
        $ousnmenumessagecount = ' (<span id="ousnmessagecount3">'.esc_html($uo_sn_message_cncheckcount).'</span>)';
    }
    ?>
    <script>
    function ousn_editprofile()
    {
        var formData = new FormData();
        formData.append('action', 'ousnformresult2');
        formData.append('nonce', '<?php echo wp_create_nonce('v6gttd32f');?>');
        jQuery.ajax({
        type: "post",
        url: ousnajaxcode.ousnajax_url,
        data: formData,
        contentType:false,
        processData:false,
        beforeSend: function() 
        {
            jQuery("#ousn_results_activated2").hide();
            jQuery("#on_sn_addnoact_loader2").show();
        },
        success: function(html)
        {
            jQuery("#ousn_results_activated2").empty();
            jQuery("#ousn_results_activated2").append(html);
            jQuery("#on_sn_addnoact_loader2").hide();
            jQuery("#ousn_results_activated2").show();
        }
        });
    }
    </script>

    <script>
    function ousn_myprofile()
    {
        var formData = new FormData();
        formData.append('iduser', '<?php echo $ou_s_n_check_user_idme;?>');
        formData.append('action', 'ousnformresult6');
        formData.append('nonce', '<?php echo wp_create_nonce('2secw45');?>');
        jQuery.ajax({
        type: "post",
        url: ousnajaxcode.ousnajax_url,
        data: formData,
        contentType:false,
        processData:false,
        beforeSend: function() 
        {
            jQuery("#ousn_results_activated2").hide();
            jQuery("#on_sn_addnoact_loader2").show();
        },
        success: function(html)
        {
            jQuery("#ousn_results_activated2").empty();
            jQuery("#ousn_results_activated2").append(html);
            jQuery("#on_sn_addnoact_loader2").hide();
            jQuery("#ousn_results_activated2").show();
        }
        });
    }
    </script>

    <script>
    function ousn_searchprofile()
    {
        var formData = new FormData();
        formData.append('action', 'ousnformresult7');
        formData.append('nonce', '<?php echo wp_create_nonce('b6fd345f');?>');
        jQuery.ajax({
        type: "post",
        url: ousnajaxcode.ousnajax_url,
        data: formData,
        contentType:false,
        processData:false,
        beforeSend: function() 
        {
            jQuery("#ousn_results_activated2").hide();
            jQuery("#on_sn_addnoact_loader2").show();
        },
        success: function(html)
        {
            jQuery("#ousn_results_activated2").empty();
            jQuery("#ousn_results_activated2").append(html);
            jQuery("#on_sn_addnoact_loader2").hide();
            jQuery("#ousn_results_activated2").show();
        }
        });
    }
    </script>

    <script>
    function ousn_myfriendsmenu()
    {
        var formData = new FormData();
        formData.append('action', 'ousnformresult10');
        formData.append('nonce', '<?php echo wp_create_nonce('8ujhg45g');?>');
        jQuery.ajax({
        type: "post",
        url: ousnajaxcode.ousnajax_url,
        data: formData,
        contentType:false,
        processData:false,
        beforeSend: function() 
        {
            jQuery("#ousn_results_activated2").hide();
            jQuery("#on_sn_addnoact_loader2").show();
        },
        success: function(html)
        {
            jQuery("#ousn_results_activated2").empty();
            jQuery("#ousn_results_activated2").append(html);
            jQuery("#on_sn_addnoact_loader2").hide();
            jQuery("#ousn_results_activated2").show();
        }
        });
    }
    </script>

    <script>
    function ousn_mymessagesmenu()
    {
        var formData = new FormData();
        formData.append('action', 'ousnformresult20');
        formData.append('nonce', '<?php echo wp_create_nonce('s3db689');?>');
        jQuery.ajax({
        type: "post",
        url: ousnajaxcode.ousnajax_url,
        data: formData,
        contentType:false,
        processData:false,
        beforeSend: function() 
        {
            jQuery("#ousn_results_activated2").hide();
            jQuery("#on_sn_addnoact_loader2").show();
        },
        success: function(html)
        {
            jQuery("#ousn_results_activated2").empty();
            jQuery("#ousn_results_activated2").append(html);
            jQuery("#on_sn_addnoact_loader2").hide();
            jQuery("#ousn_results_activated2").show();
        }
        });
    }
    </script>
    <?php
    //menu
    echo '<div style="width:800px; overflow: hidden; min-height:10px;">';
    
        echo '<div style="padding:10px; text-align:right;">';
            echo '<a href="" class="ou_menu" onclick="ousn_mymessagesmenu(); return false;" id="oumenu1">'.esc_html('Messages').$ousnmenumessagecount.'</a>';
            echo '<a href="" class="ou_menu" id="oumenu2" onclick="ousn_myfriendsmenu(); return false;" >'.esc_html('Friends').$ousnmenucountfriend.'</a>';
            echo '<a href="" class="ou_menu" id="oumenu3" onclick="ousn_searchprofile(); return false;">'.esc_html('Search').'</a>';
            echo '<a href="" class="ou_menu" id="oumenu4" onclick="ousn_myprofile(); return false;">'.esc_html('My Profile').'</a>';
            echo '<a href="" class="ou_menu" id="oumenu5" onclick="ousn_editprofile(); return false;" >'.esc_html('Edit Profile').'</a>';    
        echo '</div>';

    echo '</div>';
    // end menu

    echo '<div id="on_sn_addnoact_loader2" style="width:800px; overflow: hidden; min-height:10px; color: #f2f2f2; display:none;">';
        echo '<div style="padding:100px 0px 100px; text-align:center;">';
            $ou_s_p_file3 = plugin_dir_url( __FILE__ );
            $ou_loader3 = $ou_s_p_file3.'images/loader.gif';
            echo '<img src="'.esc_url($ou_loader3).'" border="none" style="width:74px; height:74px;">';
        echo '</div>';
    echo '</div>';

    echo '<div id="ousn_results_activated2" style="width:800px; overflow: hidden; min-height:10px; color: #f2f2f2;">';

        // FULL NAME
        echo '<div style="width:800px; background: #0073e6; text-align:right; overflow: hidden;">';
            echo '<div style="padding:5px 20px 5px 20px; font-size:20px;">';
                echo esc_html($ousocialnetprofile_firstname_a1).' '.esc_html($ousocialnetprofile_lastname_a1);
            echo '</div>';
        echo '</div>';
        // END FULL NAME

        echo '<div style="width:800px; min-height:100px; margin:5px 0px 10px 0px; overflow: hidden;">';
        
            // left side
            echo '<div style="float:left; width:220px; min-height:120px;">';
                require_once( plugin_dir_path(__FILE__).'ousocialnetwork_left.php');
            echo '</div>';
            // end left side

            // right side
            echo '<div style="float:left; width:580px; min-height:120px;">';
                require_once( plugin_dir_path(__FILE__).'ousocialnetwork_right.php');
            echo '</div>';
            // end right side

        echo '</div>';

    echo '</div>';
}
?>