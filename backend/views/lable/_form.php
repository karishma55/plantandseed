<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Inquiry</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
<?php
if ($this->context->action->id == 'update')
	$action = [ 
			'update',
			'id' => $_REQUEST ['id'] 
	];
else
	$action = [ 
			'create' 
	];
?>
<script>
$(document).ready(function(){
     $('input[type=file]').bootstrapFileInput();
});
</script>
 <?php
	
$form = ActiveForm::begin ( [ 
			'id' => 'category-form',
		    'enableAjaxValidation' => true,
			'fieldConfig' => [ 
					'template' => "{label}{input}{error}" 
			] 
	] );
	?>

   <div class="col-xs-12 col-lg-12 no-padding">

							<div class="col-sm-6">
    <?= $form->field($model, 'companyName', ['inputOptions'=>['placeholder'=>$model->getAttributeLabel('companyName')] ])->textInput(['maxlength' => 35])?>
    </div>
							<div class="col-sm-6">
							<?= $form->field($model, 'address', ['inputOptions'=>['placeholder'=>'Destination'] ])->textInput(['maxlength' => 35])?>
    
    </div>
<!--<div class="col-sm-6">
								<b>Products For 0.050 Kg</b>
    <?= Html::textArea('products_0_05','', $options=['id'=>'products_0_05','class'=>'form-control','placeholder'=>'Products For 0.050 Kg',])?>    
    </div>-->
    <div class="col-sm-6">
								<b>Products For 0.100 Kg</b>
    <?= Html::textArea('products_0_10','', $options=['id'=>'products_0_10','class'=>'form-control','placeholder'=>'Products For 0.100 Kg',])?>    
    </div>
<!--<div class="col-sm-6">
								<b>Products For 0.500 Kg</b>
    <?= Html::textArea('products_0_50','', $options=['id'=>'products_0_50','class'=>'form-control','placeholder'=>'Products For 0.500 Kg',])?>    
    </div>-->
							<div class="col-sm-6">
								<b>Products For 1 Kg</b>
    <?= Html::textArea('products_1','', $options=['id'=>'products_1','class'=>'form-control','placeholder'=>'Products For 1 Kg',])?>    
    </div>
   
     <div class="col-sm-6">
								<b>Products For 5 Kg</b>
    <?= Html::textArea('products_5','', $options=['id'=>'products_5','class'=>'form-control','placeholder'=>'Products For 5 Kg',])?>    
    </div>    
     <div class="col-sm-6">
								<b>Products For 10 Kg</b>
    <?= Html::textArea('products_10','', $options=['id'=>'products_10','class'=>'form-control','placeholder'=>'Products For 10 Kg',])?>    
    </div>
    <div class="col-sm-6">
								<b>Products For 20 Kg</b>
    <?= Html::textArea('products_20','', $options=['id'=>'products_20','class'=>'form-control','placeholder'=>'Products For 20 Kg',])?>    
    </div>
    <div class="col-sm-6">
								<b>Products For 25 Kg</b>
    <?= Html::textArea('products_25','', $options=['id'=>'products_25','class'=>'form-control','placeholder'=>'Products For 25 Kg',])?>    
    </div>
     <div class="col-sm-6">
								<b>Products For 25 Kg Jumbo</b>
    <?= Html::textArea('products_25_1','', $options=['id'=>'products_25_1','class'=>'form-control','placeholder'=>'Products For 25 Kg Jumbo',])?>    
    </div>
    
    <div class="col-sm-6">
								<b>Products For 200 Kg</b>
    <?= Html::textArea('products_200','', $options=['id'=>'products_200','class'=>'form-control','placeholder'=>'Products For 200 Kg',])?>    
    </div>

						</div>
						<div
							class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding edusecArLangCss">
							<div class="col-xs-6">
							<?php
							
if (! $model->isNewRecord && $model->status != 'Dispatched') {
								echo Html::submitButton ( $model->isNewRecord ? Yii::t ( 'app', 'Create' ) : Yii::t ( 'app', 'Update' ), [ 
										'class' => $model->isNewRecord ? 'btn btn-block btn-success' : 'btn btn-block btn-info' 
								] );
							} else if ($model->isNewRecord) {
echo Html::Button(Yii::t('app', 'Create'), ['onclick' =>'addProduct()', 'class' => 'btn btn-block btn-success']);
								
							}
							?>
							</div>
							<!--  <div class="col-xs-6">
							<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default btn-block'])?>
							</div>-->
						</div>
						
						    <?php ActiveForm::end(); ?>
    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
