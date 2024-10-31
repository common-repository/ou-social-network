<?php
if(!defined('ABSPATH')) exit;
if(is_user_logged_in())
{
    echo '<div id="ousnprofilewalladdpost"></div>';
    $ou_s_p_filea6 = plugin_dir_url( __FILE__ );
    $user_logonoa6 = $ou_s_p_filea6.'images/nouser.png';
    $ousocialtablewall2 = $wpdb->prefix . "ousocialnetworwall";
    $ousqlwall = $wpdb->get_results( "SELECT * FROM $ousocialtablewall2 where ousocialnetworwall_to ='$ouiduser' ORDER BY ousocialnetworwall_id DESC LIMIT 20 ");
    foreach ($ousqlwall as $ousqlwall1)
    { 
        $ousocialnetworwall_id_a1 = $ousqlwall1->ousocialnetworwall_id;
        $ousocialnetworwall_from_a1 = $ousqlwall1->ousocialnetworwall_from;
        $ousocialnetworwall_to_a1 = $ousqlwall1->ousocialnetworwall_to;
        $ousocialnetworwall_message_a1 = $ousqlwall1->ousocialnetworwall_message;
        $ousocialnetworwall_date_a1 = $ousqlwall1->ousocialnetworwall_date;
        ?>
        <script>
        function oupostdel<?php echo $ousocialnetworwall_id_a1;?>()
        {
            var formData = new FormData();
            formData.append('ouidpost', '<?php echo $ousocialnetworwall_id_a1;?>');
            formData.append('action', 'ousnformresult27');
            formData.append('nonce', '<?php echo wp_create_nonce('fgv56f4');?>');
            jQuery.ajax({
            type: "post",
            url: ousnajaxcode.ousnajax_url,
            data: formData,
            contentType:false,
            processData:false,
            success: function(html)
            {
                jQuery("#ousnwallcf<?php echo $ousocialnetworwall_id_a1;?>").hide();
            }
            });
        }
        </script>
        <?php
        $ou_sn_table_myprofile83 = $wpdb->prefix . "ousocialnetworkprofile";
        $ou_myprofile_sql73 = $wpdb->get_results( "SELECT * FROM $ou_sn_table_myprofile83 where ousocialnetprofile_id_user = $ousocialnetworwall_from_a1 AND ousocialnetprofile_firstname !='' AND ousocialnetprofile_lastname !=''");
        foreach ($ou_myprofile_sql73 as $ou_myprofile_sql78)
        { 
            $ousocialnetprofile_id_a73 = $ou_myprofile_sql78->ousocialnetprofile_id;
            $ousocialnetprofile_id_user_a73 = $ou_myprofile_sql78->ousocialnetprofile_id_user;
            $ousocialnetprofile_firstname_a73 = $ou_myprofile_sql78->ousocialnetprofile_firstname;
            $ousocialnetprofile_lastname_a73 = $ou_myprofile_sql78->ousocialnetprofile_lastname;
            $ousocialnetprofile_avatar_a73 = $ou_myprofile_sql78->ousocialnetprofile_avatar;
        
            echo '<div id="ousnwallcf'.$ousocialnetworwall_id_a1.'" style="margin:0px 0px 10px 0px; width:553px; overflow:hidden;">';
        
                echo '<div style="float:left; width:70px; height:70px;">';
                    echo '<div style="padding:5px;">';
                        if(!empty($ousocialnetprofile_avatar_a73))
                        {
                            echo '<img src="'.esc_url($ousocialnetprofile_avatar_a73).'" border="none" style="width:60px; height:60px;">';
                        }
                        else
                        if(empty($ousocialnetprofile_avatar_a73))  
                        {
                            echo '<img src="'.esc_url($user_logonoa6).'" border="none" style="width:60px; height:60px;">';
                        }  
                    echo '</div>';
                echo '</div>';
        
                echo '<div style="float:left; width:483px; height:70px;">';
                    echo '<div style="padding:5px;">';
                        echo '<div style="font-size:18px; color: #84a3e1;">';
                            echo esc_html($ousocialnetprofile_firstname_a73).' '.esc_html($ousocialnetprofile_lastname_a73);
                            echo ': ';
                            echo '<span style="color: #f2f2f2;">'.esc_html($ousocialnetworwall_message_a1).'</span>';
                        echo '</div>';
                    
                        echo '<div style="padding: 5px 0px 0px; color: #696969; font-size:14px;">';
                            echo esc_html('Date: ').esc_html($ousocialnetworwall_date_a1);
                            if($ousocialnetworwall_from_a1 == $ou_snmiol_idme ||  $ousocialnetworwall_to_a1 == $ou_snmiol_idme)
                            {
                                echo ' | ';
                                echo '<a href="" onclick="oupostdel'.$ousocialnetworwall_id_a1.'(); return false;" class="ou_photouser" style="font-size: 14px !important;">'.esc_html('Delete').'</a>';
                            }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
        
            echo '</div>';
        
        }
    
    }
}
?>