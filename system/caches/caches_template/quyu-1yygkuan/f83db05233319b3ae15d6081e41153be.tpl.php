<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>注册<?php echo _cfg('web_name_two'); ?>网 - 一元<?php echo _cfg('web_name_two'); ?></title>
    <meta name="Description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="css/sslComm.css" />

	<!--[if IE 6]>
      <script type="text/javascript" src="https://skin.1yyg.com/js/iepng.js"></script> 
      <script type="text/javascript">
      try{
          if(EvPNG!=null&&EvPNG!=undefined){
              EvPNG.fix('.transparent-png');
          }
      }
      catch(e){} 
      </script>
  <![endif]-->
	<link rel="stylesheet" type="text/css" href="css/layout.css" />
 

</head>
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/jquery.Validform.min.js"></script>
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/passwordStrength-min.js"></script>
<script type="text/javascript">
$(function(){
	var demo=$(".login_ConInput").Validform({
		tiptype:2,
		usePlugin:{
			passwordstrength:{
				minLen:6,
				maxLen:20,
				trigger:function(obj,error){
					if(error){
						obj.parent().next().find(".Validform_checktip").show();
						obj.parent().next().find(".passwordStrength").hide();
					}else{
						obj.parent().next().find(".Validform_checktip").hide();
						obj.parent().next().find(".passwordStrength").show();
					}
				}
			}
		}

	});
})
</script>
<body>
    <div class="wrapper">
        <input name="hidRegisterForward" type="hidden" id="hidRegisterForward" value="http://member.1yyg.com/ReferAuth.do" />
        <div class="g-logo-top">
            <a href="<?php echo WEB_PATH; ?>" class="transparent-png fl">
                <img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo Getlogo(); ?>" /></a>
            <span class="fr">已有账号？<a id="hylinkLoginPage" class="blue" href="<?php echo WEB_PATH; ?>/member/user/login">立即登录</a></span>
        </div>

        <div class="g-contentCon clrfix">
	<form method="post" action="" enctype="application/x-www-form-urlencoded">
            <div class="m-main clrfix">
                <h2 class="gray3">新用户注册</h2>
                <div class="register-form-con clrfix">
                    <ul>
                        <li>
                            <input name="name" id="txtUserName" type="text" maxlength="100" placeholder="手机号或邮箱"/>
                            <b class="passport-icon user-name transparent-png"></b>
                            
                            <span class="orange" style="display: none;"></span>
                            <s class="passport-icon" style="display: none;"></s>
                        </li>
                        <li>
                            <input id="txtPwd" type="password" maxlength="20" name="userpassword" placeholder="设置登录密码"/>
                            <b class="passport-icon login-password transparent-png"></b>
                            
                            <span class="orange" style="display: none;"></span>
                            <s class="passport-icon" style="display: none;"></s>
                            <span id="pwdStrength" style="display: none;"></span>

                        </li>
                        <li>
                            <input id="txtConPwd" type="password" maxlength="20" name="userpassword2" placeholder="确认密码"/>
                            <b class="passport-icon login-password transparent-png"></b>
                            
                            <span class="orange" style="display: none;"></span>
                            <s class="passport-icon" style="display: none;"></s>
                        </li>
                                           </ul>
                    <ul class="j-tips-wrap" id="j-tips-wrap"></ul>
                </div>
                <div class="link-con clrfix">
				<!--登录按钮-->
				<input name="submit" type="submit" id="btnAgreeBtn" class="z-agreeBtn" value="同意夺宝服务协议并注册">
                    
                    <a id="btnAgreement" href="<?php echo WEB_PATH; ?>/help/3" target="_blank" class="z-agreement">《夺宝服务协议》</a>
                </div>
				
            </div>
			</form>
        </div>

        <!--版权-->
        <div class="g-copyrightCon clrfix">
     
		<div class="g-links">
         
		<a target="_blank" href="<?php echo WEB_PATH; ?>" title="首页">首页</a><s></s>
        
		<a target="_blank" href="<?php echo WEB_PATH; ?>/help/15" title="关于闪购">关于闪购</a><s></s>
          
		<a target="_blank" href="<?php echo WEB_PATH; ?>/help/16" title="隐私声明">隐私声明</a><s></s>
        
		<a target="_blank" href="<?php echo WEB_PATH; ?>/help/13">合作专区</a><s></s>
       
		<a target="_blank" href="<?php echo WEB_PATH; ?>/help/18" title="加入闪购">加入闪购</a><s></s>
    
		<a target="_blank" href="<?php echo WEB_PATH; ?>/help/18" title="联系我们">联系我们</a>
 
		</div>
		
 <div class="g-copyright">
         
		Copyright &copy; 2011 - 2015, 版权所有 <?php echo G_WEB_PATH; ?>    
		</div>
   
		</div>
   
  

    </div>
</body>
</html>
