<div class="down-main">
    <div class="left-main left-full">
        <div class="sidebar-fold"><span class="glyphicon glyphicon-menu-hamburger"></span></div>
        <div class="subNavBox">
            <div class="sBox">
                <div class="subNav sublist-down"><span class="title-icon glyphicon glyphicon-chevron-down"></span><span class="sublist-title">管理中心</span>
                </div>
                <ul class="navContent" style="display:block">
                    <li>
                        <div class="showtitle" style="width:100px;"><img src="./public/img/leftimg.png" />员工管理</div>
                        <a href="<?php echo site_url('emo/index');?>"><span class="sublist-icon glyphicon glyphicon-user"></span><span class="sub-title">员工管理</span></a> </li>
                    <li>
                        <div class="showtitle" style="width:100px;"><img src="./public/img/leftimg.png" />学历管理</div>
                        <a href="<?php echo site_url('edu/index');?>"><span class="sublist-icon glyphicon glyphicon-envelope"></span><span class="sub-title">学历管理</span></a> </li>
                    <li>
                        <div class="showtitle" style="width:100px;"><img src="./public/img/leftimg.png" />部门管理</div>
                        <a href="<?php echo site_url('dep/index');?>"><span class="sublist-icon glyphicon glyphicon-bullhorn"></span><span class="sub-title">部门管理</span></a></li>
                    <li class="active">
                        <div class="showtitle" style="width:100px;"><img src="./public/img/leftimg.png" />职位管理</div>
                        <a href="<?php echo site_url('pos/index');?>"><span class="sublist-icon glyphicon glyphicon-credit-card"></span><span class="sub-title">职位管理</span></a></li>
                    <li>
                        <div class="showtitle" style="width:100px;"><img src="./public/img/leftimg.png" />员工考勤</div>
                        <a href="<?php echo site_url('att/att');?>"><span class="sublist-icon glyphicon glyphicon-calendar"></span><span class="sub-title">员工考勤</span></a></li>
                </ul>
            </div>
            <div class="sBox">
                <div class="subNav sublist-up"><span class="title-icon glyphicon glyphicon-chevron-up"></span><span class="sublist-title">员工反馈</span></div>
                <ul class="navContent" style="display:none">
                    <li>
                        <div class="showtitle" style="width:100px;"><img src="./public/img/leftimg.png" />反馈信息</div>
                        <a href="<?php echo site_url('message/index');?>"><span class="sublist-icon glyphicon glyphicon-user"></span><span class="sub-title">反馈信息</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="right-product view-product right-full">
        <div class="container-fluid">
            <div class="info-center">
                <div class="page-header">
                    <div class="pull-left">
                        <h4>职位管理</h4>
                    </div>
                </div>
                <div class="info-center-title">
                <a href="<?php echo site_url('Pos/add'); ?>" class="btn btn-info">增加职位</a>
                </div>
                <div class="clearfix"></div>
                <div class="table-margin">
                <table class="table table-bordered">
                    <tr class="row">
                        <th>职位</th><th>编辑</th>
                    </tr>
                    <?php
                    foreach($data as $v):?>
                        <tr class="row">
                            <td><?php echo $v->posname; ?></td>
                            <td><a href="<?php echo site_url('Pos/del/'.$v->id); ?>" class="btn btn-danger">删除</a>&nbsp;&nbsp;<a href="<?php echo site_url('Pos/edit/'.$v->id); ?>" class="btn btn-info">修改</a></td>

                        </tr>
                    <?php endforeach;
                    ?>
                </table>
                <div class="panel panel-default">
                    <div class="panel-body" style="font-size: 20px;text-align: center;">
                        <?php echo $link;?>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
</div>
