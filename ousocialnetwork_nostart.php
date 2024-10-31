<?php if(!defined('ABSPATH')) exit; ?>
<style>
#ouuser_login
{
    background: #1f3d7a !important;
    color: #f2f2f2 !important;
    border:none !important;
}
</style>
<?php
$ousnargs = array(
	'echo'           => true,
	'redirect'       => site_url( $_SERVER['REQUEST_URI'] ), 
	'form_id'        => 'loginform',
	'label_username' => __( 'Username' ),
	'label_password' => __( 'Password' ),
	'label_remember' => __( 'Remember Me' ),
	'label_log_in'   => __( 'Log In' ),
	'id_username'    => 'user_login',
	'id_password'    => 'user_pass',
	'id_remember'    => 'rememberme',
	'id_submit'      => 'ouuser_login',
	'remember'       => true,
	'value_username' => NULL,
	'value_remember' => false 
);
echo '<div style="color:#f2f2f2; border-radius:10px; border: 1px solid #f2f2f2; margin: 50px auto 10px auto; width:550px; text-align:center;  font-size:20px;">';
    echo '<div style="padding:20px 0px;">';
    
        echo '<b>';
            echo esc_html('LOG IN');
        echo '</b>';
    
    echo '</div>';
        
echo '</div>';
echo '<div style="width:650px; margin: 0px auto 10px auto;">';
    wp_login_form($ousnargs);
echo '</div>';
echo '<div style="width:650px; font-size:26px; margin: 0px auto 10px auto; text-align:center;">';
    wp_register('', '');
echo '</div>';
?>