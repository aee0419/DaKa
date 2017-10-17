<?php
/*
 *Developer: The陈铭
 *Date: 2017/8/18
 *Time: 21:20
 */

?>
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
                    <li>
                        <div class="showtitle" style="width:100px;"><img src="./public/img/leftimg.png" />员工考勤</div>
                        <a href="<?php echo site_url('att/att');?>"><span class="sublist-icon glyphicon glyphicon-calendar"></span><span class="sub-title">员工考勤</span></a></li>
                </ul>
            </div>
            <div class="sBox">
                <div class="subNav sublist-up"><span class="title-icon glyphicon glyphicon-chevron-up"></span><span class="sublist-title">员工反馈</span></div>
                <ul class="navContent" style="display:none">
                    <li class="active">
                        <div class="showtitle" style="width:100px;"><img src="./public/img/leftimg.png" />反馈信息</div>
                        <a href="<?php echo site_url('message/index');?>"><span class="sublist-icon glyphicon glyphicon-user"></span><span class="sub-title">反馈信息</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="right-product view-product right-full">
        <div class="container-fluid">
            <div class="info-center">

                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" >反馈信息</h4>
                            </div>
                            <div class="modal-body">
                                <table class="table" style="margin-bottom:0px;">
                                    <thead>
                                    <tr> </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td wdith="20%">姓名:</td>
                                        <td width="80%"><input type="text" value="<?php echo $data['username'];?>" class="form-control" name="username" maxlength="10" autocomplete="off" /></td>
                                    </tr>
                                    <tr>
                                        <td wdith="20%">邮箱:</td>
                                        <td width="80%"><input type="email" value="<?php echo $data['email'];?>" class="form-control" name="email" maxlength="18" autocomplete="off" /></td>
                                    </tr>
                                    <tr>
                                        <td wdith="20%">反馈信息:</td>
                                        <td width="80%"><textarea rows="10" name="message" id="contact-body" class="form-control input-lg"><?php echo $data['message'];?></textarea></td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr></tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>