<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<div class="layout980 clearfix">

<?php include templates("member","top");?>	
	

	
<div class="c_person_record">
<ul class="c_person_list">
	<li class=""><a href="<?php echo WEB_PATH; ?>/member/home/userbuylist" hidefocus="">云购记录</a></li>
	<li class=""><a href="<?php echo WEB_PATH; ?>/member/home/singlelist" hidefocus="">我的晒单</a></li>
	<li class=""><a href="<?php echo WEB_PATH; ?>/member/home/orderlist" hidefocus="">中奖记录</a></li>
	<li class=""><a href="<?php echo WEB_PATH; ?>/member/home/userfufen" hidefocus="">我的夺宝币</a></li>
	<li class=""><a href="<?php echo WEB_PATH; ?>/member/home/userbalance" hidefocus="">账户管理</a></li>
	<li class=""><a href="<?php echo WEB_PATH; ?>/member/home/commissions" hidefocus="">奖励专区</a></li>
	<li class=""><a href="<?php echo WEB_PATH; ?>/member/home/invitefriends" hidefocus="">邀请好友</a></li>
	<li class=""><a href="<?php echo WEB_PATH; ?>/member/home/address" hidefocus="">收货地址</a></li>
</ul>
			<div class="c_reward_list">                          
				<h3 class="c_reward_title">购买记录</h3>
				<ul class="c_reward_classify">
					
					
					
				<li></li><ul>
			</ul></ul></div>
			<c id="more"></c>
			<input value="3" id="status" type="hidden">

			<div class="c_part_record">
		

				
				<table id="listTable">
				<tbody>
				<tr class="c_part_title c_recharge_title">
				<th class="c_prize_img">商品图片</th>
				<th class="c_cloud_name">商品名称</th>
				<th class="c_part_num">云购状态</th>
				<th class="c_cloud_number">参与人次</th>
				<th class="c_cloud_number">云购号码</th>
				<th class="c_part_operate">获得者</th>
				</tr>

			

		<?php $ln=1;if(is_array($record)) foreach($record AS $rt): ?>
        <?php 
        	$jiexiao = get_shop_if_jiexiao($rt['shopid']);
         ?>
		<?php if($jiexiao['q_uid']): ?>
				<tr>
			
			
				<td><a title="" target="_blank" class="pic" href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $rt['shopid']; ?>_<?php echo $rt['shopqishu']; ?>"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $jiexiao['thumb']; ?>"></a></td>
				<td><a href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $rt['shopid']; ?>_<?php echo $rt['shopqishu']; ?>">第(<?php echo $rt['shopqishu']; ?>)期 <?php echo $rt['shopname']; ?></a></td>
			
				<td>已揭晓</td>

				
				<td><?php echo $rt['gonumber']; ?></td>
		
				<td class="c_person_color"><a href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $rt['shopid']; ?>_<?php echo $rt['shopqishu']; ?>">全部号码</a></td>

				
				<td><?php echo get_user_name($jiexiao['q_user']); ?></td>
			
				</tr>
		
			<?php  else: ?>
	
				<td><a title="" target="_blank" class="pic" href="<?php echo WEB_PATH; ?>/goods/<?php echo $rt['shopid']; ?>"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo yunjl($rt['shopid']); ?>"></a></td>
				<td><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $rt['shopid']; ?>">第(<?php echo $rt['shopqishu']; ?>)期 <?php echo $rt['shopname']; ?></a></td>
				
				<td>进行中...</td>
				

				
				<td><?php echo $rt['gonumber']; ?></td>
				

			
				<td class="c_person_color"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $rt['shopid']; ?>">全部号码</a></td>
		

		
				<td>商品进行中...</td>
	
				
				

				</tr>
			 
		<?php endif; ?>
			
				
		<?php  endforeach; $ln++; unset($ln); ?>	



				</tbody>
				</table>
		    	<!-- <?php if($shop['q_uid'] != $member['uid']): ?>
		    					<?php if($shop['q_uid'] != null): ?>
		    							<div id="kkpager" style="margin: 64px auto;" class=""><img src="../../../../../IMAGES/no_record.png" onclick="window.location.href='/goods/allCat.do'" onmouseover="this.style.cursor='pointer'"><?php echo $member['uid']; ?></div>
		    					<?php endif; ?>
		    					<?php endif; ?> -->
			</div>

		
		</div>
	</div>
<!--center_center_end-->
<div class="right">				
</div>
<!--center_rjght_end-->

</div>
<?php include templates("index","footer");?>