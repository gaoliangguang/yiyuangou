<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?>                            <div class="line-time">
							<!-- 限时揭晓 -->
            <?php if($item['xsjx_time']!='0'): ?>
            <div id="divAutoRTime" class="Immediate">
			            <span><a class="orange" target="_blank" href="#">限时揭晓的规则？</a></span>
                        <i id="timeall" endtime="<?php echo date("m-d-Y H:i:s",$item['xsjx_time']); ?>" lxfday="no"></i>		                           
			</div>
            <script type="text/javascript">			
			function lxfEndtime(xsjx_time_shop,this_time){	
				if(!this.xsjx_time_shop){
					this.xsjx_time_shop = xsjx_time_shop;	
					this.this_time		= this_time
				}
				this.this_time = this.this_time + 1000;
				lxfEndtime_setTimeout  = window.setTimeout("lxfEndtime()",1000);				
				var endtime = <?php echo $item['xsjx_time']; ?>000;
			    var youtime = endtime - this.this_time;	   	   //还有多久(毫秒值)
				
				var seconds = youtime/1000;
				var minutes = Math.floor(seconds/60);
				var hours = Math.floor(minutes/60);
				var days = Math.floor(hours/24);
				var CDay= days;
				var CHour= hours % 24;
				var CMinute= minutes % 60;
				var CSecond= Math.floor(seconds%60);//"%"是取余运算，可以理解为60进一后取余数，然后只要余数							
				this.xsjx_time_shop.html("<b>限时揭晓</b><p>剩余时间：<em>"+days+"</em>天<em>"+CHour+"</em>时<em>"+CMinute+"</em>分<em>"+CSecond+"</em>秒</p>");
				delete youtime,seconds,minutes,hours,days,CDay,CHour, CMinute, CSecond;
				if(endtime <= this.this_time){			
					lxfEndtime_setTimeout && clearTimeout(lxfEndtime_setTimeout);					
					this.xsjx_time_shop.html("<b>限时揭晓</b><p>正在计算中....</p>");//如果结束日期小于当前日期就提示过期啦	
					xsjx_time_shop = this.xsjx_time_shop;
					$.ajaxSetup({
						async : false
					});
					$.post("<?php echo WEB_PATH; ?>/go/autolottery/autolottery_ret_install",{"shopid":<?php echo $item['id']; ?>},function(data){		
						alert(data)
						if(data == '-1'){
							xsjx_time_shop.html("<b>限时揭晓</b><p>没有这个商品!</p>");
							return;
						}
						if(data == '-2'){
							xsjx_time_shop.html("<b>限时揭晓</b><p>商品揭晓失败!</p>");
							return;
						}
						if(data == '-3'){							
							xsjx_time_shop.html("<b>限时揭晓</b><p>商品参与人数为0，商品不予揭晓!</p>");
							return;
						}
						if(data == '-4'){
							xsjx_time_shop.html("<b>限时揭晓</b><p>商品还未到揭晓时间!</p>");
							return;
						}
						if(data == '-5'){
							xsjx_time_shop.html("<b>限时揭晓</b><p>商品揭晓时间已过期!</p>");
							return;
						}if(data == '-6'){							
							 xsjx_time_shop.html("<b>限时揭晓</b>商品正在揭晓中!");								
							 window.location.href=location.href;
							 return;
						}else{							
							xsjx_time_shop.html("<b>限时揭晓</b><p>揭晓幸运码:<i style='color:#fff;background:#f60; padding:3px 5px;'>"+data+"</i></p>");						
							return;
						}						
						
					});
					
				}							
			  }			  
			 $(function(){lxfEndtime($("#timeall"),<?php echo time(); ?>000);});
			</script>
            <?php endif; ?>			



			<!-- 限时揭晓end -->
							<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/GoodsDetailFun.js"></script>
                                <div class="line-wrapper u-progress" title="已完成<?php echo percent($item['canyurenshu'],$item['zongrenshu']); ?>"><span class="pgbar" style="width:<?php echo width($item['canyurenshu'],$item['zongrenshu'],450); ?>px;display:"><span class="pging"></span></span></div>
                                <div class="text-wrapper clearfix">
                                    <div class="now-has">
                                        <span>
                                            <?php echo $item['canyurenshu']; ?></span>
                                        <p>已参与</p>
                                    </div>
                                    <div class="total-has">
                                        <span id="CodeQuantity">
                                            <?php echo $item['zongrenshu']; ?></span>
                                        <p>总需人次</p>
                                    </div>
                                    <div class="overplus-has">
                                        <span id="CodeLift">
                                            <?php echo $syrs; ?></span>
                                        <p>剩余</p>
                                    </div>
                                </div>
                            </div>
						
                            <div class="my-buy clearfix">
                                <p class="mine">我要参与</p>
                                <div id="divNumber" class="option-wrapper clearfix">
                                    <a href="javascript:;" class="mius"id="shopsub">-</a>
                                    <input class="input-num" value="10" type="text" onKeyUp="value=value.replace(/\D/g,'')" id="num_dig">
                                    <a href="javascript:;" class="add" id="shopadd">+</a>
				
                                </div>
								<ul class="check-num clearfix"><li onclick="add10();">10</li><li onclick="add50();">50</li><li onclick="add100();">100</li><li onclick="add200();">200</li></ul>
                                <ul class="check-num clearfix"></ul>
                                <p class="fl">人次</p>
                                <div class="mine-prob" style="display:none;"><i></i></div>
                                <span id="span_tip"></span>
                            </div>

							<div style="display:none;" id="hqid"><?php echo $item['id']; ?></div>
                            <div id="divBuy" class="consume-wrapper clearfix">
							<?php if($item['shenyurenshu'] == '0'): ?>
							 <a href="javascript:;" id="consume-now">已满员</a>
							<?php  else: ?>
                                <a href="javascript:;" id="consume-now" class="Det_Shopbut">立即夺宝</a>
							<?php endif; ?>
                                <a href="javascript:;" id="consume-addcar" class="Det_Cart">加入购物车</a>
                            </div>
							
                        <br/> 
                        <div class="about-tips clearfix">
                            <ul class="f-inner clearfix">
                                <li class="z-beginning">三大服务保证：</li>
                                <li><a><i class="ng-xq-bg t1"></i>100%公平公正</a></li>
                                <li class="z-lines"><b></b></li>
                                <li><a><i class="ng-xq-bg t2"></i>100%正品保证</a></li>
                                <li class="z-lines"><b></b></li>
                                <li><a><i class="ng-xq-bg t3"></i>全国免费配送</a></li>
                            </ul>
                        </div>
					<br/> 
			
			 

            
   <script>  
   	 $(function(){
		 $("#num_dig").mousemove(function(){
		  $(this).css("border","1px solid #f60");		 
		});
		 $("#num_dig").mouseout(function(){
		  $(this).css("border","1px solid #CFCFCF");		 
		});		
	});
   </script>       
           