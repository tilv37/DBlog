<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view("header") ?>
<?php $this->load->view("sidebar") ?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h3>
            分类目录
            <?php echo anchor('category/create', '新增', array('title'=>'新增','class'=>"btn btn-primary btn-xs",'role'=>"button")); ?>
        </h3>

        <table class="table table-condensed">
            <thead>
            <tr>
                <th><input type="checkbox" id="checkAll"/></th>
                <th>#</th>
                <th>名称</th>
                <th>子分类</th>
                <th>缩略名</th>
                <th></th>
                <th>文章数</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($categories as $item): ?>
                <tr>
                    <td><input type="checkbox" name="<?php echo 'Check'.$item['mid'];?>"/></td>
                    <td><?php echo $item['mid'];?></td>
                    <td><?php echo $item['name'];?></td>
                    <td>子分类</td>
                    <td>默认</td>
                    <td></td>
                    <td><a href="<?php echo site_url().'/category/'.$item['mid']; ?>"> <span class="badge"><?php echo $item['postcount'];?></span></a></td>
<!--                    <td><a href="#"> <span class="badge">42</span></a></td>-->
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php $this->load->view("footer") ?>