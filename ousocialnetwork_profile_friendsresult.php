<?php if(!defined('ABSPATH')) exit;
$oucode18 = $_POST['nonce'];
if (!wp_verify_nonce($oucode18, '123sqa3q'))
{
    wp_die();
}
if(is_user_logged_in())
{
    ?>
    <script>
    function ousnprofilehidefriends()
    {
        jQuery("#ouprofilefriendsv").hide();
        jQuery("#ousnprofileci").show();
        jQuery("#ouprofilewallsv").show();
    }
    </script>
    <?php
    $ouiduserprofile1 = $_POST['ouiduserprofile'];
    $ouiduserprofile = intval($ouiduserprofile1);

    if(!$ouiduserprofile)
    {
        wp_die();
    }

    global $wpdb;
    echo '<div style="font-size:18px; color: #84a3e1; overflow: hidden; width:553px;   text-align:right; margin:0px 0px 10px 0px;">';
        echo '<a href="" onclick="ousnprofilehidefriends(); return false;" class="ou_photouser">'.esc_html('Hide friends').'</a>';   
    echo '</div>';
    $ou_s_p_filea6 = plugin_dir_url( __FILE__ );
    $user_logonoa6 = $ou_s_p_filea6.'images/nouser.png';
    $ou_sn_table_friends = $wpdb->prefix . "ousocialnetworkfriends";
    $ousqlfriends = $wpdb->get_results( "SELECT * FROM $ou_sn_table_friends where ousnfriends_status_from ='1' AND ousnfriends_status_to ='1' AND ( (ousnfriends_from  = '$ouiduserprofile') OR (ousnfriends_to = '$ouiduserprofile')) ");
    foreach ($ousqlfriends as $ousqlfriends1)
    { 
        $ousnfriends_id_a1 = $ousqlfriends1->ousnfriends_id;
        $ousnfriends_from_a1 = $ousqlfriends1->ousnfriends_from;
        $ousnfriends_to_a1 = $ousqlfriends1->ousnfriends_to;
        $ousnfriends_status_from = $ousqlfriends1->ousnfriends_status_from;
        $ousnfriends_status_to = $ousqlfriends1->ousnfriends_status_to;
        $ousnfriends_request_to = $ousqlfriends1->ousnfriends_request_to;
    
        if($ousnfriends_from_a1 != $ouiduserprofile)
        {
            $ou_idfriendscheck = $ousnfriends_from_a1;
        }
    
        if($ousnfriends_to_a1 != $ouiduserprofile)
        {
            $ou_idfriendscheck = $ousnfriends_to_a1;
        }
    
        $ou_sn_table_myprofile8 = $wpdb->prefix . "ousocialnetworkprofile";
        $ou_myprofile_sql7 = $wpdb->get_results( "SELECT * FROM $ou_sn_table_myprofile8 where ousocialnetprofile_id_user = $ou_idfriendscheck AND ousocialnetprofile_firstname !='' AND ousocialnetprofile_lastname !='' ORDER BY ousocialnetprofile_id DESC LIMIT 4 ");
        foreach ($ou_myprofile_sql7 as $ou_myprofile_sql8)
        { 
            $ousocialnetprofile_id_a7 = $ou_myprofile_sql8->ousocialnetprofile_id;
            $ousocialnetprofile_id_user_a7 = $ou_myprofile_sql8->ousocialnetprofile_id_user;
            $ousocialnetprofile_firstname_a7 = $ou_myprofile_sql8->ousocialnetprofile_firstname;
            $ousocialnetprofile_lastname_a7 = $ou_myprofile_sql8->ousocialnetprofile_lastname;
            $ousocialnetprofile_avatar_a7 = $ou_myprofile_sql8->ousocialnetprofile_avatar;
            ?>
            <script>
            function ousearch_vp<?php echo $ousocialnetprofile_id_a7;?>()
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
            echo '<div style="font-size:18px; color: #84a3e1; overflow: hidden; height:100px; width:553px;  border: 1px solid #84a3e1; border-radius:10px; margin:10px 0px 0px 0px;">';
        
                echo '<div style="float:left; width:100px; height:100px;">';
                    echo '<div style="padding:10px;">';
                        if(!empty($ousocialnetprofile_avatar_a7))
                        {
                            echo '<img src="'.esc_url($ousocialnetprofile_avatar_a7).'" border="none" style="width:78px; height:78px;">';
                        }
                        else
                        if(empty($ousocialnetprofile_avatar_a7))  
                        {
                            echo '<img src="'.esc_url($user_logonoa6).'" border="none" style="width:78px; height:78px;">';
                        }  
                    echo '</div>';
                echo '</div>';
        
                echo '<div style="float:left; text-align:center; width:443px; height:100px;">';
                    echo '<div style="padding:35px 0px 0px 0px;">';
                        echo '<a href="" onclick="ousearch_vp'.$ousocialnetprofile_id_a7.'(); return false;" class="ou_photouser" style="font-size: 26px !important;">'.esc_html($ousocialnetprofile_firstname_a7).'   '.esc_html($ousocialnetprofile_lastname_a7).'</a>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        
        }
    }
}
?>