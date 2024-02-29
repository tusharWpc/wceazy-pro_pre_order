<div class="wceazy-main">
    <div class="wceazy-container">

        <?php include WCEAZY_PRO_PATH . "backend/templates/views/modules.php"; ?>


        <?php if($this->settings->getModuleStatus("auto_apply_coupon")){ ?>
        <?php include WCEAZY_PRO_PATH . "backend/templates/views/auto_apply_coupon/settings.php"; ?>
        <?php } ?>

        <?php if($this->settings->getModuleStatus("bogo_deal")){ ?>
            <?php include WCEAZY_PRO_PATH . "backend/templates/views/bogo_deal/settings.php"; ?>
        <?php } ?>

        <?php if($this->settings->getModuleStatus("coupon_generator")){ ?>
            <?php include WCEAZY_PRO_PATH . "backend/templates/views/coupon_generator/settings.php"; ?>
        <?php } ?>

        <?php if($this->settings->getModuleStatus("url_coupon")){ ?>
            <?php include WCEAZY_PRO_PATH . "backend/templates/views/url_coupon/settings.php"; ?>
        <?php } ?>

        <?php if($this->settings->getModuleStatus("product_sticky_bar")){ ?>
            <?php include WCEAZY_PRO_PATH . "backend/templates/views/product_sticky_bar/settings.php"; ?>
        <?php } ?>

        <?php if($this->settings->getModuleStatus("one_click_checkout")){ ?>
            <?php include WCEAZY_PRO_PATH . "backend/templates/views/one_click_checkout/settings.php"; ?>
        <?php } ?>

        <?php if($this->settings->getModuleStatus("floating_cart")){ ?>
            <?php include WCEAZY_PRO_PATH . "backend/templates/views/floating_cart/settings.php"; ?>
        <?php } ?>

        <?php if($this->settings->getModuleStatus("pdf_invoice")){ ?>
            <?php include WCEAZY_PRO_PATH . "backend/templates/views/pdf_invoice/settings.php"; ?>
        <?php } ?>

        <?php if($this->settings->getModuleStatus("shipping_bar")){ ?>
            <?php include WCEAZY_PRO_PATH . "backend/templates/views/shipping_bar/settings.php"; ?>
        <?php } ?>

        <?php if ($this->settings->getModuleStatus("pre_order")) { ?>
            <?php include WCEAZY_PRO_PATH . "backend/templates/views/pre_order/settings.php"; ?>
        <?php } ?>

        <?php if($this->settings->getModuleStatus("address_book")){ ?>
            <?php include WCEAZY_PRO_PATH . "backend/templates/views/address_book/settings.php"; ?>
        <?php } ?>

        <?php if($this->settings->getModuleStatus("product_filter")){ ?>
            <?php include WCEAZY_PRO_PATH . "backend/templates/views/product_filter/settings.php"; ?>
        <?php } ?>

        <?php if($this->settings->getModuleStatus("order_cancel")){ ?>
            <?php include WCEAZY_PRO_PATH . "backend/templates/views/order_cancel/settings.php"; ?>
        <?php } ?>


    </div>

</div>



<script type="text/javascript">

    jQuery(document).ready(function($){
        'use strict';
        var host = "<?php echo esc_url(WCEAZY_PRO_URL); ?>";
        wceazy_modules_page_init(host);
    });

</script>