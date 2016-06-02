<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?>
<?php include templates("index","header");?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>购物车 - <?php echo _cfg("web_name"); ?></title>
<meta name="keywords" content="<?php if(isset($keywords)): ?><?php echo $keywords; ?><?php  else: ?><?php echo _cfg("web_key"); ?><?php endif; ?>" />
<meta name="description" content="<?php if(isset($description)): ?><?php echo $description; ?><?php  else: ?><?php echo _cfg("web_des"); ?><?php endif; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/App/Css/Comm.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/@/css/base.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/App/Css/CartList.css"/>
<script type="text/javascript" src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/jquery.cookie.js"></script>
<script>
$(function(){
	$("#sCart").hover(
		function(){
			$("#J_miniCartList,#sCartLoading").show();
			$("#J_miniCartList p,#J_miniCartList h3").hide();
			$("#sCart .mycartcur").remove();
			$("#sCartTotal2").html("");
			$("#sCartTotalM").html("");
			$.getJSON("<?php echo WEB_PATH; ?>/member/cart/cartheader/="+ new Date().getTime(),function(data){
				$("#sCart .mycartcur").remove();
				$("#sCartLoading").before(data.li);
				$("#sCartTotal2").html(data.num);
				$("#sCartTotalM").html(data.sum);
				$("#sCartLoading").hide();
				$("#J_miniCartList p,#J_miniCartList h3").show();
			});
		},
		function(){
			$("#J_miniCartList").hide();
		}
	);
	$("#sGotoCart").click(function(){
		window.location.href="<?php echo WEB_PATH; ?>/member/cart/cartlist";
	});
})
function delheader(id){
	var Cartlist = $.cookie('Cartlist');
	var info = $.evalJSON(Cartlist);
	var num=$("#sCartTotal2").html()-1;
	var sum=$("#sCartTotalM").html();
	info['MoenyCount'] = sum-info[id]['money']*info[id]['num'];

	delete info[id];
	//$.cookie('Cartlist','',{path:'/'});
	$.cookie('Cartlist',$.toJSON(info),{expires:30,path:'/'});
	$("#sCartTotalM").html(info['MoenyCount']);
	$('#sCartTotal2').html(num);
	$('#sCartTotal').text(num);
	$('#btnMyCart em').text(num);
	$("#mycartcur"+id).remove();
}
$(function(){
	$(".welcome").mouseover(function(){
		$(".user-info-menu").show();
	});
	$(".welcome").mouseout(function(){
		$(".user-info-menu").hide();
	});
	$(".h_news").mouseover(function(){
		$(".h_news_down").show();
	});
	$(".h_news").mouseout(function(){
		$(".h_news_down").hide();
	});
});
$(".g-hotL-list").hover(
　　function () {
　　$(this).addClass("g-hotL-hover");
　　},
　　function () {
　　$(this).removeClass("g-hotL-hover");
　　}
　　);
$(function(){
	$("#txtSearch").focus(function(){
		$("#txtSearch").css({background:"#FFFFCC"});
		var va1=$("#txtSearch").val();
		if(va1=='搜索您需要的商品'){
			$("#txtSearch").val("");
		}
	});
	$("#txtSearch").blur(function(){
		$("#txtSearch").css({background:"#FFF"});
		var va2=$("#txtSearch").val();
		if(va2==""){
			$("#txtSearch").val('搜索您需要的商品');
		}
	});
	$("#butSearch").click(function(){
		window.location.href="<?php echo WEB_PATH; ?>/s_tag/"+$("#txtSearch").val();
	});
});
</script>
</head>
<body>


