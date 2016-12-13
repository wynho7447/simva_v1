<!DOCTYPE html>
<!-- 
TEMPLATE NAME : Adminre - frontend
VERSION : 1.3.0
AUTHOR : JohnPozy
AUTHOR URL : http://themeforest.net/user/JohnPozy
EMAIL : pampersdry@gmail.com
LAST UPDATE: 2015/01/05

** A license must be purchased in order to legally use this template for your project **
** PLEASE SUPPORT ME. YOUR SUPPORT ENSURE THE CONTINUITY OF THIS PROJECT **
-->
<html class="frontend">
    <!-- START Head -->
    <head>
        <!-- START META SECTION -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $page_title; ?> | <?php echo $system_title; ?></title>
        <meta name="author" content="<?php echo $author; ?>">
        <meta name="description" content="<?php
        echo $description;
        if ($page_name == 'vendor_home') {
            echo ', ' . $this->db->get_where('vendor', array('vendor_id' => $vendor))->row()->description;
        }
        ?>">
        <meta name="keywords" content="<?php
        echo $keywords;
        if ($page_name == 'vendor_home') {
            echo ', ' . $this->db->get_where('vendor', array('vendor_id' => $vendor))->row()->keywords;
        }
        ?>">
        <meta name="revisit-after" content="<?php echo $revisit_after; ?> days">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta http-equiv="expires" content="Mon, 10 Dec 2001 00:00:00 GMT" />

        <?php
        if ($page_name == 'product_view') {
            foreach ($product_data as $row) {
                ?>
                <!-- Schema.org markup for Google+ -->
                <meta itemprop="name" content="<?php echo $row['title']; ?>">
                <meta itemprop="description" content="<?php echo strip_tags($row['description']); ?>">
                <meta itemprop="image" content="<?php echo $this->crud_model->file_view('product', $row['product_id'], '', '', 'no', 'src', 'multi', 'one'); ?>">

                <!-- Twitter Card data -->
                <meta name="twitter:card" content="summary_large_image">
                <meta name="twitter:site" content="@publisher_handle">
                <meta name="twitter:title" content="<?php echo $row['title']; ?>">
                <meta name="twitter:description" content="<?php echo strip_tags($row['description']); ?>">
                <!-- Twitter summary card with large image must be at least 280x150px -->
                <meta name="twitter:image:src" content="<?php echo $this->crud_model->file_view('product', $row['product_id'], '', '', 'no', 'src', 'multi', 'one'); ?>">

                <!-- Open Graph data -->
                <meta property="og:title" content="<?php echo $row['title']; ?>" />
                <meta property="og:type" content="article" />
                <meta property="og:url" content="<?php echo base_url(); ?>index.php/home/product_view/<?php echo $row['product_id']; ?>" />
                <meta property="og:image" content="<?php echo $this->crud_model->file_view('product', $row['product_id'], '', '', 'no', 'src', 'multi', 'one'); ?>" />
                <meta property="og:description" content="<?php echo strip_tags($row['description']); ?>" />
                <meta property="og:site_name" content="<?php echo $row['title']; ?>" />
                <?php
            }
        }
        if ($page_name == 'vendor_home') {
            $vendor_data = $this->db->get_where('vendor', array('vendor_id' => $vendor))->result_array();
            foreach ($vendor_data as $row) {
                ?>
                <!-- Schema.org markup for Google+ -->
                <meta itemprop="name" content="<?php echo $row['display_name']; ?>">
                <meta itemprop="description" content="<?php echo strip_tags($row['description']); ?>">
                <meta itemprop="image" content="<?php echo base_url(); ?>uploads/vendor/logo_<?php echo $vendor; ?>.png">

                <!-- Twitter Card data -->
                <meta name="twitter:card" content="summary_large_image">
                <meta name="twitter:site" content="@publisher_handle">
                <meta name="twitter:title" content="<?php echo $row['display_name']; ?>">
                <meta name="twitter:description" content="<?php echo strip_tags($row['description']); ?>">
                <!-- Twitter summary card with large image must be at least 280x150px -->
                <meta name="twitter:image:src" content="<?php echo base_url(); ?>uploads/vendor/logo_<?php echo $vendor; ?>.png">

                <!-- Open Graph data -->
                <meta property="og:title" content="<?php echo $row['display_name']; ?>" />
                <meta property="og:type" content="article" />
                <meta property="og:url" content="<?php echo base_url(); ?>index.php/home/vendor/<?php echo $row['vendor_id']; ?>" />
                <meta property="og:image" content="<?php echo base_url(); ?>uploads/vendor/logo_<?php echo $vendor; ?>.png" />
                <meta property="og:description" content="<?php echo strip_tags($row['description']); ?>" />
                <meta property="og:site_name" content="<?php echo $system_title; ?>" />
                <?php
            }
        }
        ?>
        <?php $ext = $this->db->get_where('ui_settings', array('type' => 'fav_ext'))->row()->value; ?>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/others/favicon.<?php echo $ext; ?>">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>template/front/image/touch/apple-touch-icon-144x144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>template/front/image/touch/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>template/front/image/touch/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>template/front/image/touch/apple-touch-icon-57x57-precomposed.png">

        <!--/ END META SECTION -->

        <!-- START STYLESHEETS -->
        <!-- Plugins stylesheet : optional -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/front/plugins/owl/css/owl-carousel.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/front/plugins/layerslider/css/layerslider.css">
        <!--/ Plugins stylesheet : optional -->

        <!-- Application stylesheet : mandatory -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/front/stylesheet/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/front/stylesheet/layout.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/front/stylesheet/uielement.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/front/stylesheet/themes/layouts/fixed-header.css">
        <!--/ Application stylesheet -->

        <!-- modernizr script -->
        <script type="text/javascript" src="<?php echo base_url(); ?>template/front/plugins/modernizr/js/modernizr.js"></script>
        <!--/ modernizr script -->
        <!-- END STYLESHEETS -->
    </head>
    <!--/ END Head -->