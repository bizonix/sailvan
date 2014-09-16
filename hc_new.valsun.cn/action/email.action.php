<?php
/**
 * 类名：EmailAct
 * 功能：发送邮件
 * 版本：V1.0
 * 作者：邹军荣
 * 时间：2014-06-25
 * 
 * max errCode: 1101
 */
class EmailAct extends Auth {
    static $errCode	= '0';
    static $errMsg	= '';
       
    public function act_sentEmail($contentArr, $spu, $sku, $deal_order , $availableStock, $outOfStockDays, $availableInventoryDays, $originalSku, $toEmail) {
		/*
		//关于分销商超卖SPU及SKU只针对推送给分销商的类别（发邮件）	引处暂时注释	 
		$spuCategory = OpenApi::getSpuCategory($spu);		
		global $distributorsCategory;
		foreach($distributorsCategory as $k=>$v)
		{   //echo '<pre>'.$spuCategory;print_r($v);
		    //判断该spu是否属于对应分销商类别的
			if($v['categorys'] == 'ALL' || (is_array($v['categorys']) && in_array($spuCategory, $v['categorys'])))
			{
				foreach($v['email'] as $email)
				{
					$toEmail[] = $email; 
				}
			}
		}
		*/
		//$toEmail[] = 'chenwenping@sailvan.com';	//edit by zxh 2014/5/8 林正祥通知暂时去掉
		//$toEmail[] = 'baofengming@sailvan.com';
		$toEmail = array(
			'0'		=> array('email' => 'xiaojinhua@sailvan.com', 'userName' => '肖金华'),
			'1'		=> array('email' => 'zhongyantai@sailvan.com', 'userName' => '钟衍台'),
			'2'		=> array('email' => 'zhoucong@sailvan.com', 'userName' => '周聪'),
			'3'		=> array('email' => 'chenxiaoxia@sailvan.com', 'userName' => '陈小霞'),
			'4'		=> array('email' => 'linzhengxiang@sailvan.com', 'userName' => '林正祥'),
			'5'		=> array('email' => 'xihuichao@sailvan.com', 'userName' => '席惠超'),
			'6'		=> array('email' => 'chenyanyun@sailvan.com', 'userName' => '陈燕去'),
			'7'		=> array('email' => 'chenyuekui@sailvan.com', 'userName' => '陈月葵'),
			'8'		=> array('email' => 'zhengfengjiao@sailvan.com', 'userName' => '郑凤娇'),
			'9'		=> array('email' => 'panxudong@sailvan.com', 'userName' => '潘旭东'),
			'10'	=> array('email' => 'limeiqin@sailvan.com', 'userName' => '李美琴'),
			'11'	=> array('email' => 'zengxianghong@sailvan.com', 'userName' => '曾祥红'),
		);
		$content	= C("EMAILCONTENTS");
		$sellerTd	= $sellerFields = $values = '';	
		$location	= isset($_REQUEST['location']) ? $_REQUEST['location'] : '';	//仓位
		foreach($spu as $k => $v) {
			//通过spu获取对应销售和采购的统一用户编号
			$pcGetSpuSalerIdsBySpu = OpenApi::pcGetSpuSalerIdsBySpu($v['conbineSpu']);	//$spu
			if(!empty($pcGetSpuSalerIdsBySpu['purchaseId']))	//暂时去掉 edit by zxh 2014-05-08
			{
				$purchaseEmail	= OpenApi::getUserEmail($pcGetSpuSalerIdsBySpu['purchaseId']);
				$toEmail[]		= array('email' => $purchaseEmail['email'], 'userName' => $purchaseEmail['userName']);
			} else {
				Log::write($v['conbineSpu'].": 没有采购负责人", 'NOTIC');
			}
			//同一个平台，同一个sku对应一个采购,但是对应多个销售
			if(!empty($pcGetSpuSalerIdsBySpu['salerArr'])) {
				$i = 1;
				foreach($pcGetSpuSalerIdsBySpu['salerArr'] as $platformId => $salerId) {
					//通采购的统一用户编号获取其邮箱
					$salerEmail		= OpenApi::getUserEmail($salerId); 
					$toEmail[]		= array('email' => $salerEmail['email'], 'userName' => $salerEmail['userName']);
					$sellerFields	.= "<td>销售".$i."<input type='hidden' value='".$salerId."' /></td>";
					$sellerTd		.= "<td>".$salerEmail['userName']."</td>";
					$i++;
				}
			} else {
				Log::write($v['conbineSpu'].": 没有销售负责人", 'NOTIC');
			}
			$content = str_replace('{sellerFields}', $sellerFields, $content);
			if($deal_order == 1) {	//下架产品 
				$content = str_replace('{availableInventoryDaysFields}', '', $content);
				$values .= "<tr>
								<td>下架</td>
								<td>".$v['conbineSpu']."</td>
								<td>".$v['conbineSku']."</td>
								<td>".$originalSku."</td>
								<td>".$purchaseEmail['userName']."</td>
								<td>".$availableStock."</td>
								<td>".$outOfStockDays."</td>
								".$sellerTd."
								<td>".$location."</td>
							</tr>";
			} else if($deal_order == 2) {	//上架产品
				$content = str_replace('{availableInventoryDaysFields}', '<td>可用库存天数</td>', $content);
				$values .= "<tr>
								<td>上架</td>
								<td>".$v['conbineSpu']."</td>
								<td>".$v['conbineSku']."</td>
								<td>".$originalSku."</td>
								<td>".$purchaseEmail['userName']."</td>
								<td>".$availableStock."</td>
								<td>".$availableInventoryDays."</td>
								<td>".$outOfStockDays."</td>
								".$sellerTd."
								<td>".$location."</td>
							</tr>";
			}
		}
		$content = str_replace('{values}', $values, $content);

		//+++++++++++++++end 同一个平台，同一个sku对应一个采购,但是对应多个销售, 有时候可能会没有销售人员的数据
		if(empty($toEmail)) {
			Log::write($originalSku.": 没有找到销售及采购负责人", 'NOTIC');
			self::$errCode	= '500';
			self::$errMsg	= '未找到此SKU的销售人员和采购人员记录';
			return false;
		}

		if($deal_order == 1) {	//下架产品
			/*switch($platform)	//勿删 edited by zxh 2014/5/12
			{
				case 'ebay平台':
					$content = '&nbsp;&nbsp;&nbsp;&nbsp;很遗憾的告诉你，由于sku为 '.$sku.' 库存不足，请把 '.$platform.' 上的';
				break;
				case 'aliexpress':  //速卖通平台
					$content = '&nbsp;&nbsp;&nbsp;&nbsp;很遗憾的告诉你，由于sku为 '.$sku.' 库存不足，请把 '.$platform.' 上的';
				break;
				default:
					echo '平台错误';
				break;
			}*/
			$title		= '华成平台 超卖系统 重要通知：子料号 '.$originalSku.' 缺货天数为 '.$outOfStockDays.'，请下架该商品 ';
			/*$content	= '&nbsp;&nbsp;&nbsp;&nbsp;很遗憾的告诉你，由于SPU为 '.$spu.' 中子料号sku为 '.$sku.'	//暂时保留，勿删 edited by zxh 2014/5/12
						可用库存只有 '.$availableStock.' ，缺货天数为 '.$outOfStockDays.' ，请下架该商品。';	//"，可用库存天数 '.$availableInventoryDays.'"		//东哥说需要去掉 edited by zxh 2014/5/6 15:49*/
		} else if($deal_order == 2) {	//上架产品
			/*switch($platform)	//勿删 edited by zxh 2014/5/12
			{
				//case 'ebay平台':
					$content = '&nbsp;&nbsp;&nbsp;&nbsp;很高兴的告诉你，由于sku为 '.$sku.' 已经到货，请为 '.$platform.' 上的';
				break;
				case 'aliexpress':  //速卖通平台
					$content = '&nbsp;&nbsp;&nbsp;&nbsp;很高兴的告诉你，由于sku为 '.$sku.' 已经到货，请为 '.$platform.' 上的';
				break;
				default:
					echo '平台错误';
				break;				
			}*/
			$title = '华成平台 超卖系统 重要通知：子料号 '.$originalSku.' 缺货天数为 '.$outOfStockDays.' ，可上架该商品';
			/*$content = '&nbsp;&nbsp;&nbsp;&nbsp;很高兴的告诉你，由于SPU为 '.$spu.' 中子料号sku为 '.$sku.'		//暂时保留，勿删 edited by zxh 2014/5/12
						可用库存有 '.$availableStock.' ，缺货天数为 '.$outOfStockDays.' ，可用库存天数 
						'.$availableInventoryDays.'，可上架该商品。';*/
		} else {
			return false;
		}
    	$emailStyle = file_get_contents(WEB_PATH."html/template/emailStyle.html");		
    	$emailStyle = preg_replace('/{time}/i',date("Y-m-d H:i:s",time()),$emailStyle);
		$emailStyle = preg_replace('/{{content}}/i',$content,$emailStyle);

		$sendmail = sendEmail($toEmail, $title, $emailStyle);
		if(strlen($sendmail) > 1) {		//如果邮件发送失败，则将错误信息返回到$sendmail变量内，
			Log::write(json_encode($_REQUEST),'DEBUG');	//邮件发送失败记入日志
			self::$errCode	= '1101';
			self::$errMsg	= $sendmail;
			return false;
		}
		return true;
    }
}
?>