<div class="container">
        <!--S cart-->
    <div id="shopCartBox">
        <div class="shop-cart-box">
    <div class="shop-cart-box-hd" style="width: 80%;"><h2 class="title">我的购物车</h2></div>
    <div class="shop-cart-box-bd" style="width: 80%;">
        <dl class="shop-cart-goods">
            <dt class="clearfix">
                <span class="col col-1" style="width: 60%;">商品</span>
                <span class="col col-2" style="width: 10%;">价值</span>
                <span class="col col-3" style="width: 13%;">数量</span>
                <span class="col col-4" style="width: 8%;">剩余</span>
                <span class="col col-5" style="width: 5%;">操作</span>
            </dt>
			<?php $ln=1;if(is_array($shoplist)) foreach($shoplist AS $shops): ?>
            <dd class="item" id="shoplist<?php echo $shops['id']; ?>">
                <div class="item-row">
                    <div class="col col-1">
                        <div class="g-pic"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $shops['id']; ?>" target="_blank"><img alt="" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $shops['thumb']; ?>" width="120" height="120"></a></div>
                        <div class="g-info">
                            <div class="g-name"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $shops['id']; ?>" target="_blank"><?php echo $shops['title']; ?></a><br /><p class="tips"></p></div>
                        </div>
                    </div>
                    <div class="col col-2"><?php echo $shops['money']; ?>元</div>
                    <div class="col col-3">
						<div class="change-goods-num num">
                            <a href="javascript:;" class="J_minus" val="<?php echo $shops['id']; ?>"><i class="iconfont">-</i></a>
							<input type="type" val="<?php echo $shops['id']; ?>" onkeyup="value=value.replace(/\D/g,'')" value="<?php echo $shops['cart_gorenci']; ?>" class="goods-num" />
                            <a href="javascript:;" class="J_plus" val="<?php echo $shops['id']; ?>"><i class="iconfont">+</i></a>
                        </div>
                    </div>
                    <div class="col col-4"><em><?php echo $shops['cart_shenyu']; ?></em>人次</div>
                    <div class="col col-5"><a  href="javascript:;" onclick="delcart(<?php echo $shops['id']; ?>)" class="del J_delGoods"><i class="iconfont">删除</i></a></div>
                </div>
            </dd>
			<?php  endforeach; $ln++; unset($ln); ?>
            <dd class="item clearfix">
                <div class="col col-1">
                    <div class="g-pic"><span class="icon-activity icon-activity-my">免邮</span></div>
                    <div class="g-info">
                        <div class="activity-info clearfix"><?php echo _cfg("web_name_two"); ?>全场免邮费</div>
                    </div>
                </div>
                <div class="col col-2"></div>
                <div class="col col-3"></div>
                <div class="col col-4"></div>
                <div class="col col-5"></div>
            </dd>
        </dl>
    </div>
    <div class="shop-cart-box-ft clearfix">
        <div class="shop-cart-total" style="margin-right: 130px;"省><p class="total-price">商品总计：<span><strong id="moenyCount"><?php echo $MoenyCount; ?></strong>元</span></p></div>
        <div class="shop-cart-action clearfix">
            <a style="margin-right: 98px;width: 200px; background: rgb(255, 74, 0) none repeat scroll 0% 0%; color: rgb(255, 255, 255); display: block; height: 44px; text-align: center; line-height: 44px;" href="javascript:;" class="btn btn-primary btn-next" id="but_ok">去结账</a>
        
        </div>
    </div>
</div>
</div>
</div>
<script type="text/javascript">
var info=<?php echo $Cartshopinfo; ?>;
var numberadd=$(".J_plus");
var numbersub=$(".J_minus");
var xiaoji=$(".xj");
var num=$(".goods-num");
var message=$(".tips");
var moenyCount=$("#moenyCount");

$(function(){
	$("#but_ok").click(function(){
		var countmoney=parseInt(moenyCount.text());
		if(countmoney > 0){
			//$.cookie('Cartlist','',{path:'/'});
			$.cookie('Cartlist',$.toJSON(info),{expires:30,path:'/'});
			document.location.href='<?php echo WEB_PATH; ?>/member/cart/pay';
		}else{
			alert("购物车为空!");
		}
	});
});
function UpdataMoney(shopid,number,zindex){
		var number = parseInt(number);
		info['MoenyCount']=info['MoenyCount']-info[shopid]['money']*info[shopid]['num']+info[shopid]['money']*number;
		info[shopid]['num']=number;
		var xjmoney=xiaoji.eq(zindex+1);
			xjmoney.text(info[shopid]['money']*number+'.00');
			moenyCount.text(info['MoenyCount']+'.00');
}


function delcart(id){
	info['MoenyCount'] = info['MoenyCount']-info[id]['money']*info[id]['num'];
	$("#shoplist"+id).hide();
	$("#moenyCount").text(info['MoenyCount']+".00");
	delete info[id];
	//$.cookie('Cartlist','',{path:'/'});
	$.cookie('Cartlist',$.toJSON(info),{expires:30,path:'/'});
}

num.keyup(function(){
	var shopid=$(this).attr("val");
	var zindex=num.index(this);
	if($(this).val() > info[shopid]['shenyu']){
		message.eq(zindex).text("购买次数不能超过"+info[shopid]['shenyu']+"人次");
		$(this).val(info[shopid]['shenyu']);
		UpdataMoney(shopid,$(this).val(),zindex);
		return;
	}
	if($(this).val()<1){
		message.eq(zindex).text("购买次数不能少于1人次");
		$(this).val(1);
		UpdataMoney(shopid,$(this).val(),zindex);
		return;
	}
	UpdataMoney(shopid,$(this).val(),zindex);
});
numberadd.click(function(){
	var shopid=$(this).attr('val');
	var zindex=numberadd.index(this);
	var thisnum=num.eq(zindex);
		if(info[shopid]['num'] >= info[shopid]['shenyu']){
			message.eq(zindex).text("购买次数不能超过"+info[shopid]['shenyu']+"人次");
			return;
		}
		var number=info[shopid]['num']+1;
			thisnum.val(number);
			UpdataMoney(shopid,number,zindex);
});
numbersub.click(function(){
	var shopid=$(this).attr('val');
	var zindex=numbersub.index(this);
	var thisnum=num.eq(zindex);
		if(info[shopid]['num'] <=1){
			message.eq(zindex).text("购买次数不能少于1人次");
			return;
		}
		var number=info[shopid]['num']-1;
			thisnum.val(number);
			UpdataMoney(shopid,number,zindex);
});

</script>
<!--footer 开始-->
<?php include templates("index","foot");?>