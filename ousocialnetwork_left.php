<?php
if(!defined('ABSPATH')) exit;
if(is_user_logged_in())
{
    if(empty($ouiduser))
    {
    $ou_s_n_check_user_idme1 = intval(get_current_user_id());
    
    if(!$ou_s_n_check_user_idme1)
    {
        wp_die();
    }
    
        $ouiduser = $ou_s_n_check_user_idme;
    }
    // avatar
    $ou_s_p_file2 = plugin_dir_url( __FILE__ );
    $user_logono = $ou_s_p_file2.'images/nouser.png';
    echo '<div style="width:220px; height:195px;">';
        echo '<div style="padding:0px 5px 0px 20px;">';
            if(!empty($ousocialnetprofile_avatar_a1))
            {
                echo '<img src="'.esc_url($ousocialnetprofile_avatar_a1).'" border="none" style="width:195px; height:195px;">';
            }
            else
            if(empty($ousocialnetprofile_avatar_a1))  
            {
                echo '<img src="'.esc_url($user_logono).'" border="none" style="width:195px; height:195px;">';
            }
        echo '</div>';
    echo '</div>';
    // end avatar

    $ou_sn_table_myprofilexa1 = $wpdb->prefix . "ousocialnetworkfriends";

    $uo_sn_friend_call = mysql_result (mysql_query( "SELECT COUNT(*) FROM  $ou_sn_table_myprofilexa1  where  ousnfriends_status_from ='1' AND ousnfriends_status_to ='1' AND ( (ousnfriends_from  = '$ouiduser') OR (ousnfriends_to = '$ouiduser')) " ),0);

    $uo_sn_friend_yes = mysql_result (mysql_query( "SELECT COUNT(*) FROM $ou_sn_table_myprofilexa1  where ( ( ousnfriends_from = '$ou_s_n_check_user_idme1' AND ousnfriends_to = '$ouiduser' ) OR ( ousnfriends_from = '$ouiduser' AND ousnfriends_to = '$ou_s_n_check_user_idme1' ) ) AND ousnfriends_status_from ='1' AND ousnfriends_status_to ='1' " ),0);

    $uo_sn_friend_maybe = mysql_result (mysql_query( "SELECT COUNT(*) FROM $ou_sn_table_myprofilexa1  where ( ( ousnfriends_from = '$ou_s_n_check_user_idme1' AND ousnfriends_to = '$ouiduser' ) OR ( ousnfriends_from = '$ouiduser' AND ousnfriends_to = '$ou_s_n_check_user_idme1' ) ) AND    ( (ousnfriends_status_from ='0' AND ousnfriends_status_to ='1') OR (ousnfriends_status_from ='1' AND ousnfriends_status_to ='0') ) " ),0);

    if($ouiduser != $ou_s_n_check_user_idme1)
    {  
        ?>
        <script>
        function ouopenmessageprofile()
        {
            jQuery("#ousnprofileci").hide();
            jQuery("#ouprofilefriendsv").hide();
            jQuery("#ouprofilewallsv").hide();
            jQuery("#ousnprofilemessageopen").show();
        }
        </script>
        <?php
        echo '<div style="width:195px; color: #0073e6; text-align:center; margin:10px 5px 0px 20px;  font-size:18px;">';
            echo '<a href="" onclick="ouopenmessageprofile(); return false;" class="ou_photouser" style="font-size: 14px !important;">';
                echo esc_html('Message');
            echo '</a>'; 
            if($uo_sn_friend_yes ==1)
            {
                ?>
                <script>
                function ou_sn_friends_buttondel() 
                {
                    var formData = new FormData();
                    formData.append('ouidfriend', '<?php echo $ouiduser;?>');
                    formData.append('action', 'ousnformresult17');
                    formData.append('nonce', '<?php echo wp_create_nonce('d45gdvwvbrgtnrt');?>');
                    jQuery.ajax({
                    type: "post",
                    url: ousnajaxcode.ousnajax_url,
                    data: formData,
                    contentType:false,
                    processData:false,
                    beforeSend: function() 
                    {
                        jQuery("#ou_user_addfriendshide").hide();
                    },
                    success: function(html)
                    {
                        alert("Your friend has been successfully removed!");
                    }
                    });
                }
                </script>
                <?php
                echo '<span id="ou_user_addfriendshide"> | <a href="" onclick="ou_sn_friends_buttondel(); return false;" class="ou_photouser"  style="font-size: 14px !important;">';
                    echo esc_html('Delete Friend');
                echo '</a></span>';
            }
            if($uo_sn_friend_yes ==0 && $uo_sn_friend_maybe ==0)
            {
                ?>
                <script>
                function ou_sn_friends_buttonadd() 
                {
                    var formData = new FormData();
                    formData.append('ouidfriend', '<?php echo $ouiduser;?>');
                    formData.append('action', 'ousnformresult9');
                    formData.append('nonce', '<?php echo wp_create_nonce('we54fdlse');?>');
                    jQuery.ajax({
                    type: "post",
                    url: ousnajaxcode.ousnajax_url,
                    data: formData,
                    contentType:false,
                    processData:false,
                    beforeSend: function() 
                    {
                        jQuery("#ou_user_addfriendshide").hide();
                    },
                    success: function(html)
                    {
                        alert("The request was submitted successfully!");
                    }
                    });
                }
                </script>
                <?php
                echo '<span id="ou_user_addfriendshide"> | <a href="" onclick="ou_sn_friends_buttonadd(); return false;" class="ou_photouser" style="font-size: 14px !important;">';
                    echo esc_html('Add Friend');
                echo '</a></span>';
            }
        echo '</div>';
    }

    if($uo_sn_friend_call >=1)
    {
        ?>
        <script>
        function ousnviewuserfriends()
        {
            var formData = new FormData();
            formData.append('ouiduserprofile', '<?php echo $ouiduser;?>');
            formData.append('action', 'ousnformresult18');
            formData.append('nonce', '<?php echo wp_create_nonce('123sqa3q');?>');
            jQuery.ajax({
            type: "post",
            url: ousnajaxcode.ousnajax_url,
            data: formData,
            contentType:false,
            processData:false,
            beforeSend: function() 
            {
                jQuery("#ousnprofileci").hide();
                jQuery("#ousnprofilemessageopen").hide();
                jQuery("#ouprofilewallsv").hide();
                jQuery("#ouprofileloader").show();
            },
            success: function(html)
            {
                jQuery("#ouprofilefriendsv").empty();
                jQuery("#ouprofilefriendsv").append(html);
                jQuery("#ouprofileloader").hide();
                jQuery("#ouprofilefriendsv").show();
            }
            });
        }
        </script>
        <?php
        echo '<div style="width:195px; margin:10px 5px 0px 20px; min-height:30px;">';
    
            echo '<div style="background: #001a33; padding: 5px; font-size:18px;">';
                echo '<a href="" onclick="ousnviewuserfriends(); return false;" class="ou_photouser">'.esc_html('Friends').esc_html($uo_sn_friend_call).'  </a>';
            echo '</div>';
    
            echo '<div style="border: 1px solid #001a33; width: 195px; overflow:hidden; ">';
                require_once(           plugin_dir_path(__FILE__).'ousocialnetwork_profile_friends.php');
            echo '</div>';
        echo '</div>';
    }
}
?>