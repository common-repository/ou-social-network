<?php if(!defined('ABSPATH')) exit; 
$oucode23 = $_POST['nonce'];
if (!wp_verify_nonce($oucode23, 'cswefza2'))
{
    wp_die();
}
if(is_user_logged_in())
{
    ?>
    <script>
    function oumessage_tab3()
    {
        jQuery("#ousnmymessageviewdisplay").hide();
        jQuery("#ousnmymessageviewdisplay").empty();
        jQuery("#ousnmymessageview").show();
    }
    </script>
    <?php
    global $wpdb;
    $iduser = intval($_POST['iduser']);
    $ou_s_p_filea6 = plugin_dir_url( __FILE__ );
    $user_logonoa6 = $ou_s_p_filea6.'images/nouser.png';

    $ou_s_n_check_user_idmen = intval(get_current_user_id());

    if(!$ou_s_n_check_user_idmen || !$iduser)
    {
        wp_die();
    }

    $ou_sn_table_myprofile28 = $wpdb->prefix . "ousocialnetworkprofile";
    $ou_myprofile_sql27 = $wpdb->get_results( "SELECT * FROM $ou_sn_table_myprofile28 where ousocialnetprofile_id_user = $iduser AND ousocialnetprofile_firstname !='' AND ousocialnetprofile_lastname !=''");
    foreach ($ou_myprofile_sql27 as $ou_myprofile_sql28)
    { 
        $ousocialnetprofile_id_a11 = $ou_myprofile_sql28->ousocialnetprofile_id;
        $ousocialnetprofile_id_user_a11 = $ou_myprofile_sql28->ousocialnetprofile_id_user;
        $ousocialnetprofile_firstname_a11 = $ou_myprofile_sql28->ousocialnetprofile_firstname;
        $ousocialnetprofile_lastname_a11 = $ou_myprofile_sql28->ousocialnetprofile_lastname;
        $ousocialnetprofile_avatar_a11 = $ou_myprofile_sql28->ousocialnetprofile_avatar;
    }

    echo '<div style="width:800px; min-height:10px; margin:5px 0px 0px 0px; overflow: hidden;">';
        echo '<div style="padding:5px 5px 5px 5px; text-align:left; font-size:20px; color:#0073e6;">';
        
            echo '<a href="" onclick="oumessage_tab3(); return false;" class="ou_photouser" style="font-size: 20px !important;">Back</a>'; 
            echo ' | ';
            echo esc_html($ousocialnetprofile_firstname_a11).' '.esc_html($ousocialnetprofile_lastname_a11);
        echo '</div>';
    echo '</div>';

    echo '<div style="width:790px; min-height:10px; margin:5px; overflow: hidden;">';
    
        echo '<div style="width:788px; height:400px; overflow-x: hidden; overflow-y: scroll; border: 1px solid #84a3e1;">';
            $ou_sn_table_messageb = $wpdb->prefix . "ousocialnetworkmessage";

            $wpdb->update($ou_sn_table_messageb,
            array( 'ousnmessage_status' => 0 ),
            array( 'ousnmessage_to' =>$ou_s_n_check_user_idmen, 'ousnmessage_from' => $iduser));

            $ousqlmessagbeb = $wpdb->get_results( "SELECT * FROM $ou_sn_table_messageb where ((ousnmessage_to ='$ou_s_n_check_user_idmen' AND ousnmessage_from = '$iduser' ) OR (ousnmessage_to ='$iduser' AND ousnmessage_from = '$ou_s_n_check_user_idmen' ) ) ORDER BY ousnmessage_id ASC");
            foreach ($ousqlmessagbeb as $ousqlmessageb1)
            { 
                $ousnmessage_id_ab1 = $ousqlmessageb1->ousnmessage_id;
                $ousnmessage_from_ab1 = $ousqlmessageb1->ousnmessage_from;
                $ousnmessage_to_ab1 = $ousqlmessageb1->ousnmessage_to;
                $ousnmessage_status_ab1 = $ousqlmessageb1->ousnmessage_status;
                $ousnmessage_message_ab1 = $ousqlmessageb1->ousnmessage_message;
                $ousnmessage_date_ab1 = $ousqlmessageb1->ousnmessage_date;
                $ousnmessage_code_ab1 = $ousqlmessageb1->ousnmessage_code;
            
                if($ou_s_n_check_user_idmen == $ousnmessage_from_ab1 && $ousnmessage_to_ab1 == $iduser && $ousnmessage_code_ab1 == '0')
                {
                    $ou_sn_table_myprofilen8 = $wpdb->prefix . "ousocialnetworkprofile";
                    $ou_myprofile_sqln7 = $wpdb->get_results( "SELECT * FROM $ou_sn_table_myprofilen8 where ousocialnetprofile_id_user = $ou_s_n_check_user_idmen AND ousocialnetprofile_firstname !='' AND ousocialnetprofile_lastname !=''");
                    foreach ($ou_myprofile_sqln7 as $ou_myprofile_sqln8)
                    { 
                        $ousocialnetprofile_id_an7 = $ou_myprofile_sqln8->ousocialnetprofile_id;
                        $ousocialnetprofile_id_user_an7 = $ou_myprofile_sqln8->ousocialnetprofile_id_user;
                        $ousocialnetprofile_firstname_an7 = $ou_myprofile_sqln8->ousocialnetprofile_firstname;
                        $ousocialnetprofile_lastname_an7 = $ou_myprofile_sqln8->ousocialnetprofile_lastname;
                        $ousocialnetprofile_avatar_an7 = $ou_myprofile_sqln8->ousocialnetprofile_avatar;
                    
                        echo '<div style="overflow:hidden; margin:5px 0px 0px 0px; font-size:14px; width:770px;">';
                    
                            echo '<div style="float:left; width:70px; height:70px;">';
                                echo '<div style="padding:5px;">';
                                    if(!empty($ousocialnetprofile_avatar_an7))
                                    {
                                        echo '<img src="'.esc_url($ousocialnetprofile_avatar_an7).'" border="none" style="width:60px; height:60px;">';
                                    }
                                    else
                                    if(empty($ousocialnetprofile_avatar_an7))  
                                    {
                                        echo '<img src="'.esc_url($user_logonoa6).'" border="none" style="width:60px; height:60px;">';
                                    }  
                                echo '</div>';
                            echo '</div>';
                    
                            echo '<div style="float:left; width:700px; height:70px;">';
                                echo '<div style="padding:5px;">';
                                    echo '<div style="font-size:18px; color: #84a3e1;">';
                                        echo esc_html($ousocialnetprofile_firstname_an7).' '.esc_html($ousocialnetprofile_lastname_an7);
                                        echo ': ';
                                        echo '<span style="color: #f2f2f2;">'.esc_html($ousnmessage_message_ab1).'</span>';
                                    echo '</div>';
                    
                                    echo '<div style="padding: 5px 0px 0px; color: #696969; font-size:14px;">';
                                        echo esc_html('Date: ').esc_html($ousnmessage_date_ab1);
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                    
                        echo '</div>';
                    }
                }
            
                if($iduser == $ousnmessage_from_ab1 && $ousnmessage_to_ab1 == $ou_s_n_check_user_idmen && $ousnmessage_code_ab1 == '1')
                {
                    $ou_sn_table_myprofilen8 = $wpdb->prefix . "ousocialnetworkprofile";
                    $ou_myprofile_sqln7 = $wpdb->get_results( "SELECT * FROM $ou_sn_table_myprofilen8 where ousocialnetprofile_id_user = $iduser AND ousocialnetprofile_firstname !='' AND ousocialnetprofile_lastname !=''");
                    foreach ($ou_myprofile_sqln7 as $ou_myprofile_sqln8)
                    { 
                        $ousocialnetprofile_id_an7 = $ou_myprofile_sqln8->ousocialnetprofile_id;
                        $ousocialnetprofile_id_user_an7 = $ou_myprofile_sqln8->ousocialnetprofile_id_user;
                        $ousocialnetprofile_firstname_an7 = $ou_myprofile_sqln8->ousocialnetprofile_firstname;
                        $ousocialnetprofile_lastname_an7 = $ou_myprofile_sqln8->ousocialnetprofile_lastname;
                        $ousocialnetprofile_avatar_an7 = $ou_myprofile_sqln8->ousocialnetprofile_avatar;
                    
                        echo '<div style="overflow:hidden; margin:5px 0px 0px 0px; font-size:14px; width:770px;">';
                    
                            echo '<div style="float:left; width:70px; height:70px;">';
                                echo '<div style="padding:5px;">';
                                    if(!empty($ousocialnetprofile_avatar_an7))
                                    {
                                        echo '<img src="'.esc_url($ousocialnetprofile_avatar_an7).'" border="none" style="width:60px; height:60px;">';
                                    }
                                    else
                                    if(empty($ousocialnetprofile_avatar_an7))  
                                    {
                                        echo '<img src="'.esc_url($user_logonoa6).'" border="none" style="width:60px; height:60px;">';
                                    }  
                                echo '</div>';
                            echo '</div>';
                    
                            echo '<div style="float:left; width:700px; height:70px;">';
                                echo '<div style="padding:5px;">';
                                    echo '<div style="font-size:18px; color: #84a3e1;">';
                                        echo esc_html($ousocialnetprofile_firstname_an7).' '.esc_html($ousocialnetprofile_lastname_an7);
                                        echo ': ';
                                        echo '<span style="color: #f2f2f2;">'.esc_html($ousnmessage_message_ab1).'</span>';
                                    echo '</div>';
                    
                                    echo '<div style="padding: 5px 0px 0px; color: #696969; font-size:14px;">';
                                        echo esc_html('Date: ').esc_html($ousnmessage_date_ab1);
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                    
                        echo '</div>';
                    }
                
                }
            }

            echo '<div id="ousnmessagereadnewm"></div>';
        echo '</div>';
        ?>
        <script>
        jQuery(function(){

            jQuery('#ouprofilemessagetextx1').keypress(function (e) {
            var key = e.which;
            if(key == 13)  
            {
                var sendmessage = jQuery('#ouprofilemessagetextx1').val();
            
                if(sendmessage !='')
                {
                    var formData = new FormData();
                    formData.append('ousnmesssend', sendmessage);
                    formData.append('iduser', '<?php echo $iduser;?>');
                    formData.append('action', 'ousnformresult24');
                    formData.append('nonce', '<?php echo wp_create_nonce('9k9kj89');?>');
                    jQuery.ajax({
                    type: "post",
                    url: ousnajaxcode.ousnajax_url,
                    data: formData,
                    contentType:false,
                    processData:false,
                    success: function(html)
                    {
                        jQuery("#ouprofilemessagetextx1").val('');
                        jQuery("#ousnmessagereadnewm").append(html);
                    }
                    });
                }
                else
                {
                    alert("You forgot to write the message!");
                }
  
            }
  
            });
 
        });    
        </script>
        <?php   
        echo '<div style="width:788px; min-height:100px; background: #84a3e1;">';
            echo '<div style="padding:10px 40px;">';
                echo '<textarea placeholder ="Your message. <Enter> to Send Message." id="ouprofilemessagetextx1" style="width:100% !important; height:100px !important; border: 1px solid #001a33 !important; resize:none !important; color:#000000 !important; font-size:14px !important;"></textarea>';
            echo '</div>';
        echo '</div>';

    echo '</div>';
}
?>