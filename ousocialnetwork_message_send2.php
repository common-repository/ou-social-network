<?php
if(!defined('ABSPATH')) exit;
$oucode24 = $_POST['nonce'];
if (!wp_verify_nonce($oucode24, '9k9kj89'))
{
    wp_die();
}
if(is_user_logged_in())
{
    global $wpdb;
    $iduser1 = $_POST['iduser'];
    $idusersend = intval($_POST['iduser']);

    $ou_s_p_filea6 = plugin_dir_url( __FILE__ );
    $user_logonoa6 = $ou_s_p_filea6.'images/nouser.png';
 
    $ou_s_n_check_me = intval(get_current_user_id());
    $outextmessage =  sanitize_text_field($_POST['ousnmesssend']);

    if(!$ou_s_n_check_me || !$idusersend || !$outextmessage)
    {
        wp_die();
    }

    if(!empty($outextmessage))
    {
        $ousocialtablemessage = $wpdb->prefix . "ousocialnetworkmessage";
        $oudate1 = current_time('d m Y H:i');

        $wpdb->insert( $ousocialtablemessage, array( 'ousnmessage_from' => $ou_s_n_check_me, 'ousnmessage_to' => $idusersend, 'ousnmessage_message' => $outextmessage, 'ousnmessage_date' => $oudate1, 'ousnmessage_status' => 1, 'ousnmessage_code' => 1) );

        $wpdb->insert( $ousocialtablemessage, array( 'ousnmessage_from' => $ou_s_n_check_me, 'ousnmessage_to' => $idusersend, 'ousnmessage_message' => $outextmessage, 'ousnmessage_date' => $oudate1, 'ousnmessage_status' => 0, 'ousnmessage_code' => 0) );

        $ou_sn_table_myprofilen8 = $wpdb->prefix . "ousocialnetworkprofile";
        $ou_myprofile_sqln7 = $wpdb->get_results( "SELECT * FROM $ou_sn_table_myprofilen8 where ousocialnetprofile_id_user = $ou_s_n_check_me AND ousocialnetprofile_firstname !='' AND ousocialnetprofile_lastname !=''");
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
                            echo '<span style="color: #f2f2f2;">'.esc_html($outextmessage).'</span>';
                        echo '</div>';
                    
                        echo '<div style="padding: 5px 0px 0px; color: #696969; font-size:14px;">';
                            echo esc_html('Date: ').esc_html($oudate1);
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
                    
            echo '</div>';
        }
    }
}
?>