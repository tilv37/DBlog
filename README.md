# D2Blog
A personal blog platform with CodeIgniter
使用CI3框架进行个人博客开发
---

## 使用方法
* 下载ZIP包，解压至www根目录
* 使用附带sql，建立相应数据库，建议使用Mysql
* 编辑DBlog\admin\application\config\config.php配置后台根路径


    $config['base_url'] = 'http://127.0.0.1:8080/DBlog/admin';

* 编辑DBlog\admin\application\config\database.php配置数据路连接


    'hostname' => '127.0.0.1',
	'username' => 'root',
	'password' => 'root',
	'database' => 'pzd58rv',
	'dbdriver' => 'mysqli',



* 编辑DBlog\application\config\config.php配置前台根路径


    $config['base_url'] = 'http://127.0.0.1:8080/DBlog/';

* 编辑DBlog\application\config\database.php配置数据路连接


    'hostname' => '127.0.0.1',
	'username' => 'root',
	'password' => 'root',
	'database' => 'pzd58rv',
	'dbdriver' => 'mysqli',

---
## 注意事项
如果出现css/js加载失败，请使用你的IDE，修改所有css/js的加载路径为相对路径，如

        //后台的资源加载相对路径
        <script type="text/javascript" src="/DBlog/plugins/ueditor/ueditor.config.js"></script>

        //前台的资源加载相对路径
        <script type="text/javascript" src="<?php echo base_url('/public/user/js/comment-reply.min.js');?>"></script>

---
## 功能介绍

### 后台
1. 文章列表
2. 文章编辑
3. 关于页面编辑
4. 文章分类管理
5. Ueditor支持

### 前台

1. 文章浏览
2. 多说

---

##使用多说

需要在前台的post.php/about.php 页面中修改代码，替换为自己的key

    <!-- 多说评论框 start -->
    <div class="ds-thread" data-thread-key="<?php echo $cid ?>" data-title="<?php echo $title ?>"></div>
    <!-- 多说评论框 end -->
    <!-- 多说公共JS代码 start (一个网页只需插入一次) -->
    <script type="text/javascript">
    var duoshuoQuery = {short_name:"XXX"};
    (function() {
        var ds = document.createElement('script');
        ds.type = 'text/javascript';ds.async = true;
        ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
        ds.charset = 'UTF-8';
        (document.getElementsByTagName('head')[0]
        || document.getElementsByTagName('body')[0]).appendChild(ds);
    })();
    </script>
    <!-- 多说公共JS代码 end -->
---

默认用户名是tilv37@163.com，密码是123456
在数据库中存储的密码是加密过的，如果你想在头次使用时候替换成自己的用户名密码，可以去数据库中修改用户名，在使用123456登陆系统后修改密码。
或者使用
>http://127.0.0.1:8080/DBlog/admin/index.php/Test
进行密码计算，然后在数据库中修改密码~~

---
因为平时不是做PHP开发的，技术粗浅，还有很多不足，欢迎交流指正

图例

