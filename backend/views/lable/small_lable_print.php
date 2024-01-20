
<table style="height: 100%; width: 100%;">
<?php 
 $r= floor(count($model)/2);
$b=count($model)-2*$r;
$row =$r;
if($b){
	$row=$r+1;
}

$col = 2; // Dynamic number for columns
$x=0;
for($i=0;$i<$row;$i++){?>
	<tr>
	<?php for($j=0;$j<$col;$j++){
		if($model[$x]['batch_No']!=''){
		$manufacture_date = Yii::$app->formatter->asDate ( $model[$x]['created_date'], 'php:d.m.y' );
		$exp_date = Yii::$app->formatter->asDate ( $model[$x]['expDate'], 'php:d.m.y' );
		?>
		<td style="text-align:center; padding:8px">
			<table>
				<tr>
					<td style="text-align:left;"><b>New Delhi</b> </td>
					<td style="text-align:left;"><b>To</b> </td>
					<td style="text-align:left;"><b><?php echo $model[$x]['address']?></b> </td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td style="text-align:left;"><b>Drum No:</b></td>
					<td style="text-align:left;"><?php echo $model[$x]['drum_No']?></td>					
					<td style="text-align:left;"><b>Product:</b></td>
					<td style="text-align:left;" ><?php echo ucwords($model[$x]['product_Name'])?></td>
				</tr>
				<tr>
					<td style="text-align:left;"><b>Net Wt:</b></td>
					<td style="text-align:left;"><?php echo $model[$x]['net_weight']?>kgs</td>
					<td style="text-align:left;"><b>Batch No:</b></td>
					<td style="text-align:left;"><?php echo $model[$x]['batch_No']?></td>
				</tr>
				<tr>
					<td style="text-align:left;"><b>Tare Wt:</b></td>
					<td style="text-align:left;"><?php echo $model[$x]['tear_weight']?>kgs</td>
					<td style="text-align:left;"><b>MFG Date:</b></td>
					<td style="text-align:left;"><?php echo $manufacture_date?></td>
				</tr>
				<tr>
					<td style="text-align:left;"><b>Gross Wt:</b></td>
					<td style="text-align:left;"><?php echo $model[$x]['total_weight']?>kgs</td>
					<td style="text-align:left;"><b>EXP Date:</b></td>
					<td style="text-align:left;"><?php echo $exp_date?></td>
				</tr>
				<tr>
					<td style="text-align:center" colspan="5"><?php echo '<img  src="'.Yii::getAlias('@web').'/data/comp/sample-lable.png"/>'; ?></td>
					
				</tr>
				<tr>
					<td style="text-align:center" colspan="5">Plant and Seed Oils Pvt. Ltd.
252, 1st/Kh no. 40, Kua Chowk,
Village Dallupura,<br>Near Dharamshila Hospital
Delhi - 110096, India<br></td>
					
				</tr>
				
			</table>
		</td>
		<?php } $x++; }?>
		
	</tr>
	<?php }?>
</table>
