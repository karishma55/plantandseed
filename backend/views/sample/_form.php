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
 <?php $form = ActiveForm::begin([
			'id' => 'category-form',    		
			'fieldConfig' => [
			    'template' => "{label}{input}{error}",
			],
    ]); ?>

   <div class="col-xs-12 col-lg-12 no-padding">
  
	<div class="col-sm-6">
    <?= $form->field($model, 'companyName', ['inputOptions'=>['placeholder'=>$model->getAttributeLabel('companyName')] ])->textInput(['maxlength' => 35])?>
    </div>
    <div class="col-sm-6">
    <?= $form->field($model, 'address')->textArea([ 'placeholder' => $model->getAttributeLabel('address')]) ?> 
    </div>
    <div class="col-sm-6">
    <?= $form->field($model, 'phoneNo', ['inputOptions'=>['placeholder'=>$model->getAttributeLabel('phoneNo')] ])->textInput(['maxlength' => 35])?>
    </div>
     
   <div class="col-sm-6">
    <?= $form->field($model, 'name', ['inputOptions'=>['placeholder'=>$model->getAttributeLabel('name')] ])->textInput(['maxlength' => 35])?>
    </div>
    
	
    <div class="col-sm-6">
    <?= $form->field($model, 'inquiry')->textArea([ 'placeholder' => $model->getAttributeLabel('inquiry')]) ?> 
    
    </div>
    
						</div>
						<div
							class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding edusecArLangCss">
							<div class="col-xs-6">
							<?php if(!$model->isNewRecord && $model->status!='Dispatched'){								
								echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord  ? 'btn btn-block btn-success' : 'btn btn-block btn-info']);
							} else if($model->isNewRecord) {								
								echo  Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord  ? 'btn btn-block btn-success' : 'btn btn-block btn-info']);
							}?>
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