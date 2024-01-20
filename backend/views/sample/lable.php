<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
$this->title = Yii::t ( 'app', 'Sample Lable' );
$this->params ['breadcrumbs'] [] = [ 
		'label' => Yii::t ( 'app', 'Configuration' ),
		'url' => [ 
				'default/index' 
		] 
];

?>
  <?php
		/*
		 * if($model->isNewRecord)
		 * echo $this->render('create', ['model' => $model]);
		 * else
		 * echo $this->render('update', ['model' => $model]);
		 */
		?>
<?php $form = ActiveForm::begin([
			'id' => 'sample-form',
			
			'enableAjaxValidation' => false,
     		'options' => ['enctype' => 'multipart/form-data',],
			'fieldConfig' => [
			    'template' => "{label}{input}{error}",
			],
	]); ?>
<div id="page-wrapper">
	<div class="col-lg-12">
		<div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss">
			<h3 class="box-title">
				<i class="fa fa-th-list"></i> <?php echo Yii::t('app', 'Lable') ?></h3>
		</div>
		<div class="col-lg-4 col-sm-4 col-lg-12 no-padding"
			style="padding-top: 20px !important;">
	<?php if (Yii::$app->session->hasFlash('sample-success')): ?>
	<div class="alert alert-success">
				<i class="icon fa fa-check"></i>
		<?=Yii::$app->session->getFlash('sample-success') ?>
	</div>
	<?php endif; ?>
	<?php if (Yii::$app->session->hasFlash('sample-error')): ?>
	<div class="alert alert-danger">
				<i class="fa fa-exclamation-triangle"></i>
		<?=Yii::$app->session->getFlash('sample-error') ?>
	</div>
	<?php endif; ?>
	<div class="col-xs-4 edusecArLangHide"></div>
			<div class="col-xs-4 edusecArLangHide"></div>
			<div class="col-lg-4 left-padding">
			<?= Html::submitButton( Yii::t('app', 'Print'), ['class' => 'btn btn-success']) ?>
	 
	</div>

		</div>
	</div>
	<div class="row">
	<?php
	
	foreach ( $model as $modelData ) {
		$product = \app\models\Batch::find ()->where ( [ 
				'inquiry_id' => $modelData ['inquiry_id'] 
		] )->all ()?>
		<div class="col-lg-12">
			<div class="panel panel-default">
				<!-- <div class="col-xs-12">
					<div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss">
						<h3 class="box-title">
							<i class="fa fa-th-list"></i> Lable
						</h3>
					</div>
					<div class="col-lg-4 col-sm-4 col-xs-12 no-padding"
						style="padding-top: 20px !important;">
						<div class="col-xs-4 edusecArLangHide"></div>
						<div class="col-xs-4 edusecArLangHide"></div>
						<div class="col-xs-4 left-padding">
							<a class="btn btn-block btn-success"
								href="/plantandseedoils/backend/web/index.php?r=sample%2Fcreate">Print</a>
						</div>

					</div>
				</div> -->
				<div class="panel-heading">
				<?php echo $modelData['companyName'].' (<b>'.$modelData['total'].'</b>) - <b>'.Yii::$app->formatter->asDate($modelData['created_date'], 'php:d M Y').'</b>'; ?>
				<div class="col-xs-1 left-padding" style="float: right;">
				<?= Html::checkbox('inquiry[]', false, ['value' => $modelData['inquiry_id']]) ?>
				
				</div>
				</div>
				<div class="panel-body">
					<div class="row">
					<?php foreach ($product as $productData){?>
						<div class="col-lg-2">
							<label><?php echo ucwords($productData['product_Name']) ?></label><br><?php echo $productData['batch_No'] ?></div>
						
						<?php }?>
					</div>

				</div>
			</div>
		</div>
		<?php }?>		
	</div>
	<?php ActiveForm::end(); ?>
	