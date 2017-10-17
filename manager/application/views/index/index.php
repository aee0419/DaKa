<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <title>管理中心</title>
    <link href="<?php echo base_url();?>public/bootstrap-3.3.5/css/bootstrap.min.css" title="" rel="stylesheet" />
    <link title="" href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css"  />
    <link title="blue" href="<?php echo base_url();?>public/css/dermadefault.css" rel="stylesheet" type="text/css"/>
    <link title="green" href="<?php echo base_url();?>public/css/dermagreen.css" rel="stylesheet" type="text/css" disabled="disabled"/>
    <link title="orange" href="<?php echo base_url();?>public/css/dermaorange.css" rel="stylesheet" type="text/css" disabled="disabled"/>
    <link href="<?php echo base_url();?>public/css/templatecss.css" rel="stylesheet" title="" type="text/css" />
    <script src="<?php echo base_url();?>public/js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/bootstrap-3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
<nav class="nav navbar-default navbar-mystyle navbar-fixed-top">
    <div class="navbar-header">
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand mystyle-brand"><span class="glyphicon glyphicon-home"></span></a> </div>
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="li-border"><a class="mystyle-color" href="<?php echo site_url('index/index');?>">管理控制台</a></li>
        </ul>

        <ul class="nav navbar-nav pull-right">
            <li class="li-border">
                <a href="#" class="mystyle-color">
                    <span class="glyphicon glyphicon-bell"></span>
                    <span class="topbar-num">0</span>
                </a>
            </li>
            <li class="li-border dropdown"><a href="#" class="mystyle-color" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-search"></span> 搜索</a>
                <div class="dropdown-menu search-dropdown">
                    <div class="input-group">
                        <input type="text" class="form-control">
                 <span class="input-group-btn">
                   <button type="button" class="btn btn-default">搜索</button>
                </span>
                    </div>
                </div>
            </li>
            <li class="dropdown li-border"><a href="#" class="dropdown-toggle mystyle-color" data-toggle="dropdown">帮助与文档<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">帮助与文档</a></li>
                    <li class="divider"></li>
                </ul>
            </li>
            <li class="dropdown li-border"><a href="#" class="dropdown-toggle mystyle-color" data-toggle="dropdown">&nbsp;&nbsp;<?php echo $login;?><span class="caret"></span>&nbsp;&nbsp;</a>
                <ul class="dropdown-menu">
                    <li><a data-toggle="modal" data-target="#seeUserInfo">修改密码</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo site_url('login/logout');?>">退出</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#" class="dropdown-toggle mystyle-color" data-toggle="dropdown">换肤<span class="caret"></span></a>
                <ul class="dropdown-menu changecolor">
                    <li id="blue"><a href="#">蓝色</a></li>
                    <li class="divider"></li>
                    <li id="green"><a href="#">绿色</a></li>
                    <li class="divider"></li>
                    <li id="orange"><a href="#">橙色</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
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
                    <li>
                        <div class="showtitle" style="width:100px;"><img src="./public/img/leftimg.png" />反馈信息</div>
                        <a href="<?php echo site_url('message/index');?>"><span class="sublist-icon glyphicon glyphicon-user"></span><span class="sub-title">反馈信息</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="right-product my-index right-full">
        <div class="container-fluid">
            <div class="info-center">

                <!---title----->
                <div class="info-title">
                    <div class="pull-left">
                        <h4><strong><?php echo $login;?></strong></h4>
                        <p>欢迎登录管理系统！ <a href="" target="_blank"></a></p>
                    </div>
                    <div class="hour-minute pull-right">
                        <strong><?php include "./public/time.php";?></strong>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!----content-list---->
            <div class="content-list">
                <div class="row">
                    <div class="col-md-3">
                        <div class="content">
                            <div class="w30 left-icon pull-left">
                                <span class="glyphicon glyphicon-file blue"></span>
                            </div>
                            <div class="w70 right-title pull-right">
                                <div class="title-content">
                                    <p>员工</p>
                                    <h3 class="number"><?php echo $emo;?></h3>
                                    <div class="btn btn-default"><a href="<?php echo site_url('emo/index');?>">点击管理</a></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="content">
                            <div class="w30 left-icon pull-left">
                                <span class="glyphicon glyphicon-file violet"></span>
                            </div>
                            <div class="w70 right-title pull-right">
                                <div class="title-content">
                                    <p>职位</p>
                                    <h3 class="number"><?php echo $pos;?></h3>
                                    <div class="btn btn-default"><a href="<?php echo site_url('pos/index');?>">点击管理</a></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="content">
                            <div class="w30 left-icon pull-left">
                                <span class="glyphicon glyphicon-file orange"></span>
                            </div>
                            <div class="w70 right-title pull-right">
                                <div class="title-content">
                                    <p>部门</p>
                                    <h3 class="number"><?php echo $dep;?></h3>
                                    <div class="btn btn-default"><a href="<?php echo site_url('dep/index');?>">点击管理</a></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="content">
                            <div class="w30 left-icon pull-left">
                                <span class="glyphicon glyphicon-file green"></span>
                            </div>
                            <div class="w70 right-title pull-right">
                                <div class="title-content">
                                    <p>学历</p>
                                    <h3 class="number"><?php echo $edu;?></h3>
                                    <div class="btn btn-default"><a href="<?php echo site_url('edu/index');?>">点击管理</a></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!--个人信息模态框-->
