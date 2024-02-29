<div class="wceazy-main">
    <div class="wceazy-container"> 


        <div class="wceazy_license_header">
            <div class="wceazy_header_part_left">
                <p>wcEazy Pro <span><?php echo esc_attr(WCEAZY_PRO_VERSION); ?></span></p>
            </div>
            <div class="wceazy_header_part_right">
                <a target="_blank" href="<?php echo WCEAZY_PRO_HELP_PAGE; ?>"><?php esc_html_e('Need help?', 'wceazy' ); ?></a>
            </div>
        </div> 

        <div class="wceazy_license_page_title">
            <h2><?php esc_html_e('License', 'wceazy' ); ?></h2>
        </div>


        <div class="wceazy_license_box_container">
            <div class="wceazy_license_box">
                <div class="wceazy_license_box_header"><?php esc_html_e('wcEazy License Activation', 'wceazy' ); ?></div>
                <div class="wceazy_license_box_body">
                    <input type="password" placeholder="License Code" value="<?php echo esc_attr(get_option("wceazy_license_key", "")); ?>"/>

                    <?php
                    $key = get_option("wceazy_license_key", Null);
                    if($key == Null){?>
                        <button onclick="wceazy_activate_license()"><?php esc_html_e('Active License', 'wceazy' ); ?></button>
                    <?php }else{ ?>
                        <button onclick="wceazy_deactivate_license()"><?php esc_html_e('Deactivate License', 'wceazy' ); ?></button>
                    <?php } ?>

                </div>
                <div class="wceazy_license_box_footer">
                    <?php
                    if($key == Null){?>
                        <?php esc_html_e('Activate the product using your License Code.', 'wceazy' ); ?>
                    <?php }else{
                        $expires = get_option("wceazy_license_expires", "");
                        ?>
                        <?php esc_html_e('Your license key expires on', 'wceazy' ); ?>, <?php echo ($expires != 'lifetime') ? get_date_from_gmt(get_option("wceazy_license_expires", ""), 'd/m/Y' ) : ' - ' .$expires; ?>.
                    <?php } ?>
                </div>
            </div>
        </div>  

    </div>

</div>



<script type="text/javascript">

    jQuery(document).ready(function($){
        'use strict';
        var host = "<?php echo esc_url(WCEAZY_PRO_URL); ?>";
        //wceazy_modules_page_init(host);
    });

</script>