<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="二刀的个人生活技术笔记，武汉日常，日语学习，.Net/PHP学习" />
    <meta name="keywords" content="PHP,.Net,日语,日常,武汉,光谷,C#,WPF">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="<?php echo base_url('/public/user/css/reset.css');?>" media="screen" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('/public/user/css/style.css');?>" media="screen" type="text/css">
    <link href="<?php echo base_url('/public/image/favicon.ico');?>" rel="icon" type="image/x-icon">
<!--    <script type="text/javascript" src="--><?php //echo base_url('/public/user/js/jquery.js');?><!--"></script>-->
    <script src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
</head>
<body>
<header class="mod-head">
    <div class="mod-head__logo">
        <a href="<?php echo site_url();?>">
            <img class="avatar" src="<?php echo base_url('/public/image/headimage.png');?>" alt="" width="26" height="26"></a>
    </div>
    <nav class="mod-head__nav">
        <ul id="menu-%e8%8f%9c%e5%8d%95" class="mod-head__ul">
            <li id="menu-item-6" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6">
                <a href="<?php echo site_url();?>">Home</a>
                <span>·</span>
            </li>
            <li id="menu-item-16" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-8 current_page_item menu-item-16">
                <a href="<?php echo site_url('/p');?>"">Blogs</a>
                <span>·</span>
            </li>
            <li id="menu-item-21" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-21">
                <a href="<?php echo site_url('/tech');?>">Tech Archives</a>
                <span>·</span>
            </li>
            <li id="menu-item-15" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-15">
                <a href="<?php echo site_url('/life');?>">Daily Life</a>
                <span>·</span>
            </li>
            <li id="menu-item-19" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-19">
                <a href="<?php echo site_url('/about');?>">About</a>
            </li>
        </ul>
    </nav>
    <a id="right-panel-link" href="#right-panel"></a>
    <div id="right-panel" class="panel">
        <ul id="menu-%e8%8f%9c%e5%8d%95-1" class="ymod-head">
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6"><a href="<?php echo site_url();?>">Home</a></li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-8 current_page_item menu-item-16"> <a href="<?php echo site_url('/p');?>"">Blogs</a></li>
            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-21"><a href="<?php echo site_url('/tech');?>">Tech Archives</a></li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-15"><a href="<?php echo site_url('/life');?>">Daily Life</a></li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14"><a href="<?php echo site_url('/about');?>">About</a></li>
        </ul>	<button id="close-panel-bt">Close</button>
    </div>
    <script src="<?php echo base_url('/public/user/js/slider.js');?>"></script>
    <script>$('#right-panel-link').panelslider({side: 'right', duration: 200 });$('#close-panel-bt').click(function() {$.panelslider.close();});</script>