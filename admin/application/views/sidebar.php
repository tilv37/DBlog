</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <?php echo anchor('home', '后台管理', array('title'=>'后台管理','class'=>'navbar-brand')); ?>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><?php echo anchor('home', $_SESSION['LoginUser']); ?></li>
                <li><?php echo anchor('login/log_out', '登出', array('title'=>'登出')); ?></li>
                <li><?php echo anchor('home', '网站', array('title'=>'网站')); ?></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><?php echo anchor('article/create', '新建文章', array('title'=>'新建文章',)); ?></li>
                <li><?php echo anchor('article', '所有文章', array('title'=>'所有文章',)); ?></li>
                <li><?php echo anchor('category', '分类目录', array('title'=>'分类目录',)); ?></li>
                <li><?php echo anchor('tag','标签', array('title'=>'标签',)); ?></li>
                <li><?php echo anchor('user', '个人资料', array('title'=>'个人资料',)); ?></li>
                <li><?php echo anchor('option', '常规设置', array('title'=>'常规设置',)); ?></li>
                <li><?php echo anchor('about', '关于设置', array('title'=>'关于设置',)); ?></li>
                <li><?php echo anchor('Test', '测试', array('title'=>'测试',)); ?></li>
            </ul>
        </div>