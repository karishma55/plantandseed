<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;


$this->title = Yii::t('app', 'Product List');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Configuration'), 'url' => ['default/index']];

?>
  <?php 
  /*if($model->isNewRecord) 
	echo $this->render('create', ['model' => $model]); 	
   else
	echo $this->render('update', ['model' => $model]); 	*/
?>

 <div id="page-wrapper">
 <div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"><i class="fa fa-th-list"></i> <?php echo Yii::t('app', 'Product') ?></h3></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<?php if (Yii::$app->session->hasFlash('product-success')): ?>
	<div class="alert alert-success">
		<i class="icon fa fa-check"></i>
		<?=Yii::$app->session->getFlash('product-success') ?>
	</div>
	<?php endif; ?>
	<?php if (Yii::$app->session->hasFlash('product-error')): ?>
	<div class="alert alert-danger">
		<i class="fa fa-exclamation-triangle"></i>
		<?=Yii::$app->session->getFlash('product-error') ?>
	</div>
	<?php endif; ?>
	<div class="col-xs-4 edusecArLangHide"></div>
	<div class="col-xs-4 edusecArLangHide"></div>
	<div class="col-xs-4 left-padding">
	 <?= Html::a(Yii::t('app', 'ADD'), ['create'], ['class' => 'btn btn-block btn-success']) ?>
	</div>
	
  </div>
</div>
 <div class="col-xs-12" style="padding-top: 10px;">
    <div class="box">
        <div class="box-header">

        </div><!-- /.box-header -->
     <div class="box-body table-responsive">
       <div class="state-index">
    	  <?= GridView::widget([
        	'dataProvider' => $dataProvider,	
	        'filterModel' => $searchModel,
			'summary'=>'',
        	'columns' => [
        	    ['class' => 'yii\grid\SerialColumn'],
	
        	    'product_name',
        		[
        			'label' => Yii::t('app', 'Campaign Category'),
        			'attribute' => 'product_category_id',
        			'value' => 'productCategory.category_name',
        			'filter' => ArrayHelper::map(app\models\Category::find()->where(['is_status' => 0])->all(), 'category_id', 'category_name')
        		], 
        			[
        					
        					'attribute'=>'product_meta_title',
        					'value' =>function ($searchModel) {
        					return (strlen($searchModel->product_meta_title)>30?substr($searchModel->product_meta_title,0,30).'..' : $searchModel->product_meta_title);
        					
    	  },
    	  
    	  ],
        		
        			[        				
        			
        			'attribute'=>'product_short_description',
        			'value' =>function ($searchModel) {
        			return (strlen($searchModel->product_short_description)>30?substr($searchModel->product_short_description,0,30).'..' : $searchModel->product_short_description);
        			
        			},
        			
        			],
        		
	            [
		     'class' => 'app\components\CustomActionColumn',
	     	    ],
        	],
    	]); ?>
       </div>
     </div>
   </div>
</div>
 </div>

