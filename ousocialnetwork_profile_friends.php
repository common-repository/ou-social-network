<?php
if(!defined('ABSPATH')) exit;
if(is_user_logged_in())
{
    $ou_s_p_filea6 = plugin_dir_url( __FILE__ );
    $user_logonoa6 = $ou_s_p_filea6.'images/nouser.png';
    $ou_sn_table_friends = $wpdb->prefix . "ousocialnetworkfriends";
    $ousqlfriends = $wpdb->get_results( "SELECT * FROM $ou_sn_table_friends where ousnfriends_status_from ='1' AND ousnfriends_status_to ='1' AND ( (ousnfriends_from  = '$ouiduser') OR (ousnfriends_to = '$ouiduser')) ");
    foreach ($ousqlfriends as $ousqlfriends1)
    { 
        $ousnfriends_id_a1 = $ousqlfriends1->ousnfriends_id;
        $ousnfriends_from_a1 = $ousqlfriends1->ousnfriends_from;
        $ousnfriends_to_a1 = $ousqlfriends1->ousnfriends_to;
        $ousnfriends_status_from = $ousqlfriends1->ousnfriends_status_from;
        $ousnfriends_status_to = $ousqlfriends1->ousnfriends_status_to;
        $ousnfriends_request_to = $ousqlfriends1->ousnfriends_request_to;
    
        if($ousnfriends_from_a1 != $ouiduser)
        {
            $ou_idfriendscheck = $ousnfriends_from_a1;
        }
    
        if($ousnfriends_to_a1 != $ouiduser)
        {
            $ou_idfriendscheck = $ousnfriends_to_a1;
        }
    
        $ou_sn_table_myprofile8 = $wpdb->prefix . "ousocialnetworkprofile";
        $ou_myprofile_sql7 = $wpdb->get_results( "SELECT * FROM $ou_sn_table_myprofile8 where ousocialnetprofile_id_user = $ou_idfriendscheck AND ousocialnetprofile_firstname !='' AND ousocialnetprofile_lastname !='' ORDER BY ousocialnetprofile_id DESC LIMIT 8 ");
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

        

            <?php
            echo '<div style="float:left; width:88px; border-radius:5px;  border: 1px solid #84a3e1; font-size:18px; height:88px; margin: 5px 4px 5px 4px; ">';
                echo '<div style="padding:5px;">';
                    echo '<a href="" onclick="ousearch_vp1'.$ousocialnetprofile_id_a7.'(); return false;">';
                        if(!empty($ousocialnetprofile_avatar_a7))
                        {
                            echo '<img src="'.esc_url($ousocialnetprofile_avatar_a7).'" border="none" style="width:78px; height:78px;">';
                        }
                        else
                        if(empty($ousocialnetprofile_avatar_a7))  
                        {
                            echo '<img src="'.esc_url($user_logonoa6).'" border="none" style="width:78px; height:78px;">';
                        }   
                    echo '</a>';
                echo '</div>';
            echo '</div>';
              
        }
    
    }
}
?>