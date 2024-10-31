<?php
if(!defined('ABSPATH')) exit;
$oucode11 = $_POST['nonce'];
if (!wp_verify_nonce($oucode11, 'cdrthkgsx'))
{
    wp_die();
}
if(is_user_logged_in())
{
    global $wpdb;
    $ou_s_n_check_user_idme4 = intval(get_current_user_id());

    if(!$ou_s_n_check_user_idme4)
    {
        wp_die();
    }

    $ou_s_p_filea6 = plugin_dir_url( __FILE__ );
    $user_logonoa6 = $ou_s_p_filea6.'images/nouser.png';
    $ou_sn_table_friends = $wpdb->prefix . "ousocialnetworkfriends";
    $ousqlfriends = $wpdb->get_results( "SELECT * FROM $ou_sn_table_friends where ousnfriends_status_from ='1' AND ousnfriends_status_to ='0' AND ousnfriends_request_to  = '$ou_s_n_check_user_idme4' ");
    foreach ($ousqlfriends as $ousqlfriends1)
    { 
        $ousnfriends_id_a1 = $ousqlfriends1->ousnfriends_id;
        $ousnfriends_from_a1 = $ousqlfriends1->ousnfriends_from;
        $ousnfriends_to_a1 = $ousqlfriends1->ousnfriends_to;
        $ousnfriends_status_from = $ousqlfriends1->ousnfriends_status_from;
        $ousnfriends_status_to = $ousqlfriends1->ousnfriends_status_to;
        $ousnfriends_request_to = $ousqlfriends1->ousnfriends_request_to;
    
        $ou_sn_table_myprofile8 = $wpdb->prefix . "ousocialnetworkprofile";
        $ou_myprofile_sql7 = $wpdb->get_results( "SELECT * FROM $ou_sn_table_myprofile8 where ousocialnetprofile_id_user = $ousnfriends_from_a1 AND ousocialnetprofile_firstname !='' AND ousocialnetprofile_lastname !=''");
        foreach ($ou_myprofile_sql7 as $ou_myprofile_sql8)
        { 
            $ousocialnetprofile_id_a7 = $ou_myprofile_sql8->ousocialnetprofile_id;
            $ousocialnetprofile_id_user_a7 = $ou_myprofile_sql8->ousocialnetprofile_id_user;
            $ousocialnetprofile_firstname_a7 = $ou_myprofile_sql8->ousocialnetprofile_firstname;
            $ousocialnetprofile_lastname_a7 = $ou_myprofile_sql8->ousocialnetprofile_lastname;
            $ousocialnetprofile_avatar_a7 = $ou_myprofile_sql8->ousocialnetprofile_avatar;
            ?>
            <script>
            function ousearch_vp1<?php echo $ousocialnetprofile_id_a7;?>()
            {
                var formData = new FormData();
                formData.append('iduser', '<?php echo $ousocialnetprofile_id_user_a7;?>');
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
            function ousnfrremote<?php echo $ousocialnetprofile_id_a7;?>()
            {
                var formData = new FormData();
                formData.append('idfriend', '<?php echo $ousnfriends_id_a1;?>');
                formData.append('action', 'ousnformresult12');
                formData.append('nonce', '<?php echo wp_create_nonce('ddj45slmj');?>');
                jQuery.ajax({
                type: "post",
                url: ousnajaxcode.ousnajax_url,
                data: formData,
                contentType:false,
                processData:false,
                success: function(html)
                {
                    jQuery("#ousnfrequest<?php echo $ousocialnetprofile_id_a7;?>").empty();
                    jQuery("#ousnfrequest<?php echo $ousocialnetprofile_id_a7;?>").hide();
                }
                });
        
                var formData1 = new FormData();
                formData1.append('action', 'ousnformresult13');
                formData1.append('nonce', '<?php echo wp_create_nonce('59683ghieo');?>');
                jQuery.ajax({
                type: "post",
                url: ousnajaxcode.ousnajax_url,
                data: formData1,
                contentType:false,
                processData:false,
                success: function(html)
                {
                    jQuery("#oufriendssntab2_request").empty();
                    jQuery("#oufriendssntab2_request").append(html);
                    jQuery("#oufriendssntab2_request1").empty();
                    jQuery("#oufriendssntab2_request1").append(html);
                }
                });
        
            }
            </script>

            <script>
            function ousnfradd<?php echo $ousocialnetprofile_id_a7;?>()
            {
                var formData = new FormData();
                formData.append('idfriend', '<?php echo $ousnfriends_id_a1;?>');
                formData.append('action', 'ousnformresult14');
                formData.append('nonce', '<?php echo wp_create_nonce('hy67hgfv');?>');
                jQuery.ajax({
                type: "post",
                url: ousnajaxcode.ousnajax_url,
                data: formData,
                contentType:false,
                processData:false,
                success: function(html)
                {
                    jQuery("#ousnfrequest<?php echo $ousocialnetprofile_id_a7;?>").empty();
                    jQuery("#ousnfrequest<?php echo $ousocialnetprofile_id_a7;?>").hide();
                    jQuery("#oufriendssntab1_friends").empty();
                    jQuery("#oufriendssntab1_friends").append(html);
                }
                });
        
                var formData3 = new FormData();
                formData3.append('action', 'ousnformresult13');
                formData3.append('nonce', '<?php echo wp_create_nonce('59683ghieo');?>');
                jQuery.ajax({
                type: "post",
                url: ousnajaxcode.ousnajax_url,
                data: formData3,
                contentType:false,
                processData:false,
                success: function(html)
                {
                    jQuery("#oufriendssntab2_request").empty();
                    jQuery("#oufriendssntab2_request").append(html);
                    jQuery("#oufriendssntab2_request1").empty();
                    jQuery("#oufriendssntab2_request1").append(html);
                }
                });
              
            }
            </script>
            <?php
            echo '<div id="ousnfrequest'.$ousocialnetprofile_id_a7.'" style="float:left; width:388px; border-radius:10px; border: 1px solid #84a3e1; font-size:18px; height:100px; margin: 0px 5px 5px 5px; ">';
           
                echo '<div style="overflow:hidden; width:386px; height:100px; ">';
        
                    echo '<div style="float:left; width:100px; height:100px;">';
                        echo '<div style="padding:10px;">';
                            if(!empty($ousocialnetprofile_avatar_a7))
                            {
                                echo '<img src="'.esc_url($ousocialnetprofile_avatar_a7).'" border="none" style="width:80px; height:80px;">';
                            }
                            else
                            if(empty($ousocialnetprofile_avatar_a7))  
                            {
                                echo '<img src="'.esc_url($user_logonoa6).'" border="none" style="width:80px; height:80px;">';
                            }   
                        echo '</div>';
                    echo '</div>';
        
                    echo '<div style="float:left; font-size:18px; color: #84a3e1; width:286px; height:100px;">';
                        echo '<div style="padding:10px;">';
                            echo '<div style="text-align:center; padding:5px 0px 0px 0px;">';
                                echo '<a href="" onclick="ousearch_vp1'.$ousocialnetprofile_id_a7.'(); return false;" class="ou_photouser" style="font-size: 18px !important;">'.esc_html($ousocialnetprofile_firstname_a7).' '.esc_html($ousocialnetprofile_lastname_a7).'</a>';
                            echo '</div>';
        
                            echo '<div style="text-align:right; padding:18px 0px 0px 0px;">';
                                echo '<a href="" onclick="ousnfradd'.$ousocialnetprofile_id_a7.'(); return false;" class="ou_photouser" style="font-size: 14px !important;">'.esc_html('Add').'</a> | ';
                                echo '<a href="" onclick="ousnfrremote'.$ousocialnetprofile_id_a7.'(); return false;" class="ou_photouser" style="font-size: 14px !important;">'.esc_html('Delete').'</a>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
        
                echo '</div>';
        
            echo '</div>';
        }
    
    }
}
?>