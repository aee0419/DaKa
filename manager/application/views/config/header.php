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
