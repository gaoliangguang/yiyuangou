<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/LotteryDetail.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/header.css"/>
<div class="Current_nav">
	<a href="<?php echo WEB_PATH; ?>">首页</a> <span>&gt;</span> 
	<a href="<?php echo WEB_PATH; ?>/goods_list/<?php echo $item['cateid']; ?>">
	<?php echo $category['name']; ?>
	</a> <span>&gt;</span> 
	<a href="<?php echo WEB_PATH; ?>/goods_list/<?php echo $item['cateid']; ?>e<?php echo $item['brandid']; ?>">
	<?php echo $brand['name']; ?>
	</a> <span>&gt;</span>揭晓详情 
</div>
<div class="show_content">
	<!-- 商品期数 -->

			
	<div id="divPeriodList" class="show_Period">		
		<?php echo $loopqishu; ?>	
	</div>
	<!-- 商品信息 -->
<div id="div_ngresult" style="width: 1190px;" class="ng-result-wrapper clearfix  ">
                <!--图片展示-->
                <div class="ng-result-img">
				  
                    <div class="result-img-wrapper">
						
                            <a href="<?php echo WEB_PATH; ?>/goods/<?php echo $item['id']; ?>" title="<?php echo $item['title']; ?>">
							<img alt="<?php echo $item['title']; ?>" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $item['thumb']; ?>" height="242" width="242"></a>
							
                    </div>
                    <a href="<?php echo WEB_PATH; ?>/goods/<?php echo $item['id']; ?>" class="result-more">查看商品详情</a>
                </div>
				<?php if($itemzx): ?>
                <!--揭晓结果-->
                <div class="ng-result-detail">
                    <div class="result-con-wrapper">
                        <h2 class="title"><span class="num">(第<?php echo $item['qishu']; ?>期)</span><?php echo $item['title']; ?></h2>
                        <p class="price">
                            价值：<?php echo $item['money']; ?>
                             
                        </p>
                      
                        <div class="result-main">

                            <div class="result-con-info">
                                <p class="r-name">
                                    <span><a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($item['q_uid']); ?>" target="_blank" title="<?php echo get_user_name($q_user); ?>"><?php echo get_user_name($q_user); ?></a></span>
                                </p>
                                <p>本云参与：<span class="r-num"><?php echo $user_shop_number; ?></span>人次<a id="divOpen" href="javascript:;" class="r-look"></a></p>
                                <p>揭晓时间：<span><?php echo microt($item['q_end_time']); ?></span></p>
                                <p>闪购时间：<span><?php echo microt($user_shop_time); ?></span></p>
                                <div class="result-head-pic">
											
								
                                    <div class="rh-wrap">
									<img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo get_user_key($item['q_uid'],'img'); ?>" height="110" width="110">
									</div>
									<a rel="nofollow" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($item['q_uid']); ?>" target="_blank" title="" class="ng-result-head transparent-png"><span class="name">获得者</span>
									</a>
                                </div>
								
			
                            </div>
                            <div class="result-con-code">
                                <p class="code-name">— 幸运闪购码 —</p>
								<?php $ln=1;if(is_array($q_user_code_arr)) foreach($q_user_code_arr AS $q_code_num): ?>
                                <span class="code-num">
                                    <?php echo $q_code_num; ?></span>
									 <?php  endforeach; $ln++; unset($ln); ?>
                            </div>
                        </div>
						
                        <div class="result-how">
                            <h6>如何计算?</h6>
                            <p>1、取该商品最后购买时间前网站所有商品的最后100条购买时间记录；</p>
                            <p>2、按时、分、秒、毫秒排列取值之和，除以该商品总参与人次后取余数；</p>
                            <p>3、余数加上10000001 即为“幸运闪购码”；</p>
                            <p>4、余数是指整数除法中被除数未被除尽部分， 如7÷3 = 2 ......1，1就是余数。</p>
                        </div>
                    </div>
                </div>
				<?php endif; ?>
                <!--查看分期-->
                <div class="ng-result-select">
                    <ul class="r-select">
                        <li>
                             <a href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $nums; ?>"><i class="ng-result-bg up transparent-png"></i><span></span></a>
                        </li>
                        <li>
                             <a href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $numx; ?>"><i class="ng-result-bg down transparent-png"></i><span></span></a>
                        </li>
                    </ul>
                </div>
                <!--清除浮动-->
                <div class="clear"></div>
            </div>


	<!-- 计算结果 所有参与记录 晒单 -->
	<div id="calculate" class="ProductTabNav">
	    <div id="divMidNav" class="DetailsT_Tit">
	        <div class="DetailsT_TitP">		     
                <ul>
			        <li class="Product_DetT DetailsTCur"><span class="DetailsTCur">计算结果</span></li>
			        <li class="All_RecordT"><span class="">所有参与记录</span></li>
			        <li class="Single_ConT"><span class="">晒单</span></li>          
		        </ul>
		    </div>
	    </div>
	</div>

	<!--补丁3.1.6_b.0.1-->
	<div id="divCalResult" class="Product_Content">	
		<div class="ygRecord" name="div_tab">
				<div class="yghelp">
					1、取该商品最后购买时间前网站所有商品的最后100条购买时间记录
					<br>
					2、每个时间记录按时、分、秒、毫秒依次排列取数值
					<br>
					3、将这100个数值之和除以该商品总参与人次后取余数，余数加上10000001 即为“幸运<?php echo _cfg('web_name_two'); ?>码”。
					<?php if(!$item['q_content']): ?>
					<br>
					<b>由于网站还未满100条购买记录。所以按照   10000001 + (揭晓时间求和结果*100/参与人数) 的余数   即为“幸运<?php echo _cfg('web_name_two'); ?>码”。</b>
					<?php endif; ?>
				</div>
				
				<?php if(!$item['q_content']): ?>
				<div class="RecordOnehundred"><h4> 未满100条计算结果 </h4>
					<div class="ResultBox"><h2>计算结果</h2>
							<p class="num4">求和：
								<span class="Fb"><?php echo $user_shop_time_add_final; ?></span>(揭晓时间求和结果)<br>取余：
								<span class="Fb"><?php echo $user_shop_time_add_final; ?></span>(揭晓时间)
								<span class="Fb"> * 100 / <?php echo $item['canyurenshu']; ?></span>(本商品总需参与人次)
								<span class="Fb"> = <?php echo $user_shop_fmod_final; ?></span>(余数)<br>结果：
								<span class="Fb"><?php echo $user_shop_fmod_final; ?></span>(余数)
								<span class="Fb"> + <?php echo $num_big_add; ?> = <em> <?php echo $item['q_user_code']; ?></em></span>
							</p>
							<b>最终结果：<?php echo $item['q_user_code']; ?></b>
						</div>  
						<div style="width:100%;height:30px;clear:bolt;"></div>
				</div>          
				<?php  else: ?>
			  
				<ul class="Record_title">
					<li class="time"><?php echo _cfg('web_name_two'); ?>时间</li>
					<li class="nem">会员账号</li>
					<li class="name">商品名称</li>
					<li class="much"><?php echo _cfg('web_name_two'); ?>人次</li>
				</ul>
				<div class="RecordOnehundred"><h4>截止该商品揭晓购买时间【<?php echo microt($item['q_end_time']); ?>】最后100条全站购买时间记录</h4>
				<div class="FloatBox"></div>	
				   <?php $ln=1;if(is_array($item['q_content'])) foreach($item['q_content'] AS $record): ?>
				   <?php 
						$itemid = $item['id'];
						$record_time = explode(".",$record['time']);
						$record['time'] = $record_time[0];
				    ?>		
				   <ul class="Record_content">
						<li class="time"><b><?php echo date("Y-m-d",$record['time']); ?></b><?php echo date("H:i:s",$record['time']); ?>.<?php echo $record_time['1']; ?></li>
						<li class="timeVal"><?php echo $record['timeadd']; ?></li>
						<li class="nem"><a class="gray02" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($record['uid']); ?>" target="_blank"><?php echo get_user_name($record['uid']); ?></a></li>
						<li class="name"><a class="gray02" href="<?php echo WEB_PATH; ?>/goods/<?php echo $record['shopid']; ?>" target="_blank">（第<?php echo $record['shopqishu']; ?>期）<?php echo $record['shopname']; ?></a></li>
						<li class="much"><?php echo $record['gonumber']; ?>人次</li>
					</ul>	
					<?php  endforeach; $ln++; unset($ln); ?>
				</div>
					
					<?php 
						$shop_fmod=$item['q_user_code']-10000001;
						$item['q_counttime']=(floor($item['q_counttime']/$item['canyurenshu']))*$item['canyurenshu']+$shop_fmod;
					 ?>
					<div class="RecordOnehundred"><h4> 100条计算结果 </h4>
					 <div class="ResultBox"><h2>计算结果</h2>
						<p class="num4">求和：
							<span class="Fb"><?php echo $item['q_counttime']; ?></span>(上面100条<?php echo _cfg('web_name_two'); ?>记录时间取值相加之和)<br>取余：
							<span class="Fb"><?php echo $item['q_counttime']; ?></span>(100条时间记录之和)
							<span class="Fb"> % <?php echo $item['canyurenshu']; ?></span>(本商品总需参与人次)
							<span class="Fb"> =  <?php echo $shop_fmod; ?></span>(余数)<br>结果：
							<span class="Fb"><?php echo $shop_fmod; ?></span>(余数)
							<span class="Fb"> + 10000001 = <em><?php echo $item['q_user_code']; ?></em></span>
						</p>
						<b>最终结果：<?php echo $item['q_user_code']; ?></b>
					</div>
					<div style="width:100%;height:30px;clear:bolt;"></div>
				   </div>
				<?php endif; ?>
				
			</div>
            
        
		<!-- 购买记录20条 -->
		<div name="div_tab" id="bitem" class="AllRecordCon">
			<iframe id="iframea_bitem" g_src="<?php echo WEB_PATH; ?>/go/goods/go_record_ifram/<?php echo $itemid; ?>/20" style="width: 2000px; border:none;height:1150px;" frameborder="0" scrolling="no"></iframe>		
		</div>	
	   <!-- /购买记录20条 -->
       <!--补丁3.1.6_b.0.1-->
       
       <!--补丁3.1.6_b.0.2-->
		<!-- 晒单 -->
		<div name="div_tab" id="divPost" class="Single_Content">
			<iframe id="iframea_divPost" g_src="<?php echo WEB_PATH; ?>/go/shaidan/itmeifram/<?php echo $itemid; ?>" style="width:978px; border:none;height:1150px;" frameborder="0" scrolling="no"></iframe>
		</div>
		<!-- 晒单 -->   
        <!--补丁3.1.6_b.0.2-->
	</div>
