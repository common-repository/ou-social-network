<?php if(!defined('ABSPATH')) exit; 
$oucode7 = $_POST['nonce'];
if (!wp_verify_nonce($oucode7, 'b6fd345f'))
{
    wp_die();
}
if(is_user_logged_in())
{
    ?>
    <script>
    function ou_sn_searchss_button()
    {
        var formData = new FormData(jQuery('#ou_snformsearch')[0]);
        formData.append('action', 'ousnformresult8');
        formData.append('nonce', '<?php echo wp_create_nonce('d4fkg53kj');?>');
        jQuery.ajax({
        type: "post",
        url: ousnajaxcode.ousnajax_url,
        data: formData,
        contentType:false,
        processData:false,
        beforeSend: function() 
        {
            jQuery("#ousnhidesearchbutton").hide();
            jQuery("#ousnhidesearchloader").show();
        },
        success: function(html)
        {
            jQuery("#ou_sn_search_results").empty();
            jQuery("#ou_sn_search_results").append(html);
            jQuery("#ousnhidesearchloader").hide();
            jQuery("#ousnhidesearchbutton").show();
        }
        });
    }
    </script>
    <?php
    echo '<div style="width:800px;  background: #0073e6; text-align:right; overflow: hidden;">';
        echo '<div style="padding:5px 20px 5px 20px; font-size:20px;">';
            echo esc_html('Search');
        echo '</div>';
    echo '</div>';

    echo '<div style="width:800px; min-height:100px; margin:5px 0px 0px 0px; overflow: hidden;">';

        // left
        echo '<div id="ou_sn_search_results" style="float:left; width:500px; min-height:100px;">';

            echo '<div style="padding:150px 0px 0px 0px; text-align:center; font-size:28px; color: #84a3e1;">';
                echo '<b>';
                    echo esc_html('RESULTS SEARCH');
                echo '</b>';
            echo '</div>';
        echo '</div>';
        // end left

        // right
        echo '<div style="float:left; margin:0px 0px 10px 0px; width:300px; min-height:100px;">';
            echo '<form enctype="multipart/form-data"  method="POST" id="ou_snformsearch">'; 

                echo '<div style="padding:5px; font-size:16px;">';
                    echo '<input type="text" class="ou_input" autocomplete="off" name="ou_social_search_firstname" >';
                        echo '<br /><span style="color:#84a3e1;">'.esc_html('First Name').'</span>';
                echo '</div>';

                echo '<div style="padding:5px; font-size:16px;">';
                    echo '<input type="text" class="ou_input" autocomplete="off" name="ou_social_search_lastname" >';
                        echo '<br /><span style="color:#84a3e1;">'.esc_html('Last Name').'</span>';
                echo '</div>';

                echo '<div style="padding:5px; font-size:16px;">';
                    echo '<input type="text" class="ou_input" autocomplete="off" name="ou_social_search_email" >';
                        echo '<br /><span style="color:#84a3e1;">'.esc_html('Email').'</span>';
                echo '</div>';

                echo '<div style="padding:5px; font-size:16px;">';
                    echo '<input type="text" class="ou_input" autocomplete="off" name="ou_social_search_skype" >';
                        echo '<br /><span style="color:#84a3e1;">'.esc_html('Skype').'</span>';
                echo '</div>';

                echo '<div id="ousnhidesearchbutton" style="padding:15px 5px 5px 5px; font-size:16px; text-align:center;">';
                    echo '<a href="" onclick="ou_sn_searchss_button(); return false;" class="ou_button">';
                        echo esc_html('Search');
                    echo '</a>';
                echo '</div>';

                echo '<div id="ousnhidesearchloader" style="padding:15px 5px 5px 5px; font-size:16px; display:none; text-align:center;">';
                    $ou_s_p_file4 = plugin_dir_url( __FILE__ );
                    $ou_loader4 = $ou_s_p_file4.'images/loader.gif';
                    echo '<img src="'.esc_url($ou_loader4).'" border="none" style="width:74px; height:74px;">';
                echo '</div>';
            
            echo '</form>';
        echo '</div>';
        // end right

    echo '</div>';
}
?>