

<table style="height: 100%; width: 100%; border: 1px solid black;">
<?php for($i=0;$i<count($model);$i++){
	$manufacture_date = Yii::$app->formatter->asDate ( $model[$i]['created_date'], 'php:d.m.y' );
	$exp_date = Yii::$app->formatter->asDate ( $model[$i]['expDate'], 'php:d.m.y' );
	?>
	<tr>
		<td style="text-align:center;padding: 15px; ">
			<table>
				<tr style="padding:15px">
					<td style="text-align:left; font-size: 30px;"><b>New Delhi</b> </td>
					<td style="text-align:left; font-size: 30px;"><b>To</b> </td>
					<td style="text-align:left; font-size: 30px;"><b><?php echo $model[$i]['address']?></b> </td>
					<td></td>					
				</tr>
				<tr>
					<td style="text-align:left; font-size: 18px;"><b>Drum No:</b></td>
					<td style="text-align:left; font-size: 18px;"><?php echo $model[$i]['drum_No']?></td>					
					<td style="text-align:left; font-size: 18px;"><b>Product:</b></td>
					<td style="text-align:left; font-size: 18px;" ><?php echo ucwords($model[$i]['product_Name'])?></td>
				</tr>
				<tr>
					<td style="text-align:left; font-size: 18px;"><b>Net Wt:</b></td>
					<td style="text-align:left; font-size: 18px;" col><?php echo $model[$i]['net_weight']?>kgs</td>					
					<td style="text-align:left; font-size: 18px;"><b>Batch No:</b></td>
					<td style="text-align:left; font-size: 18px;"><?php echo $model[$i]['batch_No']?></td>
				</tr>
				<tr>
					<td style="text-align:left; font-size: 18px;"><b>Tare Wt:</b></td>
					<td style="text-align:left; font-size: 18px;"><?php echo $model[$i]['tear_weight']?>kgs</td>					
					<td style="text-align:left; font-size: 18px;"><b>MFG Date:</b></td>
					<td style="text-align:left; font-size: 18px;"><?php echo $manufacture_date?></td>
				</tr>
				<tr>
					<td style="text-align:left; font-size: 18px;"><b>Gross Wt:</b></td>
					<td style="text-align:left; font-size: 18px;"><?php echo $model[$i]['total_weight']?>kgs</td>					
					<td style="text-align:left; font-size: 18px;"><b>EXP Date:</b></td>
					<td style="text-align:left; font-size: 18px;"><?php echo $exp_date?></td>
				</tr>
				<tr>
					<td style="text-align:center" colspan="4"><?php echo '<img src="'.Yii::getAlias('@web').'/data/comp/big-lable.png"/>'; ?></td>
					
				</tr>
				<tr>
					<td style="text-align:center" colspan="4">Plant and Seed Oils Pvt. Ltd.
252, 1st/Kh no. 40, Kua Chowk,
Village Dallupura,<br>Near Dharamshila Hospital
Delhi - 110096, India<br></td>
					
				</tr>
				
			</table>
		</td>
	</tr>
	<?php }?>
</table>