<?php
if(!defined('ABSPATH')) exit;
if(is_user_logged_in())
{
    echo '<div id="ousnprofileci" style="overflow: hidden; min-height:10px; width:555px; margin: 0px 20px 0px 5px;">';

        if(!empty($ousocialnetprofile_date_a1))
        {
        
            echo '<div style="float:left; width:200px;">';

                echo '<div style="padding:5px 8px 0px 0px; color:#84a3e1; font-size:18px; text-align:right;">';
                    echo esc_html('Birthday:');
                echo '</div>';

            echo '</div>';
        
            echo '<div style="float:left; font-size:18px; width:355px;">';
                echo '<div style="padding:5px 0px 0px 0px; text-align:justify;">';
                    echo esc_html($ousocialnetprofile_date_a1);
                echo '</div>';
            echo '</div>';
        
        }
        if(!empty($ousocialnetprofile_gender_a1))
        {
        
            echo '<div style="float:left; width:200px;">';

                echo '<div style="padding:5px 8px 0px 0px; color:#84a3e1; font-size:18px; text-align:right;">';
                    echo esc_html('Gender:');
                echo '</div>';

            echo '</div>';
       
            echo '<div style="float:left; font-size:18px; width:355px;">';
                echo '<div style="padding:5px 0px 0px 0px; text-align:justify;">';
                    echo esc_html($ousocialnetprofile_gender_a1);
                echo '</div>';
            echo '</div>';
        
        }

        if(!empty($ousocialnetprofile_email_a1))
        {
        
            echo '<div style="float:left; width:200px;">';

                echo '<div style="padding:5px 8px 0px 0px; color:#84a3e1; font-size:18px; text-align:right;">';
                    echo esc_html('Email:');
                echo '</div>';

            echo '</div>';
        
            echo '<div style="float:left; font-size:18px; width:355px;">';
                echo '<div style="padding:5px 0px 0px 0px; text-align:justify;">';
                    echo esc_html($ousocialnetprofile_email_a1);
                echo '</div>';
            echo '</div>';
        
        }

        if(!empty($ousocialnetprofile_phone_a1))
        {
        
            echo '<div style="float:left; width:200px;">';

                echo '<div style="padding:5px 8px 0px 0px; color:#84a3e1; font-size:18px; text-align:right;">';
                    echo esc_html('Phone:');
                echo '</div>';

            echo '</div>';
        
            echo '<div style="float:left; font-size:18px; width:355px;">';
                echo '<div style="padding:5px 0px 0px 0px; text-align:justify;">';
                    echo esc_html($ousocialnetprofile_phone_a1);
                echo '</div>';
            echo '</div>';
        
        }

        if(!empty($ousocialnetprofile_skype_a1))
        {
        
            echo '<div style="float:left; width:200px;">';

                echo '<div style="padding:5px 8px 0px 0px; color:#84a3e1; font-size:18px; text-align:right;">';
                    echo esc_html('Skype:');
                echo '</div>';

            echo '</div>';
       
            echo '<div style="float:left; font-size:18px; width:355px;">';
                echo '<div style="padding:5px 0px 0px 0px; text-align:justify;">';
                    echo esc_html($ousocialnetprofile_skype_a1);
                echo '</div>';
            echo '</div>';
        
        }
        if(!empty($ousocialnetprofile_facebook_a1))
        {
        
            echo '<div style="float:left; width:200px;">';

                echo '<div style="padding:5px 8px 0px 0px; color:#84a3e1; font-size:18px; text-align:right;">';
                    echo esc_html('Facebook:');
                echo '</div>';

            echo '</div>';
        
            echo '<div style="float:left; font-size:18px; width:355px;">';
                echo '<div style="padding:5px 0px 0px 0px; text-align:justify;">';
                    echo '<a class="ou_photouser" href="'.esc_url($ousocialnetprofile_facebook_a1).'">'.esc_url($ousocialnetprofile_facebook_a1).'</a>';
                echo '</div>';
            echo '</div>';
       
        }

        if(!empty($ousocialnetprofile_twitter_a1))
        {
        
            echo '<div style="float:left; width:200px;">';

                echo '<div style="padding:5px 8px 0px 0px; color:#84a3e1; font-size:18px; text-align:right;">';
                    echo esc_html('Twitter:');
                echo '</div>';

            echo '</div>';
        
            echo '<div style="float:left; font-size:18px; width:355px;">';
                echo '<div style="padding:5px 0px 0px 0px; text-align:justify;">';
                    echo '<a class="ou_photouser" href="'.esc_url($ousocialnetprofile_twitter_a1).'">'.esc_url($ousocialnetprofile_twitter_a1).'</a>';
                echo '</div>';
            echo '</div>';
        
        }
        if(!empty($ousocialnetprofile_instagram_a1))
        {
       
            echo '<div style="float:left; width:200px;">';

                echo '<div style="padding:5px 8px 0px 0px; color:#84a3e1; font-size:18px; text-align:right;">';
                    echo esc_html('Instagram:');
                echo '</div>';

            echo '</div>';
        
            echo '<div style="float:left; font-size:18px; width:355px;">';
                echo '<div style="padding:5px 0px 0px 0px; text-align:justify;">';
                    echo '<a class="ou_photouser" href="'.esc_url($ousocialnetprofile_instagram_a1).'">'.esc_url($ousocialnetprofile_instagram_a1).'</a>';
                echo '</div>';
            echo '</div>';
        
        }
        if(!empty($ousocialnetprofile_interests_a1))
        {
        
            echo '<div style="float:left; width:200px;">';

                echo '<div style="padding:5px 8px 0px 0px; color:#84a3e1; font-size:18px; text-align:right;">';
                    echo esc_html('Interest:');
                echo '</div>';

            echo '</div>';
        
            echo '<div style="float:left; font-size:18px; width:355px;">';
                echo '<div style="padding:5px 0px 0px 0px; text-align:left;">';
                    echo esc_html($ousocialnetprofile_interests_a1);
                echo '</div>';
            echo '</div>';
        
        }
        if(!empty($ousocialnetprofile_skills_a1))
        {
        
            echo '<div style="float:left; width:200px;">';

                echo '<div style="padding:5px 8px 0px 0px; color:#84a3e1; font-size:18px; text-align:right;">';
                    echo esc_html('Skills:');
                echo '</div>';

            echo '</div>';
        

        
            echo '<div style="float:left; font-size:18px; width:355px;">';
                echo '<div style="padding:5px 0px 0px 0px; text-align:left;">';
                    echo esc_html($ousocialnetprofile_skills_a1);
                echo '</div>';
            echo '</div>';
        
        }

        if(!empty($ousocialnetprofile_aboutme_a1))
        {
        
            echo '<div style="float:left; width:200px;">';

                echo '<div style="padding:5px 8px 0px 0px; color:#84a3e1; font-size:18px; text-align:right;">';
                    echo esc_html('About Me:');
                echo '</div>';

            echo '</div>';
        

       
            echo '<div style="float:left; font-size:18px; width:355px;">';
                echo '<div style="padding:5px 0px 0px 0px; text-align:left;">';
                    echo esc_html($ousocialnetprofile_aboutme_a1);
                echo '</div>';
            echo '</div>';
        
        }
    echo '</div>';

    echo '<div id="ouprofilefriendsv" style="overflow: hidden; display:none;  min-height:10px; width:555px; margin: 0px 20px 0px 5px;">';

    echo '</div>';

    $ou_snmiol_idme = intval(get_current_user_id());

    if(!$ou_snmiol_idme)
    {
        wp_die();
    }
    ?>
    <script>
    function ousnprofileopenpost_button() 
    {
        var post =  jQuery("#ouprofileposttext").val();
    
        if(post !='')
        {
            var formData = new FormData();
            formData.append('ouposttext', post);
            formData.append('oufromuser', '<?php echo $ou_snmiol_idme;?>');
            formData.append('outouser', '<?php echo $ouiduser;?>');
            formData.append('action', 'ousnformresult26');
            formData.append('nonce', '<?php echo wp_create_nonce('xc45hmkl');?>');
            jQuery.ajax({
            type: "post",
            url: ousnajaxcode.ousnajax_url,
            data: formData,
            contentType:false,
            processData:false,
            success: function(html)
            {
                jQuery("#ousnprofilewalladdpost").append(html);
                jQuery("#ouprofileposttext").val('');
            }
            });
        
        }
        else
        {
            alert("Your post is empty!");
        }
    }
    </script>
    <?php

    echo '<div id="ouprofilewallsv" style="overflow: hidden; min-height:10px; width:555px; margin: 0px 20px 0px 5px;">';

        echo '<div style="font-size:18px; color: #84a3e1; overflow: hidden; min-height:160px; width:553px;  border: 1px solid #001a33; border-radius:10px; margin:10px 0px 0px 0px;">';
            echo '<div style="width:553px; background: #001a33; border-top-left-radius: 10px; border-top-right-radius: 10px; ">';
                echo '<div style="padding:5px 10px 5px 10px; color: #84a3e1; text-align:left; font-size:18px;">';
                    echo esc_html('Wall');
                echo '</div>';
            echo '</div>';
    
            echo '<div style="width:553px;">';
                echo '<div style="margin:10px; width:533px;">';
                    echo '<textarea placeholder ="Your post" id="ouprofileposttext" style="width:100% !important; height:100px !important; border: 1px solid #001a33 !important; resize:none !important; color:#000000 !important; font-size:14px !important;"></textarea>';
                echo '</div>';
            echo '</div>';

            echo '<div style="margin:5px 0px 5px 0px; text-align:right; width:553px;">';
                echo '<div style="padding:5px 10px 10px 10px;">';
                    echo '<a href="" onclick="ousnprofileopenpost_button(); return false;" class="ou_button">';
                        echo esc_html('Send Post');
                    echo '</a>';
                echo '</div>';
            echo '</div>';

            echo '<div style="margin:5px 0px 5px 0px; width:553px;">';
                require_once( plugin_dir_path(__FILE__).'ousocialnetwork_wall_view.php');
            echo '</div>';

        echo '</div>';
    echo '</div>';

    ?>
    <script>
    function ousnprofilehidemessage()
    {
        jQuery("#ousnprofilemessageopen").hide();
        jQuery("#ousnprofileci").show();
        jQuery("#ouprofilewallsv").show();
    }
    </script>

    <script>
    function ousnprofileopenmessage_button()
    {
        var oumessage = jQuery("#ouprofilemessagetext").val();
        if(oumessage !='')
        {
            var formData = new FormData();
            formData.append('idusersend', '<?php echo $ouiduser;?>');
            formData.append('outextmessage', oumessage);
            formData.append('action', 'ousnformresult19');
            formData.append('nonce', '<?php  echo wp_create_nonce('ccds34t3ws');?>');
            jQuery.ajax({
            type: "post",
            url: ousnajaxcode.ousnajax_url,
            data: formData,
            contentType:false,
            processData:false,
            beforeSend: function() 
            {
                jQuery("#ouprofilemessagetext").val('');
            },
            success: function(html)
            {
                alert("Your message was successfully sent!");
            }
            });
        }
        else
        {
            alert("You forgot to write the message!");
        }
    }
    </script>
    <?php

    echo '<div id="ousnprofilemessageopen" style="overflow: hidden; display:none; min-height:10px; width:555px; margin: 0px 20px 0px 5px;">';
        echo '<div style="font-size:18px; color: #84a3e1; overflow: hidden; width:553px;   text-align:right; margin:0px 0px 10px 0px;">';
            echo '<a href="" onclick="ousnprofilehidemessage(); return false;" class="ou_photouser">'.esc_html('Hide message').'</a>';   
        echo '</div>';

        echo '<div style="font-size:18px; color: #84a3e1; overflow: hidden; min-height:160px; width:553px;  border: 1px solid #001a33; border-radius:10px; margin:10px 0px 0px 0px;">';

            echo '<div style="width:553px; background: #001a33; border-top-left-radius: 10px; border-top-right-radius: 10px; ">';
                echo '<div style="padding:5px 10px 5px 10px; color: #84a3e1; text-align:left; font-size:18px;">';
                    echo esc_html('Message');
                echo '</div>';
            echo '</div>';

            echo '<div style="width:553px;">';
                echo '<div style="margin:10px; width:533px;">';
                    echo '<textarea placeholder ="Your message" id="ouprofilemessagetext" style="width:100% !important; height:100px !important; border: 1px solid #001a33 !important; resize:none !important; color:#000000 !important; font-size:14px !important;"></textarea>';
                echo '</div>';
            echo '</div>';

            echo '<div style="margin:5px 0px 5px 0px; text-align:right; width:553px;">';
                echo '<div style="padding:5px 10px 10px 10px;">';
                    echo '<a href="" onclick="ousnprofileopenmessage_button(); return false;" class="ou_button">';
                        echo esc_html('Send Message');
                    echo '</a>';
                echo '</div>';
            echo '</div>';

        echo '</div>';

    echo '</div>';


    echo '<div id="ouprofileloader" style="overflow: hidden; display:none; min-height:10px; width:555px; margin: 0px 20px 0px 5px; text-align:center;">';
        echo '<div style="padding: 50px 0px 50px 0px;">';
            $ou_s_p_file10 = plugin_dir_url( __FILE__ );
            $ou_loader10 = $ou_s_p_file10.'images/loader.gif';
            echo '<img src="'.esc_url($ou_loader10).'" border="none" style="width:74px; height:74px;">';
        echo '</div>';
    echo '</div>';
}
?>