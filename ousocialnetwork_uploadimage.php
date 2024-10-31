<?php
if(!defined('ABSPATH')) exit;
$oucode3 = $_POST['nonce'];
if (!wp_verify_nonce($oucode3, 'dffpo34sk'))
{
    wp_die();
}
if(is_user_logged_in())
{
    global $wpdb;
    $ou_s_n_check_usersaveinfodb3 = intval(get_current_user_id());

    if(!$ou_s_n_check_usersaveinfodb3)
    {
        wp_die();
    }

    $ou_ns_imagesource = strtolower(pathinfo($_FILES['ou_social_image']['name'], PATHINFO_EXTENSION));

    $ou_ns_check_images = array('jpeg','jpg','JPEG','JPG','png','PNG','GIF','gif');

    if(in_array($ou_ns_imagesource, $ou_ns_check_images))
    {
       $ou_sn_link_at_the_image = uniqid().'.'.$ou_ns_imagesource;
	   $ou_sn_im_upload = wp_upload_bits($ou_sn_link_at_the_image, null, file_get_contents($_FILES["ou_social_image"]["tmp_name"]));
	
	   $ou_sn_im_result = wp_get_image_editor( $ou_sn_im_upload['file'] );
		
	   if(!is_wp_error($ou_sn_im_result))
	   {
		  $ou_sn_im_result->resize( 195, 195, true ); 
		  $ou_sn_im_result->save($ou_sn_im_upload['file'] );
	   }
		
	   echo '<img src="'.esc_url($ou_sn_im_upload['url']).'"  border="none" style="width:195px; height:195px;">';
    
        $ou_sn_table_myprofile3 = $wpdb->prefix . "ousocialnetworkprofile";
        $ou_myprofile_sql3 = $wpdb->get_results( "SELECT * FROM $ou_sn_table_myprofile3 where ousocialnetprofile_id_user = $ou_s_n_check_usersaveinfodb3 AND ousocialnetprofile_firstname !='' AND ousocialnetprofile_lastname !=''");
        foreach ($ou_myprofile_sql3 as $ou_myprofile_sql4)
        { 
            $ousocialnetprofile_id_a3 = $ou_myprofile_sql4->ousocialnetprofile_id;
            $ousocialnetprofile_id_user_a3 = $ou_myprofile_sql4->ousocialnetprofile_id_user;
            $ousocialnetprofile_avatar_a3 = $ou_myprofile_sql4->ousocialnetprofile_avatar;
        }
    
        if(!empty($ousocialnetprofile_avatar_a3))
	   {
		  $ou_sn_upload_dir = wp_upload_dir();
		  $ou_sn_upload_start_before = str_replace($ou_sn_upload_dir['baseurl'], "", $ousocialnetprofile_avatar_a3);
		  $ou_nsaz_upload_start = '../../uploads'.$ou_sn_upload_start_before;
			
		  if(file_exists($ou_nsaz_upload_start))
		  {
			 unlink($ou_nsaz_upload_start);
		  } 			
	   }
    
        $wpdb->update($ou_sn_table_myprofile3,
	   array( 'ousocialnetprofile_avatar' => $ou_sn_im_upload['url']),
	   array( 'ousocialnetprofile_id_user' =>$ousocialnetprofile_id_user_a3));
    
    }
}
?>