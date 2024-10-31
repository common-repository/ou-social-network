<?php
if(!defined('ABSPATH')) exit;
$oucode8 = $_POST['nonce'];
if (!wp_verify_nonce($oucode8, 'd4fkg53kj'))
{
    wp_die();
}
if(is_user_logged_in())
{
    $ou_social_search_firstname =  sanitize_text_field($_POST['ou_social_search_firstname']);
	
    if(!empty($ou_social_search_firstname))
    {
        $ou_social_search_firstname_new = ' AND ousocialnetprofile_firstname = "'.$ou_social_search_firstname.'"';
    }

    $ou_social_search_lastname =  sanitize_text_field($_POST['ou_social_search_lastname']);

    if(!empty($ou_social_search_lastname))
    {
        $ou_social_search_lastname_new = ' AND ousocialnetprofile_lastname = "'.$ou_social_search_lastname.'"';
    }

    $ou_social_search_email =  sanitize_email($_POST['ou_social_search_email']);

    if(!empty($ou_social_search_email))
    {
        $ou_social_search_email_new = ' AND ousocialnetprofile_email = "'.$ou_social_search_email.'"';
    }

    $ou_social_search_skype =  sanitize_text_field($_POST['ou_social_search_skype']);

    if(!empty($ou_social_search_skype))
    {
        $ou_social_search_skype_new = ' AND ousocialnetprofile_skype = "'.$ou_social_search_skype.'"';
    }

    global $wpdb;
    $ou_sn_table_myprofile3 = $wpdb->prefix . "ousocialnetworkprofile";

    $ousocialnetwork_count_users = $wpdb->get_var( "SELECT COUNT(*) FROM            $ou_sn_table_myprofile3 where ousocialnetprofile_status = 'yes'                        $ou_social_search_firstname_new $ou_social_search_lastname_new                        $ou_social_search_email_new  $ou_social_search_skype_new ");

    echo '<div style="width:500px; font-size:18px; color: #84a3e1; overflow: hidden;">';
        echo '<div style="padding: 10px 10px 10px 10px;">';
            echo esc_html('People: ');
            echo esc_html($ousocialnetwork_count_users);
        echo '</div>';
    echo '</div>';
    $ou_s_p_filea4 = plugin_dir_url( __FILE__ );
    $user_logonoa4 = $ou_s_p_filea4.'images/nouser.png';
    $ou_myprofile_sql4 = $wpdb->get_results( "SELECT * FROM $ou_sn_table_myprofile3 where ousocialnetprofile_status = 'yes' $ou_social_search_firstname_new                             $ou_social_search_lastname_new $ou_social_search_email_new                               $ou_social_search_skype_new ORDER BY ousocialnetprofile_id DESC LIMIT 35");
    foreach ($ou_myprofile_sql4 as $ou_myprofile_sql5)
    { 
        $ousocialnetprofile_id_a3 = $ou_myprofile_sql5->ousocialnetprofile_id;
        $ousocialnetprofile_id_user_a3 = $ou_myprofile_sql5->ousocialnetprofile_id_user;
        $ousocialnetprofile_firstname_a3 = $ou_myprofile_sql5->ousocialnetprofile_firstname;
        $ousocialnetprofile_lastname_a3 = $ou_myprofile_sql5->ousocialnetprofile_lastname;
        $ousocialnetprofile_avatar_a3 = $ou_myprofile_sql5->ousocialnetprofile_avatar;
        $ousocialnetprofile_gender_a3 = $ou_myprofile_sql5->ousocialnetprofile_gender;
        $ousocialnetprofile_email_a3 = $ou_myprofile_sql5->ousocialnetprofile_email;
        $ousocialnetprofile_interests_a3 = $ou_myprofile_sql5->ousocialnetprofile_interests;
        $ousocialnetprofile_skills_a3 = $ou_myprofile_sql5->ousocialnetprofile_skills;
        $ousocialnetprofile_aboutme_a3 = $ou_myprofile_sql5->ousocialnetprofile_aboutme;
        $ousocialnetprofile_status_a3 = $ou_myprofile_sql5->ousocialnetprofile_status;
        $ousocialnetprofile_phone_a3 = $ou_myprofile_sql5->ousocialnetprofile_phone;
        $ousocialnetprofile_skype_a3 = $ou_myprofile_sql5->ousocialnetprofile_skype;
        $ousocialnetprofile_facebook_a3 = $ou_myprofile_sql5->ousocialnetprofile_facebook;
        $ousocialnetprofile_twitter_a3 = $ou_myprofile_sql5->ousocialnetprofile_twitter;
        $ousocialnetprofile_instagram_a3 = $ou_myprofile_sql5->ousocialnetprofile_instagram;
        $ousocialnetprofile_date_register_a3 = $ou_myprofile_sql5->ousocialnetprofile_date_register;
        $ousocialnetprofile_date_a3 = $ou_myprofile_sql5->ousocialnetprofile_date;
        ?>
        <script>
        function ousearch_vp<?php echo $ousocialnetprofile_id_a3;?>()
        {
            var formData = new FormData();
            formData.append('iduser', '<?php echo $ousocialnetprofile_id_user_a3;?>');
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
        <?php
        
        echo '<div style="width:478px; border-radius:10px; border: 1px solid #84a3e1; margin: 0px 10px 10px 10px; font-size:18px; color: #84a3e1; overflow: hidden; height:140px;">';
        
            echo '<div style="float:left; width:140px; height:140px;">';
                echo '<div style="padding:10px;">';
                    if(!empty($ousocialnetprofile_avatar_a3))
                    {
                        echo '<img src="'.esc_url($ousocialnetprofile_avatar_a3).'" border="none" style="width:120px; height:120px;">';
                    }
                    else
                    if(empty($ousocialnetprofile_avatar_a3))  
                    {
                        echo '<img src="'.esc_url($user_logonoa4).'" border="none" style="width:120px; height:120px;">';
                    }   
                echo '</div>';
            echo '</div>';
    
            echo '<div style="float:left; width:328px; height:140px;">';
                echo '<div style="padding:30px 0px 0px; text-align:center;">';
                    echo '<a href="" onclick="ousearch_vp'.$ousocialnetprofile_id_a3.'(); return false;" class="ou_photouser" style="font-size: 26px !important;">'.esc_html($ousocialnetprofile_firstname_a3).' <br />'.esc_html($ousocialnetprofile_lastname_a3).'</a>';
                echo '</div>';
            echo '</div>';
    
        echo '</div>';
        
    }
}
?>