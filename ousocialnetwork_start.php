<?php
if(!defined('ABSPATH')) exit;
if(is_user_logged_in())
{
    $ousocialtableprofile = $wpdb->prefix . "ousocialnetworkprofile";
		
    $ousocialnetwork_check_user = $wpdb->get_var( "SELECT COUNT(*) FROM $ousocialtableprofile where ousocialnetprofile_id_user = $ou_s_n_check_user AND ousocialnetprofile_firstname !='' AND ousocialnetprofile_lastname !='' " );

    if($ousocialnetwork_check_user ==0)
    {
        ?>
        <script>
        function ou_sn_addnoact()
        {
            var ou_firstname = jQuery("#ou1_first_name").val().length;
        
            if(ou_firstname >=2)
            {
                var ou_lasttname = jQuery("#ou1_last_name").val().length;
            
                if(ou_lasttname >=2)
                {
                    var formData = new FormData(jQuery('#ou_snform1')[0]);
                    formData.append('action', 'ousnformresult1');
                    formData.append('nonce', '<?php echo wp_create_nonce('b45asxt4zwer');?>');
                    jQuery.ajax({
                    type: "post",
                    url: ousnajaxcode.ousnajax_url,
                    data: formData,
                    contentType:false,
                    processData:false,
                    beforeSend: function() 
			         {
				        jQuery("#on_sn_addnoact_hide").hide();
				        jQuery("#on_sn_addnoact_loader").show();
			         },
			         success: function(html)
			         {
				        jQuery("#ou_socialnetwork_main").empty();
				        jQuery("#ou_socialnetwork_main").append(html);
			         }
			         });
                }
                else
                {
                    alert("Please enter your last name!");
                }
            
            }
            else
            {
                alert("Please enter your first name!");
            }
        }
        </script>
        <?php
        $ou_s_p_file = plugin_dir_url( __FILE__ );
        $loader_image1 = $ou_s_p_file.'images/loader.gif';
        echo '<div style="color:#f2f2f2; border-radius:10px; border: 1px solid #f2f2f2; margin: 50px auto 0px auto; width:550px; text-align:center;  font-size:20px;">';
            echo '<div style="padding:20px 0px;">';
    
                echo '<b>';
                    echo esc_html('PLEASE GIVE THE FOLLOWING INFORMATION');
                echo '</b>';
    
            echo '</div>';
        
        echo '</div>';
    
        echo '<div style="color:#f2f2f2; margin: 0px auto 50px auto; width:400px; text-align:center;  font-size:20px;">';
    
            echo '<form enctype="multipart/form-data"  method="POST" id="ou_snform1">';
    
                echo '<div style="padding:10px 0px 0px 0px; text-align:left; font-size:16px;">';
                    echo '<input type="text" class="ou_input" id="ou1_first_name" autocomplete="off"  name="ou_social_add_first_name">';
                    echo '<br /><span style="color:#84a3e1;">'.esc_html('First Name (*)').'</span>';
                echo '</div>';
    
                echo '<div style="padding:10px 0px 0px 0px; text-align:left; font-size:16px;">';
                    echo '<input type="text" class="ou_input" id="ou1_last_name" autocomplete="off" name="ou_social_add_last_name">';
                    echo '<br /><span style="color:#84a3e1;">'.esc_html('Last Name (*)').'</span>';
                echo '</div>';
    
                echo '<div style="padding:15px 0px 0px 0px; text-align:left; text-decoration:underline; font-size:14px;">';
                    echo esc_html('Fields marked with a * are compulsory and must be completed.');
                echo '</div>';
            
                echo '<div id="on_sn_addnoact_hide" style="padding:10px 0px 0px 0px; text-align:center;">';  
                    echo '<a href="" onclick="ou_sn_addnoact(); return false;" class="ou_button">';
                        echo esc_html('Save');
                    echo '</a>';     
                echo '</div>';
    
                echo '<div id="on_sn_addnoact_loader" style="padding:10px 0px 0px 0px; text-align:center; display:none;">';
                    echo '<img src="'.esc_url($loader_image1).'" border="none" style="width:74px; height:74px;">';
                echo '</div>';
    
            echo '</form>';
    
        echo '</div>';
    
    }
    else
    if($ousocialnetwork_check_user ==1)
    {
        require_once( plugin_dir_path(__FILE__).'ousocialnetwork_main.php');
    }
}
?>