<script>
<!--补丁3.1.6_b.0.3-->
function set_iframe_height(fid,did,height){
	$("#"+fid).css("height",height);
}

$(function(){
var fouli=$(".DetailsT_TitP ul li");
var divCalResult =  $("div[name='div_tab']");
	fouli.click(function(){				
		var index=fouli.index(this);
		fouli.removeClass("DetailsTCur").eq(index).addClass("DetailsTCur");
		var iframe = divCalResult.hide().eq(index).find("iframe");
			if (typeof(iframe.attr("g_src")) != "undefined") {
			  	 iframe.attr("src",iframe.attr("g_src"));
				 iframe.removeAttr("g_src");
			}
			
		divCalResult.hide().eq(index).show();
	});
<!--补丁3.1.6_b.0.3-->
	

	$(".Announced_But").click(function(){
		var next_li = $(".DetailsT_TitP ul>li");
		var index = $(this).index()
		next_li.eq(index).click();
	});

	
	$(window).scroll(function(){
		if($(window).scrollTop()>=941){
			$("#divMidNav").addClass("nav-fixed");
		}else if($(window).scrollTop()<941){
			$("#divMidNav").removeClass("nav-fixed");
		}
	});
});
function divOpen(){
var height=$("#userRnoId").css("height");
	if(height=="90px"){
		$("#userRnoId").css("height","auto");
	}else{
		$("#userRnoId").css("height",90);
	};
}
$(function(){	
	$("#divOpen").click(divOpen);
});
</script>	
<?php include templates("index","footer");?>