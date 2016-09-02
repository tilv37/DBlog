<html>
<head>
    <title>My Form</title>
</head>
<body>
<meta http-equiv="refresh" content="5;url=<?php echo site_url('article/create');?>"/>
<h3>Your form was successfully submitted!</h3>

<p><?php echo anchor('article/create', 'Try it again!'); ?></p>

</body>
</html>