<div class="modal fade" id="seeUserInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <?php echo form_open('login/changeadmin');?>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" >修改密码</h4>
                </div>
                <div class="modal-body">
                    <table class="table" style="margin-bottom:0px;">
                        <thead>
                        <tr> </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td wdith="20%">用户名:</td>
                            <td width="80%"><input type="text" value="<?php echo $login;?>" class="form-control" name="username" maxlength="10" autocomplete="off" /></td>
                        </tr>
                        <tr>
                            <td wdith="20%">旧密码:</td>
                            <td width="80%"><input type="password" class="form-control" name="old_password" maxlength="18" autocomplete="off" /></td>
                        </tr>
                        <tr>
                            <td wdith="20%">新密码:</td>
                            <td width="80%"><input type="password" class="form-control" name="password" maxlength="18" autocomplete="off" /></td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr></tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary" name="submit">提交</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        /*换肤*/
        $(".dropdown .changecolor li").click(function(){
            var style = $(this).attr("id");
            $("link[title!='']").attr("disabled","disabled");
            $("link[title='"+style+"']").removeAttr("disabled");

            $.cookie('mystyle', style, { expires: 7 }); // 存储一个带7天期限的 cookie
        })
        var cookie_style = $.cookie("mystyle");
        if(cookie_style!=null){
            $("link[title!='']").attr("disabled","disabled");
            $("link[title='"+cookie_style+"']").removeAttr("disabled");
        }
        /*左侧导航栏显示隐藏功能*/
        $(".subNav").click(function(){
            /*显示*/
            if($(this).find("span:first-child").attr('class')=="title-icon glyphicon glyphicon-chevron-down")
            {
                $(this).find("span:first-child").removeClass("glyphicon-chevron-down");
                $(this).find("span:first-child").addClass("glyphicon-chevron-up");
                $(this).removeClass("sublist-down");
                $(this).addClass("sublist-up");
            }
            /*隐藏*/
            else
            {
                $(this).find("span:first-child").removeClass("glyphicon-chevron-up");
                $(this).find("span:first-child").addClass("glyphicon-chevron-down");
                $(this).removeClass("sublist-up");
                $(this).addClass("sublist-down");
            }
            // 修改数字控制速度， slideUp(500)控制卷起速度
            $(this).next(".navContent").slideToggle(300).siblings(".navContent").slideUp(300);
        })
        /*左侧导航栏缩进功能*/
        $(".left-main .sidebar-fold").click(function(){

            if($(this).parent().attr('class')=="left-main left-full")
            {
                $(this).parent().removeClass("left-full");
                $(this).parent().addClass("left-off");

                $(this).parent().parent().find(".right-product").removeClass("right-full");
                $(this).parent().parent().find(".right-product").addClass("right-off");

            }
            else
            {
                $(this).parent().removeClass("left-off");
                $(this).parent().addClass("left-full");

                $(this).parent().parent().find(".right-product").removeClass("right-off");
                $(this).parent().parent().find(".right-product").addClass("right-full");

            }
        })

        /*左侧鼠标移入提示功能*/
        $(".sBox ul li").mouseenter(function(){
            if($(this).find("span:last-child").css("display")=="none")
            {$(this).find("div").show();}
        }).mouseleave(function(){$(this).find("div").hide();})
    })
</script>
</body>
</html>