function addProduct(){
	var error=0;
	//var products_0_05=$('#products_0_05').val();
	var products_0_10=$('#products_0_10').val();
	//var products_0_50=$('#products_0_50').val();
	var products_1=$('#products_1').val();
	var products_5=$('#products_5').val();
	var products_10=$('#products_10').val();
	var products_20=$('#products_20').val();
	var products_25=$('#products_25').val();
	var products_25_1=$('#products_25_1').val();
	var products_200=$('#products_200').val();
	if($('#sampleinvoice-companyname').val()==''){
		error=1;
		alert('Please Enter Company Name');
		return false;
	}
	if($('#sampleinvoice-address').val()==''){
		error=1;
		alert('Please Enter Destination');
		return false;
	}
	/*if(products_0_05!=''){		
		var products_0_05_array = products_0_05.split(",");
		for(var i = 0; i < products_0_05_array.length; i++) {
			var products_array = products_0_05_array[i].split("-");
			   if(products_array.length!=2){
				   error=1;
					alert('Please Validate Products For 0.050 Kg');
					return false;
			   }
			}
	}*/
	if(products_0_10!=''){		
		var products_0_10_array = products_0_10.split(",");
		for(var i = 0; i < products_0_10_array.length; i++) {
			var products_array = products_0_10_array[i].split("-");
			   if(products_array.length!=2){
				   error=1;
					alert('Please Validate Products For 0.100 Kg');
					return false;
			   }
			}
	}
	/*if(products_0_50!=''){		
		var products_0_50_array = products_0_50.split(",");
		for(var i = 0; i < products_0_50_array.length; i++) {
			var products_array = products_0_50_array[i].split("-");
			   if(products_array.length!=2){
				   error=1;
					alert('Please Validate Products For 0.500 Kg');
					return false;
			   }
			}
	}*/
	if(products_1!=''){		
		var products_1_array = products_1.split(",");
		for(var i = 0; i < products_1_array.length; i++) {
			var products_array = products_1_array[i].split("-");
			   if(products_array.length!=2){
				   error=1;
					alert('Please Validate Products For 1 Kg');
					return false;
			   }
			}
	}
	if(products_5!=''){		
		var products_5_array = products_5.split(",");
		for(var i = 0; i < products_5_array.length; i++) {
			var products_array = products_5_array[i].split("-");
			   if(products_array.length!=2){
				   error=1;
					alert('Please Validate Products For 5 Kg');
					return false;
			   }
			}
	}
	if(products_10!=''){		
		var products_10_array = products_10.split(",");
		for(var i = 0; i < products_10_array.length; i++) {
			var products_array = products_10_array[i].split("-");
			   if(products_array.length!=2){
				   error=1;
					alert('Please Validate Products For 10 Kg');
					return false;
			   }
			}
	}
	if(products_20!=''){		
		var products_20_array = products_20.split(",");
		for(var i = 0; i < products_20_array.length; i++) {
			var products_array = products_20_array[i].split("-");
			   if(products_array.length!=2){
				   error=1;
					alert('Please Validate Products For 20 Kg');
					return false;
			   }
			}
	}
	if(products_25!=''){		
		var products_25_array = products_25.split(",");
		for(var i = 0; i < products_25_array.length; i++) {
			var products_array = products_25_array[i].split("-");
			   if(products_array.length!=2){
				   error=1;
					alert('Please Validate Products For 25 Kg');
					return false;
			   }
			}
	}
	if(products_25_1!=''){		
		var products_25_1_array = products_25_1.split(",");
		for(var i = 0; i < products_25_1_array.length; i++) {
			var products_array = products_25_1_array[i].split("-");
			   if(products_array.length!=2){
				   error=1;
					alert('Please Validate Products For 25 Kg Jumbo');
					return false;
			   }
			}
	}
	if(products_200!=''){		
		var products_200_array = products_200.split(",");
		for(var i = 0; i < products_200_array.length; i++) {
			var products_array = products_200_array[i].split("-");
			   if(products_array.length!=2){
				   error=1;
					alert('Please Validate Products For 200 Kg');
					return false;
			   }
			}
	}
	if(error==1){
		return false;
	}
	else if(error==0){
		$('#category-form').submit();
	}
	
}

</script>