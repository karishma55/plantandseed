<?php

 $date=Yii::$app->formatter->asDate('now', 'php:ymd'); 
?>

<table style="height: 100%; width: 100%; border: 1px solid black;">
<?php 
$r= floor(count($model)/3);
$b=count($model)-3*$r;
$row =$r;
if($b){
	 $row=$r+1;
}

$col = 3; // Dynamic number for columns
$x=0;
for($i=0;$i<$row;$i++){
	echo "<tr>";
	for($j=0;$j<$col;$j++){		
		if($model[$x]['batch_No']!=''){
		echo '<td>
<table style="width: 100% " >
<tr><td style="text-align:center;font-size: 12px;">'.ucwords($model[$x]['product_Name']).'</td></tr>
<tr><td style="text-align:center">'.$model[$x]['batch_No'].'</td></tr>
<tr><td style="text-align:center"> <img  src="'.Yii::getAlias('@web').'/data/comp/sample-lable.png"/></td></tr>
<tr><td style="text-align:center">New Delhi, India</td></tr>
</table>
</td>';
		}
		 $x++;
	}
	echo "</tr>";
}




/*for($i=0;$i<count($model);$i++){
	echo '<tr>';
	for($j=1;$j<=3;$j++){
		
		echo '<td>
<table style="width: 100% " >
<tr><td style="text-align:center;font-size: 12px;">'.$model[$i]['product_Name'].'</td></tr>
<tr><td style="text-align:center">'.$model[$i]['batch_No'].'</td></tr>
<tr><td style="text-align:center"> <img  src="'.Yii::getAlias('@web').'/data/comp/sample-lable.png"/></td></tr>
<tr><td style="text-align:center">New Delhi, India</td></tr>
</table>
</td>';
		
	}
	
	echo '</tr>';
}
$x=0;
for($i=1;$i<=10;$i++){
	
	echo '<tr>';
	for($j=1;$j<=3;$j++){
		$x++;
		$batchNo='PSO-'.$date.$x;
	echo '<td>
<table style="width: 100% " >
<tr><td style="text-align:center;font-size: 12px;">ProductName</td></tr>
<tr><td style="text-align:center">'.$batchNo.'</td></tr>
<tr><td style="text-align:center"> <img  src="'.Yii::getAlias('@web').'/data/comp/sample-lable.png"/></td></tr>
<tr><td style="text-align:center">New Delhi, India</td></tr>
</table>
</td>';
	
	}
	
	echo '</tr>';
}*/
?>

</table>