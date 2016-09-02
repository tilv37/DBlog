<!DOCTYPE html>
<!-- saved from url=(0038)http://v3.bootcss.com/examples/signin/ -->
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://v3.bootcss.com/favicon.ico">

    <title>用户登录</title>

    <!-- Bootstrap core CSS -->
    <link href="/DBlog/public/admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/DBlog/public/admin/css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="<?php echo base_url();?>public/admin/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/DBlog/public/admin/js/ie-emulation-modes-warning.js"></script>
    <script src="/DBlog/public/admin/js/jquery.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/DBlog/public/admin/js/html5shiv.min.js"></script>
    <script src="/DBlog/public/admin/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">

    <?php echo form_open('login',array('class'=>'form-signin','id'=>'loginform'))?>
    <h2 class="form-signin-heading">MY_BLOG</h2>
    <?php echo form_label('用户名:','inputEmail',array('class'=>'sr-only'));?>
    <!--        <label for="inputEmail" class="sr-only">用户名</label>-->
    <?php echo form_error('inputEmail'); ?>
    <?php echo form_input(array(
        'name'=>'inputEmail',
        'id'=>'inputEmail',
        'type'=>'email',
        'placeholder'=>'Email address',
        'class'=>'form-control',
        'required'=>'',
        'autofocus'=>''
    ));
    ?>
    <!--        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">-->
    <!--        <label for="inputPassword" class="sr-only">密码</label>-->
    <?php echo form_label('密码:','inputPassword',array('class'=>'sr-only'));?>
    <?php echo form_error('inputPassword'); ?>
    <?php echo form_input(array(
        'name'=>'inputPassword',
        'id'=>'inputPassword',
        'type'=>'password',
        'class'=>'form-control',
        'required'=>'',
        'placeholder'=>'Password'
    ));
    ?>
    <!--        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">-->
    <div class="checkbox">
        <label>
            <input type="checkbox" value="remember-me"> 下次自动登录
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit"  id="submit">登录</button>
    <div id="msg" style="color: red" ><?php if($this->session->userdata('msg')){echo $this->session->userdata('msg');} ?></div>
    <?php echo form_close();?>

</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/DBlog/public/admin/js/ie10-viewport-bug-workaround.js"></script>

<script type="application/javascript">
    function check_mail(email){
        re = /^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/
        if(re.test(email)){
            return true;
        }else{
            return false;
        }
    }

//    $("#submit").click(function(){
//        var pwd = $("#inputPassword").val();
//        var user = $("#inputEmail").val();
//        if (pwd == null || user == "") {
//            $("#msg").html("请填写完整，不要为空");
//            $("#npassword").focus();
//            return false;
//        } else if (!check_mail(user)) {
//            $("#msg").html("请填写正确的邮箱地址");
//            // $("#inputEmail").attr("value", "3123123");
//            $("#inputEmail").focus();
//            return false;
//        } else {
//            var data=$("form").serialize();
//            $.post("login", data );
//        }
//    });

</script>

</body></html>