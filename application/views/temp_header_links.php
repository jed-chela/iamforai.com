<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE HTML>
<?php 
$page_title = "";
if(isset($title)){
  $page_title = $title;
}

$site_name = "iAmForAI";
$site_description = "Move with the movement";

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone-no" />
<meta
  name="viewport"
  content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"
/>

<meta name="description" content="<?= $site_description ?>">
<title><?= $site_name." ".$page_title ?></title>

<meta property="og:image" content="<?php echo base_url(); ?>assets/img/iamforai-logo-black.png">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="1024">
<meta property="og:image:height" content="1024">
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo base_url(); ?>"/>
<meta property="og:title" content="<?= $site_name." ".$page_title ?>" />
<meta property="og:description" content="<?= $site_description ?>" />


<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/iamforai-logo-black.png">
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts.css">  <!--
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome/css/font-awesome.min.css">-->
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome6.0/css/all.min.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/node_modules/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/hamburger-navigation-submenus/css/sticky.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/hamburger-navigation-submenus/css/style.css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css?rand=08122023">
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/multi.css?rand=08122023">
<link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/node_modules/animate.css/animate.min.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/anim.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.css">

<style>

</style>
</head>