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

    $ou_s_p_filea6 = plugin_dir_url( __FILE__ );

    $user_logonoa6 = $ou_s_p_filea6.'images/nouser.png';

    $ou_sn_table_message2 = $wpdb->prefix . "ousocialnetworkmessage";

    $ousqlmessage2 = $wpdb->get_results( "SELECT DISTINCT ousnmessage_to FROM $ou_sn_table_message2 where ousnmessage_from ='$ou_s_n_check_user_idmen2' AND ousnmessage_code = 0 ");
    foreach ($ousqlmessage2 as $ousqlmessage3)
    { 
        $ousnmessage_id_a2 = $ousqlmessage3->ousnmessage_id;
        $ousnmessage_from_a2 = $ousqlmessage3->ousnmessage_from;
        $ousnmessage_to_a2 = $ousqlmessage3->ousnmessage_to;
        $ousnmessage_status_a2 = $ousqlmessage3->ousnmessage_status;
        $ousnmessage_message_a2 = $ousqlmessage3->ousnmessage_message;
        $ousnmessage_date_a2 = $ousqlmessage3->ousnmessage_date;
    
        $ou_sn_table_myprofile9 = $wpdb->prefix . "ousocialnetworkprofile";
        $ou_myprofile_sql9 = $wpdb->get_results( "SELECT * FROM $ou_sn_table_myprofile9 where ousocialnetprofile_id_user = $ousnmessage_to_a2 AND ousocialnetprofile_firstname !='' AND ousocialnetprofile_lastname !=''");
        foreach ($ou_myprofile_sql9 as $ou_myprofile_sql10)
        { 
            $ousocialnetprofile_id_a10 = $ou_myprofile_sql10->ousocialnetprofile_id;
            $ousocialnetprofile_id_user_a10 = $ou_myprofile_sql10->ousocialnetprofile_id_user;
            $ousocialnetprofile_firstname_a10 = $ou_myprofile_sql10->ousocialnetprofile_firstname;
            $ousocialnetprofile_lastname_a10 = $ou_myprofile_sql10->ousocialnetprofile_lastname;
            $ousocialnetprofile_avatar_a10 = $ou_myprofile_sql10->ousocialnetprofile_avatar;
            ?>
            <script>
            function ousearch_vp1<?php echo $ousocialnetprofile_id_a10;?>()
            {
                var formData = new FormData();
                formData.append('iduser', '<?php echo $ousocialnetprofile_id_user_a10;?>');
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
            function ouopenmessage_vp1<?php echo $ousocialnetprofile_id_a10;?>()
            {
                var formData = new FormData();
                formData.append('iduser', '<?php echo $ousocialnetprofile_id_user_a10;?>');
                formData.append('action', 'ousnformresult23');
                formData.append('nonce', '<?php echo wp_create_nonce('cswefza2');?>');
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
                    jQuery("#ousnmymessageviewdisplay").empty();
                    jQuery("#ousnmymessageviewdisplay").append(html);
                    jQuery("#ousnmymessagesloader").hide();
                    jQuery("#ousnmymessageviewdisplay").show();
                }
                });
            }
            </script>

            <script>
            function ousnmessageinboxremove<?php echo $ousocialnetprofile_id_a10;?>()
            {
                var formData = new FormData();
                formData.append('iduser', '<?php echo $ousocialnetprofile_id_user_a10;?>');
                formData.append('action', 'ousnformresult25');
                formData.append('nonce', '<?php echo wp_create_nonce('v5hgxws');?>');
                jQuery.ajax({
                type: "post",
                url: ousnajaxcode.ousnajax_url,
                data: formData,
                contentType:false,
                processData:false,
                success: function(html)
                {
                    jQuery("#ousndeletemessage1<?php echo $ousocialnetprofile_id_a10;?>").empty();
                    jQuery("#ousndeletemessage1<?php echo $ousocialnetprofile_id_a10;?>").hide();
                }
                });
            }
            </script>
            <?php
            echo '<div id="ousndeletemessage1'.$ousocialnetprofile_id_a10.'" style="float:left; width:388px; border-radius:10px; border: 1px solid #84a3e1; font-size:18px; height:100px; margin: 0px 5px 5px 5px; ">';
           
                echo '<div style="overflow:hidden; width:386px; height:100px; ">';
                
                    echo '<div style="float:left; width:100px; height:100px;">';
                        echo '<div style="padding:10px;">';
                            if(!empty($ousocialnetprofile_avatar_a10))
                            {
                                echo '<img src="'.esc_url($ousocialnetprofile_avatar_a10).'" border="none" style="width:80px; height:80px;">';
                            }
                            else
                            if(empty($ousocialnetprofile_avatar_a10))  
                            {
                                echo '<img src="'.esc_url($user_logonoa6).'" border="none" style="width:80px; height:80px;">';
                            }   
                        echo '</div>';
                    echo '</div>';
        
                    echo '<div style="float:left; font-size:18px; color: #84a3e1; width:286px; height:100px;">';
                        echo '<div style="padding:10px;">';
                            echo '<div style="text-align:center; padding:5px 0px 0px 0px;">';
                                echo '<a href="" onclick="ouopenmessage_vp1'.$ousocialnetprofile_id_a10.'(); return false;" class="ou_photouser" style="font-size: 18px !important;">'.esc_html('OPEN MESSAGES').'</a>';
                                echo '<div style="text-align:left; font-size:14px;">';
                                    echo esc_html('To: '); 
                                    echo '<a href="" onclick="ousearch_vp1'.$ousocialnetprofile_id_a10.'(); return false;" class="ou_photouser" style="font-size: 14px !important;">'.esc_html($ousocialnetprofile_firstname_a10).' '.esc_html($ousocialnetprofile_lastname_a10).'</a>';
                                echo '</div>';
                            echo '</div>';
        
                            echo '<div style="text-align:right; font-size:14px; padding:10px 0px 0px 0px;">';
                            
                                echo '<a href="" onclick="ousnmessageinboxremove'.$ousocialnetprofile_id_a10.'(); return false;" class="ou_photouser" style="font-size: 14px !important;">'.esc_html('Delete').'</a>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
        
                echo '</div>';
        
            echo '</div>';
        }
    }
}
?>