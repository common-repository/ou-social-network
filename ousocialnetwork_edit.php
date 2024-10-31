<?php
if(!defined('ABSPATH')) exit;
$oucode2 = $_POST['nonce'];
if (!wp_verify_nonce($oucode2, 'v6gttd32f'))
{
    wp_die();
}
if(is_user_logged_in())
{
    global $wpdb;
    $ou_s_n_check_usersaveinfodb2 = intval(get_current_user_id());

    if(!$ou_s_n_check_usersaveinfodb2)
    {
        wp_die();
    }

    $ou_sn_table_myprofile2 = $wpdb->prefix . "ousocialnetworkprofile";
    $ou_myprofile_sql2 = $wpdb->get_results( "SELECT * FROM $ou_sn_table_myprofile2 where ousocialnetprofile_id_user = $ou_s_n_check_usersaveinfodb2 AND    ousocialnetprofile_firstname !='' AND ousocialnetprofile_lastname !=''");
    foreach ($ou_myprofile_sql2 as $ou_myprofile_sql3)
    { 
        $ousocialnetprofile_id_a2 = $ou_myprofile_sql3->ousocialnetprofile_id;
        $ousocialnetprofile_id_user_a2 = $ou_myprofile_sql3->ousocialnetprofile_id_user;
        $ousocialnetprofile_firstname_a2 = $ou_myprofile_sql3->ousocialnetprofile_firstname;
        $ousocialnetprofile_lastname_a2 = $ou_myprofile_sql3->ousocialnetprofile_lastname;
        $ousocialnetprofile_avatar_a2 = $ou_myprofile_sql3->ousocialnetprofile_avatar;
        $ousocialnetprofile_gender_a2 = $ou_myprofile_sql3->ousocialnetprofile_gender;
        $ousocialnetprofile_email_a2 = $ou_myprofile_sql3->ousocialnetprofile_email;
        $ousocialnetprofile_interests_a2 = $ou_myprofile_sql3->ousocialnetprofile_interests;
        $ousocialnetprofile_skills_a2 = $ou_myprofile_sql3->ousocialnetprofile_skills;
        $ousocialnetprofile_aboutme_a2 = $ou_myprofile_sql3->ousocialnetprofile_aboutme;
        $ousocialnetprofile_status_a2 = $ou_myprofile_sql3->ousocialnetprofile_status;
        $ousocialnetprofile_phone_a2 = $ou_myprofile_sql3->ousocialnetprofile_phone;
        $ousocialnetprofile_skype_a2 = $ou_myprofile_sql3->ousocialnetprofile_skype;
        $ousocialnetprofile_facebook_a2 = $ou_myprofile_sql3->ousocialnetprofile_facebook;
        $ousocialnetprofile_twitter_a2 = $ou_myprofile_sql3->ousocialnetprofile_twitter;
        $ousocialnetprofile_instagram_a2 = $ou_myprofile_sql3->ousocialnetprofile_instagram;
        $ousocialnetprofile_date_register_a2 = $ou_myprofile_sql3->ousocialnetprofile_date_register;
        $ousocialnetprofile_date_a2 = $ou_myprofile_sql3->ousocialnetprofile_date;
    }
    $ou_s_p_filea = plugin_dir_url( __FILE__ );
    $loader_imagea1 = $ou_s_p_filea.'images/loader.gif';
    ?>
    <script>
    function ou_sn_edit_uploadserphoto()
    {
        var ou_file = jQuery("#ou2_image").val();
    
        if(ou_file !='')
        {
            var formData = new FormData(jQuery('#ou_snforma3')[0]);
            formData.append('action', 'ousnformresult3');
            formData.append('nonce', '<?php echo wp_create_nonce('dffpo34sk');?>');
            jQuery.ajax({
            type: "post",
            url: ousnajaxcode.ousnajax_url,
            data: formData,
            contentType:false,
            processData:false,
            beforeSend: function() 
            {
                jQuery("#on_sn_edituploadphotoim").hide();
                jQuery("#on_sn_editremovephotoim").hide();
                jQuery("#on_sn_addnoact_loaderedituser").show();
            },
            success: function(html)
            {
                jQuery("#ousn_uploaduserphoto").empty();
                jQuery("#ousn_uploaduserphoto").append(html);
                jQuery("#on_sn_addnoact_loaderedituser").hide();
                jQuery("#on_sn_edituploadphotoim").show();
                jQuery("#on_sn_editremovephotoim").show();
            }
            });
        }
        else
        {
            alert("Choose image!");
        }
    
    }
    </script>

    <script>
    function ou_sn_edit_removeuserphoto()
    {
        var formData = new FormData();
        formData.append('action', 'ousnformresult4');
        formData.append('nonce', '<?php echo wp_create_nonce('cr5fghgts');?>');
        jQuery.ajax({
        type: "post",
        url: ousnajaxcode.ousnajax_url,
        data: formData,
        contentType:false,
        processData:false,
        beforeSend: function() 
        {
            jQuery("#on_sn_edituploadphotoim").hide();
            jQuery("#on_sn_editremovephotoim").hide();
            jQuery("#on_sn_addnoact_loaderedituser").show();
        },
        success: function(html)
        {
            jQuery("#ousn_uploaduserphoto").empty();
            jQuery("#ousn_uploaduserphoto").append(html);
            jQuery("#on_sn_addnoact_loaderedituser").hide();
            jQuery("#on_sn_edituploadphotoim").show();
            jQuery("#on_sn_editremovephotoim").show();
        }
        });
    }
    </script>

    <script>
    function ou_sn_edit_saveinfo() 
    {
        var formData = new FormData(jQuery('#ou_snforma4')[0]);
        formData.append('action', 'ousnformresult5');
        formData.append('nonce', '<?php echo wp_create_nonce('cdr69mn');?>');
        jQuery.ajax({
        type: "post",
        url: ousnajaxcode.ousnajax_url,
        data: formData,
        contentType:false,
        processData:false,
        success: function(html)
        {
            alert("Your data has been successfully saved!");
        }
        });
    }
    </script>
    <?php
    echo '<div style="width:800px;  background: #0073e6; text-align:right; overflow: hidden;">';
        echo '<div style="padding:5px 20px 5px 20px; font-size:20px;">';
            echo esc_html('Edit Profile');
        echo '</div>';
    echo '</div>';

    echo '<div style="width:800px; min-height:100px; margin:5px 0px 0px 0px; overflow: hidden;">';
        
        echo '<div style="float:left; width:220px; min-height:120px;">';
        
            $ou_s_p_file4 = plugin_dir_url( __FILE__ );
            $user_logono4 = $ou_s_p_file4.'images/nouser.png';
            echo '<div style="width:220px; height:195px;">';
                echo '<div style="padding:0px 5px 0px 20px;" id="ousn_uploaduserphoto">';
                    if(!empty($ousocialnetprofile_avatar_a2))
                    {
                        echo '<img src="'.esc_url($ousocialnetprofile_avatar_a2).'" border="none" style="width:195px; height:195px;">';
                    }
                    else
                    if(empty($ousocialnetprofile_avatar_a2))  
                    {
                        echo '<img src="'.esc_url($user_logono4).'" border="none" style="width:195px; height:195px;">';
                    }
                echo '</div>';
            echo '</div>';
        
        echo '</div>';
   
        echo '<div style="float:left; width:580px; min-height:120px;">';
        
            echo '<div style="overflow: hidden; width:555px; margin: 0px 20px 0px 5px;">';
        
                echo '<form enctype="multipart/form-data"  method="POST" id="ou_snforma3">';

                    echo '<div style="padding:10px 0px 0px 0px; text-align:left; font-size:16px;">';
                        echo '<span style="color:#84a3e1; font-size:18px; text-decoration: underline;">'.esc_html('USER PHOTO').'</span>';
                    echo '</div>';

                    echo '<div style="padding:10px 0px 0px 0px; text-align:left; font-size:16px;">';
                        echo '<input type="file" accept="image/*" class="ou_input" id="ou2_image" autocomplete="off" name="ou_social_image">';
                        echo '<span style="color:#84a3e1;">Choose image</span>';
                    echo '</div>';

                    echo '<div style="overflow: hidden; width:380px; margin: 5px auto 0px auto;">';

                        echo '<div id="on_sn_edituploadphotoim" style="float:left; padding:10px 10px 10px 0px; text-align:center;">';  
                            echo '<a href="" onclick="ou_sn_edit_uploadserphoto(); return false;" class="ou_button">';
                                echo esc_html('Upload user photo');
                            echo '</a>';     
                        echo '</div>';

                        echo '<div id="on_sn_editremovephotoim" style="float:left; padding:10px 0px 10px 0px; text-align:center;">';  
                            echo '<a href="" onclick="ou_sn_edit_removeuserphoto(); return false;" class="ou_button">';
                                echo esc_html('Remove user photo');
                            echo '</a>';     
                        echo '</div>';

                        echo '<div id="on_sn_addnoact_loaderedituser" style="float:left; padding:10px 0px 0px 0px; text-align:center; display:none;">';
                            echo '<img src="'.esc_url($loader_imagea1).'" border="none" style="width:74px; height:74px;">';
                        echo '</div>';
                
                    echo '</div>';
                echo '</form>';
            echo '</div>';
       
            echo '<div style="overflow: hidden; width:555px; margin: 10px 20px 10px 5px;">';
                echo '<form enctype="multipart/form-data"  method="POST" id="ou_snforma4">';
                    echo '<div style="padding:10px 0px 0px 0px; text-align:left; font-size:16px;">';
                        echo '<span style="color:#84a3e1; font-size:18px; text-decoration: underline;">'.esc_html('CONTACT INFO').'</span>';
                    echo '</div>';
                    echo '<div style="padding:10px 0px 0px 0px; text-align:left; font-size:16px;">';
                        echo '<span style="color:#84a3e1;">Gender</span>';
                        ?>
                        <div style="padding:5px 0px 0px 60px;">
                            <input type="radio" <?php if($ousocialnetprofile_gender_a2 =='Male') { echo 'checked'; } ?> autocomplete="off" class="ou_radiobutton" name="ou2_gender" value="Male"><span style="color:#84a3e1;"><?php echo esc_html('Male');?></span><br />
                            <input type="radio" <?php if($ousocialnetprofile_gender_a2 =='Female') { echo 'checked'; } ?> autocomplete="off" class="ou_radiobutton" name="ou2_gender" value="Female"><span style="color:#84a3e1;"><?php echo esc_html('Female');?></span>
                        </div>
                        <?php
                    echo '</div>';

                    echo '<div style="padding:10px 0px 0px 0px; text-align:left; font-size:16px;">';
                        echo '<input type="text" class="ou_input" id="ou2_bd" autocomplete="off" name="ou_social_bd" value="'.esc_html($ousocialnetprofile_date_a2).'">';
                        echo '<br /><span style="color:#84a3e1;">'.esc_html('Birthday (Ex. XXXX-XX-XX, 2016-10-20)').'</span>';
                    echo '</div>';

        
                    echo '<div style="padding:10px 0px 0px 0px; text-align:left; font-size:16px;">';
                        echo '<input type="text" class="ou_input" id="ou2_email" autocomplete="off" name="ou_social_edit_email" value="'.esc_html($ousocialnetprofile_email_a2).'">';
                        echo '<br /><span style="color:#84a3e1;">'.esc_html('Email').'</span>';
                    echo '</div>';

                    echo '<div style="padding:10px 0px 0px 0px; text-align:left; font-size:16px;">';
                        echo '<input type="text" class="ou_input" id="ou2_phone" autocomplete="off" name="ou_social_edit_phone" value="'.esc_html($ousocialnetprofile_phone_a2).'">';
                        echo '<br /><span style="color:#84a3e1;">'.esc_html('Phone (<i>Ex. +1-555-532-3455, 555-555-5555</i>)').'</span>';
                    echo '</div>';

                    echo '<div style="padding:10px 0px 0px 0px; text-align:left; font-size:16px;">';
                        echo '<input type="text" class="ou_input" id="ou2_skype" autocomplete="off" name="ou_social_edit_skype" value="'.esc_html($ousocialnetprofile_skype_a2).'">';
                        echo '<br /><span style="color:#84a3e1;">'.esc_html('Skype').'</span>';
                    echo '</div>';

                    echo '<div style="padding:10px 0px 0px 0px; text-align:left; font-size:16px;">';
                        echo '<input type="text" class="ou_input" id="ou2_facebook" autocomplete="off" name="ou_social_edit_facebook" value="'.esc_url($ousocialnetprofile_facebook_a2).'">';
                        echo '<br /><span style="color:#84a3e1;">'.esc_html('Facebook (link)').'</span>';
                    echo '</div>';
                
                    echo '<div style="padding:10px 0px 0px 0px; text-align:left; font-size:16px;">';
                        echo '<input type="text" class="ou_input" id="ou2_twitter" autocomplete="off" name="ou_social_edit_twitter" value="'.esc_url($ousocialnetprofile_twitter_a2).'">';
                        echo '<br /><span style="color:#84a3e1;">'.esc_html('Twitter (link)').'</span>';
                    echo '</div>';

                    echo '<div style="padding:10px 0px 0px 0px; text-align:left; font-size:16px;">';
                        echo '<input type="text" class="ou_input" id="ou2_instagram" autocomplete="off" name="ou_social_edit_instagram" value="'.esc_url($ousocialnetprofile_instagram_a2).'">';
                        echo '<br /><span style="color:#84a3e1;">'.esc_html('Instagram (link)').'</span>';
                    echo '</div>';

                    echo '<div style="padding:10px 0px 0px 0px; text-align:left; font-size:16px;">';
                        echo '<input type="text" class="ou_input" id="ou2_interest" autocomplete="off" name="ou_social_edit_interest" value="'.esc_html($ousocialnetprofile_interests_a2).'">';
                        echo '<br /><span style="color:#84a3e1;">'.esc_html('Interest').'</span>';
                    echo '</div>';

                    echo '<div style="padding:10px 0px 0px 0px; text-align:left; font-size:16px;">';
                        echo '<input type="text" class="ou_input" id="ou2_skills" autocomplete="off" name="ou_social_edit_skills" value="'.esc_html($ousocialnetprofile_skills_a2).'">';
                        echo '<br /><span style="color:#84a3e1;">'.esc_html('Skills').'</span>';
                    echo '</div>';

                    echo '<div style="padding:10px 0px 0px 0px; text-align:left; font-size:16px;">';
                        echo '<input type="text" class="ou_input" id="ou2_aboutme" autocomplete="off" name="ou_social_edit_aboutme" value="'.esc_html($ousocialnetprofile_aboutme_a2).'">';
                        echo '<br /><span style="color:#84a3e1;">'.esc_html('About Me').'</span>';
                    echo '</div>';

                    echo '<div id="on_sn_editinfo_hide" style="padding:10px 0px 10px 0px; text-align:center;">';  
                        echo '<a href="" onclick="ou_sn_edit_saveinfo(); return false;" class="ou_button">';
                            echo esc_html('Save');
                        echo '</a>';     
                    echo '</div>';

                echo '</form>';
            echo '</div>';

        echo '</div>';

    echo '</div>';
}
?>