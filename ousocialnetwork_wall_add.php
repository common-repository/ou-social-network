<?php
if(!defined('ABSPATH')) exit;
$oucode26 = $_POST['nonce'];
if (!wp_verify_nonce($oucode26, 'xc45hmkl'))
{
    wp_die();
}
if(is_user_logged_in())
{
    global $wpdb;
    $oufromuser = intval($_POST['oufromuser']);

    $outouser = intval($_POST['outouser']);

    $ouposttext =  sanitize_text_field($_POST['ouposttext']);

    if(!$ouposttext || !$outouser || !$oufromuser)
    {
        wp_die();
    }

    if(!empty($ouposttext))
    {
        $ou_s_p_filea6 = plugin_dir_url( __FILE__ );
        $user_logonoa6 = $ou_s_p_filea6.'images/nouser.png';
    
        $ousocialtablewall = $wpdb->prefix . "ousocialnetworwall";
        $oudate1 = current_time('d m Y H:i');
    
        $wpdb->insert( $ousocialtablewall, array( 'ousocialnetworwall_from' => $oufromuser, 'ousocialnetworwall_to' => $outouser, 'ousocialnetworwall_message' => $ouposttext, 'ousocialnetworwall_date' => $oudate1 ) );
    
        $ousnwallpostid = $wpdb->insert_id;
    
        ?>
        <script>
        function oupostdel<?php echo $ousnwallpostid;?>()
        {
            var formData = new FormData();
            formData.append('ouidpost', '<?php echo $ousnwallpostid;?>');
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
                jQuery("#ousnwallcf<?php echo $ousnwallpostid;?>").hide();
            }
            });
        }
        </script>
        <?php
        $ou_sn_table_myprofile83 = $wpdb->prefix . "ousocialnetworkprofile";
        $ou_myprofile_sql73 = $wpdb->get_results( "SELECT * FROM $ou_sn_table_myprofile83 where ousocialnetprofile_id_user = $oufromuser AND ousocialnetprofile_firstname !='' AND ousocialnetprofile_lastname !=''");
        foreach ($ou_myprofile_sql73 as $ou_myprofile_sql78)
        { 
            $ousocialnetprofile_id_a73 = $ou_myprofile_sql78->ousocialnetprofile_id;
            $ousocialnetprofile_id_user_a73 = $ou_myprofile_sql78->ousocialnetprofile_id_user;
            $ousocialnetprofile_firstname_a73 = $ou_myprofile_sql78->ousocialnetprofile_firstname;
            $ousocialnetprofile_lastname_a73 = $ou_myprofile_sql78->ousocialnetprofile_lastname;
            $ousocialnetprofile_avatar_a73 = $ou_myprofile_sql78->ousocialnetprofile_avatar;
        
            echo '<div id="ousnwallcf'.$ousnwallpostid.'" style="margin:0px 0px 10px 0px; width:553px; overflow:hidden;">';
        
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
                            echo '<span style="color: #f2f2f2;">'.esc_html($ouposttext).'</span>';
                        echo '</div>';
                    
                        echo '<div style="padding: 5px 0px 0px; color: #696969; font-size:14px;">';
                            echo esc_html('Date: ').esc_html($oudate1);
                            echo ' | ';
                            echo '<a href="" onclick="oupostdel'.$ousnwallpostid.'(); return false;" class="ou_photouser" style="font-size: 14px !important;">'.esc_html('Delete').'</a>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
        
            echo '</div>';
        
        }
    }
}
?>