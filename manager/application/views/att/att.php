
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
                    <li>
                        <div class="showtitle" style="width:100px;"><img src="./public/img/leftimg.png" />职位管理</div>
                        <a href="<?php echo site_url('pos/index');?>"><span class="sublist-icon glyphicon glyphicon-credit-card"></span><span class="sub-title">职位管理</span></a></li>
                    <li  class="active">
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
                        <h4>查看员工考勤&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;今日:<?php echo date("Y-m-d",time());?></h4>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="table-margin">
                    <table class="table table-bordered table-header">
                        <thead>
                        <tr>
                            <td class="w10">工号</td>
                            <td class="w10">姓名</td>
                            <td class="w5">性别</td>
                            <td class="w10">学历</td>
                            <td class="w10">职位</td>
                            <td class="w10">部门</td>
                            <td class="w15">上班时间</td>
                            <td class="w15">状态</td>
                        </tr>
                        </thead>
                        <?php
                        if(is_array($data)):
                            foreach($data as $v):
                                ?>
                                <tbody>
                                <tr>
                                    <td><?php echo $v->empno;?></td>
                                    <td><?php echo $v->name;?></td>
                                    <td><?php echo $v->sex;?></td>
                                    <td><?php echo $v->eduname;?></td>
                                    <td><?php echo $v->posname;?></td>
                                    <td><?php echo $v->depname;?></td>
                                    <td><?php
                                        if($v->worktime === date("Y-m-d",time()) && $v->s_status == 0){
                                            echo "今日未打卡上班";
                                        }else{
                                            echo "今日已于".date("H:m:s",$v->start)."开始工作";
                                        }
                                        ?></td>
                                    <td><?php
                                        if($v->s_status == 1){
                                            if($v->e_status == 0){
                                                echo "工作中...";
                                            }else{
                                                echo "今日已于".date("H:m:s",$v->end)."下班";
                                            }
                                        }else{
                                            echo "休息中";
                                        }
                                        ?></td>
                                </tr>
                                </tbody>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </table>
                </div>
            </div>
            <!--<div class="panel panel-default">
                <div class="panel-body" style="font-size: 16px;text-align: center;">
                    <?php
/*                    echo $link;
                    */?>
                </div>
            </div>-->
        </div>
    </div>
</div>

