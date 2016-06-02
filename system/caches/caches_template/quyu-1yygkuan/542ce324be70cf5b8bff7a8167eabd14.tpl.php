<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/GoodsDetail.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/header.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/js/cloud-zoom.css"/>
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/cloud-zoom.min.js"></script>
<script type="text/javascript">
$.fn.CloudZoom.defaults = {
	zoomWidth: '400',
	zoomHeight: '310',
	position: 'right',
	tint: false,
	tintOpacity: 0.5,
	lensOpacity: 0.5,
	softFocus: false,
	smoothMove: 7,
	showTitle: false,
	titleOpacity: 0.5,
	adjustX: 0,
	adjustY: 0
};
</script>
<style type="text/css">
.zoom-section{clear:both;margin-top:20px;}
.zoom-small-image{float:left;margin-bottom:20px; width:400px; height:400px;}
.zoom-small-image img{ width:400px; height:400px;}
.zoom-desc{float:left;width:404px; height:52px;margin-bottom:20px; overflow:hidden;}
.zoom-desc p{ width:10000px; height:52px; float:left; display:block; position:absolute; top:0; z-index:3; overflow:hidden;}
.zoom-desc label{ width:70px; height:52px; margin:0 5px 0 0; _margin-right:4px; display:block; float:left; overflow:hidden;}
.zoom-tiny-image{border:1px solid #CCC;margin:0px; width:48px; height:50px;}
.zoom-tiny-image:hover{border:1px solid #C00;}
</style>
<div class="Current_nav">
	<a href="<?php echo WEB_PATH; ?>">首页</a> <span>&gt;</span> 
	<a href="<?php echo WEB_PATH; ?>/goods_list/<?php echo $item['cateid']; ?>">
	<?php echo $category['name']; ?>
	</a><span>&gt;</span> 
	<a href="<?php echo WEB_PATH; ?>/goods_list/<?php echo $item['cateid']; ?>e<?php echo $item['brandid']; ?>">
	<?php echo $brand['name']; ?>
	</a> <span>&gt;</span>商品详情
</div>
<div class="show_content">
	<!-- 商品期数 -->

	<div id="divPeriodList" class="show_Period" style="max-height:99px;">	
	
		<div class="period_Open">
		<li id="li_more"><a id="btnOpenPeriod" href="javascript:void(0);" title="更多">更多<i>+</i></a></li>
		</div>
		
		<?php echo $loopqishu; ?>
	</div>
	<script>
		$("#btnOpenPeriod").click(function(){
				var ui_obj = $("#divPeriodList > ul");
				if($(this).attr("click")=='off'){
					$("#divPeriodList").css("max-height",ui_obj.length*33+"px");	
					$(this).attr("click","on");
					$(this).html("收起<s></s>");
					
				}else{
					$("#divPeriodList").css("max-height","99px");	
					$(this).attr("click","off");
					$(this).html("更多<i></i>");
				}			
		});
	</script>	
	<div id="divMain" class="ng-main-wrapper">
            <!--期数-->
            

            <!--商品信息 begin-->
            <div id="divMainInfo" class="ng-main clearfix">
                <!--图片展示-->
                <div class="Pro_Detleft">
			<div class="zoom-small-image">
				<span href="<?php echo G_UPLOAD_PATH; ?>/<?php echo $item['thumb']; ?>" class = 'cloud-zoom' id='zoom1' rel="adjustX:10, adjustY:-2">
                <img width="80px" height="80px" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $item['thumb']; ?>" /></span>
			</div>

			<div class="zoom-desc"> 
				<div class="jcarousel-prev jcarousel-prev-disabled"></div>
				<div class="jcarousel-clip" style="height:55px;width:384px;">
				<p>
					<?php $ln=1;if(is_array($item['picarr'])) foreach($item['picarr'] AS $imgtu): ?>                  
					<label href="<?php echo G_UPLOAD_PATH; ?>/<?php echo $imgtu; ?>" class='cloud-zoom-gallery'  rel="useZoom: 'zoom1', smallImage: '<?php echo G_UPLOAD_PATH; ?>/<?php echo $imgtu; ?>'">
					<img class="zoom-tiny-image" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $imgtu; ?>" /></label>			
					<?php  endforeach; $ln++; unset($ln); ?> 
				</p>
				</div>
				<div class="jcarousel-next jcarousel-next-disabled"></div>
			</div>
			<script>
				var si=$(".jcarousel-clip label").size();
				var label=si*55;
				$(".jcarousel-clip p").css({width:label,left:"0"});
				if(label>395){
					$(".jcarousel-prev,.jcarousel-next").show();
				}else{
					$(".jcarousel-prev,.jcarousel-next").hide();
				}
				$(".jcarousel-prev").click(function(){
					var le=$(".jcarousel-clip p").css("left");
					var le2=le.replace(/px/,"");
					if(le!='0px'){
						$(".jcarousel-clip p").css({left:le2*1+55});
					}						
				})
				$(".jcarousel-next").click(function(){
					var le=$(".jcarousel-clip p").css("left");
					var le2=le.replace(/px/,"");
					var max_next=-(si-7)*55+"px";
					if(le!=max_next){						
						$(".jcarousel-clip p").css({left:le2*1-55});
					}
				})
			</script>			
			
			
		</div>

                <!--正在进行中-->
                
                    <div style="margin-left: -117px;" class="ng-goods-detail ng-goods-detail-height">
                        
                            <h2 class="o-title"><span class="num">
                                (第<?php echo $item['qishu']; ?>期)</span><?php echo $item['title']; ?><span class="o-info"><?php echo $item['title2']; ?></span>
                            </h2>
                            <p class="text-left price o-p">价值：<?php echo $item['money']; ?></p>

                            <?php if(($q_showtime=='Y')): ?>
				<?php include templates("index","item_animation");?>
			<?php  else: ?>
				<?php include templates("index","item_contents");?>
			<?php endif; ?>	

                        <div class="advert-wrapper">
                            <ul class="select-wrapper">
                                <li class="gray9">怎么玩儿<i class="ng-xq-bg"></i></li>
                            </ul>
                            <div id="div_advertinner" class="advert-inner clearfix">
                                <div class="advert-list01 advert-m">
                                    <div class="ad-icon01 ng-xq-bg"></div>
                                    <p class="ad-title">选择商品</p>
                                    <p class="ad-info">
                                        每个商品规定总需<br>
                                        参与人次(1人次=1元)
                                    </p>
                                    <div class="arrow ng-xq-bg"></div>
                                </div>
                                <div class="advert-list02 advert-m">
                                    <div class="ad-icon02 ng-xq-bg"></div>
                                    <p class="ad-title">支付1元</p>
                                    <p class="ad-info">
                                        参与人次越多<br>
                                        获得机率越大
                                    </p>
                                    <div class="arrow ng-xq-bg"></div>
                                </div>
                                <div class="advert-list03 advert-m">
                                    <div class="ad-icon03 ng-xq-bg"></div>
                                    <p class="ad-title">抽出幸运获得者</p>
                                    <p class="ad-info">
                                        所有人次售完后根据计算规则<br>
                                        抽出一位幸运获得者
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                

                <!--揭晓倒计时-->
                

                <!--右侧：闪购记录-->

                <div class="ng-goods-buy">
                    <!--进行中状态-->
                    <script src="http://skin.1yyg.com/JS/GoodsDetailFun.js?date=150730" type="text/javascript" language="javascript"></script>
                        <div class="ng-buy-list">
                            <div id="div_buynav" class="ng-buy-nav">
                                <a href="javascript:;" title="最新<?php echo _cfg('web_name_two'); ?>记录" class="ng-fl current">最新<?php echo _cfg('web_name_two'); ?>记录</a>
                                <a href="<?php echo WEB_PATH; ?>/member/home/userbuylist" title="我的<?php echo _cfg('web_name_two'); ?>记录" class="ng-fr">我的<?php echo _cfg('web_name_two'); ?>记录</a>
					
								
                                <div class="b-line"></div>
                            </div>

                            <div id="div_goodsrecord" class="list-wrap">
							
                                <div class="my-list">
								<?php $ln=1;if(is_array($us)) foreach($us AS $user): ?>
                                    <ul style="margin-top: 0px;" id="UserBuyNewList" class="list">
									<li>
									<a rel="nofollow" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($user['uid']); ?>" title="<?php echo $user['username']; ?>" target="_blank" class="buy-name">
									
									<i class="head-s-pic">
									<?php if(!empty($user['uphoto'])): ?>
									<img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $user['uphoto']; ?>" height="22" width="22">
									<?php  else: ?>
									<img src="<?php echo G_UPLOAD_PATH; ?>/photo/member.jpg" height="22" width="22">
									<?php endif; ?>
									</i><?php echo $user['username']; ?></a>
									<span class="buy-num"><?php echo $user['gonumber']; ?></span>人次</li>
                                    </ul>
									<?php  endforeach; $ln++; unset($ln); ?>
                                </div>
							
                                <a id="btnUserBuyMore" href="javascript:;" style="" class="select-all">查看全部</a>
                            </div>

                            
                        </div>
                    

                    <!--结束状态-->
                    
                </div>
                <!--清除浮动-->
                <div class="clear"></div>
            </div>
        </div>
	
			<script>
				var si=$(".jcarousel-clip label").size();
				var label=si*55;
				$(".jcarousel-clip p").css({width:label,left:"0"});
				if(label>395){
					$(".jcarousel-prev,.jcarousel-next").show();
				}else{
					$(".jcarousel-prev,.jcarousel-next").hide();
				}
				$(".jcarousel-prev").click(function(){
					var le=$(".jcarousel-clip p").css("left");
					var le2=le.replace(/px/,"");
					if(le!='0px'){
						$(".jcarousel-clip p").css({left:le2*1+55});
					}						
				})
				$(".jcarousel-next").click(function(){
					var le=$(".jcarousel-clip p").css("left");
					var le2=le.replace(/px/,"");
					var max_next=-(si-7)*55+"px";
					if(le!=max_next){						
						$(".jcarousel-clip p").css({left:le2*1-55});
					}
				})
			</script>			
			
<!-- 商品信息导航 -->
<div class="ProductTabNav">
	<div id="divProductNav" class="DetailsT_Tit">
		<div class="DetailsT_TitP">
			<ul>
				<li class="Product_DetT DetailsTCur"><span class="DetailsTCur">商品详情</span></li>
				<li id="liUserBuyAll" class="All_RecordT"><span class="">所有参与记录</span></li>
				<li class="Single_ConT"><span class="">晒单</span></li>
			</ul>
			<!-- <p><a id="btnAdd2Cart" href="javascript:;" class="white DetailsT_Cart"><s></s>加入购物车</a></p> -->
		</div>
	</div>
</div>

<!--补丁3.1.6_b.0.1-->
<div id="divContent" class="Product_Content">
	<!-- 商品内容 -->
	<div class="Product_Con"><?php echo $item['content']; ?></div>
    <!-- 商品内容 -->
    
    <!-- 购买记录20条 -->
	<div id="bitem" class="AllRecordCon">
		<iframe id="iframea_bitem" g_src="<?php echo WEB_PATH; ?>/go/goods/go_record_ifram/<?php echo $itemid; ?>/20" style="width:978px; border:none;height:1150px" frameborder="0" scrolling="no"></iframe>		
	</div>	
   <!-- /购买记录20条 -->
    
	<!-- 晒单 -->
	<div id="divPost" class="Single_Content">
		<iframe id="iframea_divPost" g_src="<?php echo WEB_PATH; ?>/go/shaidan/itmeifram/<?php echo $itemid; ?>" style="width:978px; border:none;height:100%" frameborder="0" scrolling="no"></iframe>
	</div>
    <!-- 晒单 -->	
</div>
<!--补丁3.1.6_b.0.1-->


<script type="text/javascript">
<!--补丁3.1.6_b.0.2-->
function set_iframe_height(fid,did,height){	
	$("#"+fid).css("height",height);	
}

$(function(){
	$("#ulRecordTab li").click(function(){
		var add=$("#ulRecordTab li").index(this);
		$("#ulRecordTab li").removeClass("Record_titCur").eq(add).addClass("Record_titCur");
		$(".Pro_Record .hide").hide().eq(add).show();
	});
	
	var DetailsT_TitP = $(".DetailsT_TitP ul li");
	var divContent    = $("#divContent div");	
	DetailsT_TitP.click(function(){
		var index = $(this).index();
			DetailsT_TitP.removeClass("DetailsTCur").eq(index).addClass("DetailsTCur");
	
			var iframe = divContent.hide().eq(index).find("iframe");
			if (typeof(iframe.attr("g_src")) != "undefined") {
			  	 iframe.attr("src",iframe.attr("g_src"));
				 iframe.removeAttr("g_src");
			}
			divContent.hide().eq(index).show();
	});
	<!--补丁3.1.6_b.0.2-->
	
	
	<!--补丁查看更多-->
	$("#btnUserBuyMore").click(function(){
		$("#liUserBuyAll").click();
		$("html,body").animate({scrollTop:941},1500);
	});
	$(window).scroll(function(){
		if($(window).scrollTop()>=941){
			$("#divProductNav").addClass("nav-fixed");
		}else if($(window).scrollTop()<941){
			$("#divProductNav").removeClass("nav-fixed");
		}
	});
})
var shopinfo={'shopid':<?php echo $item['id']; ?>,'money':<?php echo $item['yunjiage']; ?>,'shenyu':<?php echo $syrs; ?>};
<!--补丁查看更多-->
	
$(function(){
	function baifenshua(aa,n){
	n = n || 2;
	return ( Math.round( aa * Math.pow( 10, n + 2 ) ) / Math.pow( 10, n ) ).toFixed( n ) + '%';
}
	var shopnum = $("#num_dig");
		var ten_per = Math.floor(parseInt(<?php echo $item['zongrenshu']; ?>)) || 1;
	var max_num = (ten_per > parseInt(shopinfo['shenyu'])) ? parseInt(shopinfo['shenyu']) : ten_per;
	shopnum.keyup(function(){
		if(shopnum.val()>=max_num){
			shopnum.val(max_num);
		}
		var numshop=shopnum.val();
		if(numshop==<?php echo $item['zongrenshu']; ?>){
			var baifenbi='100%';
		}else{
			var showbaifen=numshop/<?php echo $item['zongrenshu']; ?>;
			var baifenbi=baifenshua(showbaifen,2);
		}
		$("#chance").html("<span style='color:red'>获得机率"+baifenbi+"</span>");
	});
	
	$("#shopadd").click(function(){
		var shopnum = $("#num_dig");
			var resshopnump='';
			var ten_per = Math.floor(parseInt(<?php echo $item['zongrenshu']; ?>)) || 1;
			var max_num = (ten_per > parseInt(shopinfo['shenyu'])) ? parseInt(shopinfo['shenyu']) : ten_per;
			var num = parseInt(shopnum.val());
			if(num >= max_num){
				shopnum.val(max_num);
				resshopnump = max_num;
			}else{
				resshopnump=parseInt(shopnum.val())+1;
				shopnum.val(resshopnump);
			}
			if(resshopnump==<?php echo $item['zongrenshu']; ?>){
				var baifenbi='100%';
			}else{
				var showbaifen=resshopnump/<?php echo $item['zongrenshu']; ?>;
				var baifenbi=baifenshua(showbaifen,2);
			}
			$("#chance").html("<span style='color:red'>获得机率"+baifenbi+"</span>");
	});
	
	
	$("#shopsub").click(function(){
		var shopnum = $("#num_dig");
		var num = parseInt(shopnum.val());
		if(num<2){
			shopnum.val(1);			
		}else{
			shopnum.val(parseInt(shopnum.val())-1);
		}
		var shopnums=parseInt(shopnum.val());
		if(shopnums==<?php echo $item['zongrenshu']; ?>){
				var baifenbi='100%';
			}else{
				var showbaifen=shopnums/<?php echo $item['zongrenshu']; ?>;
				var baifenbi=baifenshua(showbaifen,2);
			}
			$("#chance").html("<span style='color:red'>获得机率"+baifenbi+"</span>");
	});
});

$(function(){
$(".Det_Cart").click(function(){ 
	//添加到购物车动画
	var src=$("#zoom1 img").attr('src');  
	var $shadow = $('<img id="cart_dh" style="display: none; border:1px solid #aaa; z-index: 99999;" width="400" height="400" src="'+src+'" />').prependTo("body"); 
	var $img = $(".mousetrap").first("img");
	$shadow.css({ 
	   'width' : $img.css('width'), 
	   'height': $img.css('height'),
	   'position' : 'absolute',      
	   'top' : $img.offset().top,
	   'left' : $img.offset().left, 
	   'opacity' :1    
	}).show();
	var $cart =$("#btnMyCart");
	var numdig=$(".num_dig").val();
	$shadow.animate({   
		width: 1, 
		height: 1, 
		top: $cart.offset().top, 
		left: $cart.offset().left,
		opacity: 0
	},500,function(){
		Cartcookie(false);
	});		
});
	$(".Det_Shopbut").click(function(){	
		Cartcookie(true);
	});	
});



function Cartcookie(cook){
	var shopid=shopinfo['shopid'];
	var number=parseInt($("#num_dig").val());
	if(number<=1){number=1;}
	var Cartlist = $.cookie('Cartlist');
	if(!Cartlist){
		var info = {};
	}else{
		var info = $.evalJSON(Cartlist);
		if((typeof info) !== 'object'){
			var info = {};
		}
	}		
	if(!info[shopid]){
		var CartTotal=$("#sCartTotal").text();
			$("#sCartTotal").text(parseInt(CartTotal)+1);
			$("#btnMyCart em").text(parseInt(CartTotal)+1);
	}	
	info[shopid]={};
	info[shopid]['num']=number;
	info[shopid]['shenyu']=shopinfo['shenyu'];
	info[shopid]['money']=shopinfo['money'];
	info['MoenyCount']='0.00';	
	$.cookie('Cartlist',$.toJSON(info),{expires:7,path:'/'});
	if(cook){
		window.location.href="<?php echo WEB_PATH; ?>/member/cart/cartlist/"+new Date().getTime();//+new Date().getTime()
	}
}  
</script> 
 </div>
<?php include templates("index","footer");?>