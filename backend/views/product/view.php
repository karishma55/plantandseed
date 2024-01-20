<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\State */

$this->title = $model->product_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="page-wrapper">
 <div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"><i class="fa fa-search"></i> <?php echo Yii::t('app', 'View Product') ?></h3></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4 left-padding">
	<?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-block btn-warning']) ?>
	</div>
	<div class="col-xs-4 left-padding">
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->product_id], ['class' => 'btn btn-block btn-info']) ?>
	</div>
	<div class="col-xs-4 left-padding">
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->product_id], [
            'class' => 'btn btn-block btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?> 
	</div>
   </div>
</div>

<div class="col-xs-12">
 <div class="box box-primary view-item">
   <div class="state-view">
    <?= DetailView::widget([
        'model' => $model,
	'options'=>['class'=>'table  detail-view'],
        'attributes' => [
        	[
        		'attribute' => 'product_category_id',
        		'value' => $model->productCategory->category_name,
        	],        	
            'product_name',
        	[
        		'attribute'=>'product_image',
        		'format'=>'raw',
        		'value'=>($model->product_image == null) ? " - ": Html::a('<span class = "glyphicon glyphicon-download"></span>', ['docs-download', 'product_id' => $model->product_id,'field' => 'product_image','path' => 'product_image',], ['class' => 'btn-sm btn btn-primary', 'title' => '', 'data' => ['method' => 'post']]),
        	],
        	'product_short_description',
            'product_description',
        	'product_meta_tag',
        	'product_meta_title',
        	'product_meta_description',
            [
		'attribute' => Yii::t('app', 'created_at'),
		'value' => Yii::$app->formatter->asDateTime($model->created_at),
	    ],
            [
		'label' => Yii::t('app', 'Created By'),
		'attribute' => 'createdBy.username',
	    ],
	    [
		'attribute' => 'updated_at',
		'value' => ($model->updated_at == null) ? " - ": Yii::$app->formatter->asDateTime($model->updated_at),
	    ],
	    [
		'label' => Yii::t('app', 'Updated By'),
            	'attribute' => 'updatedBy.username',
	    ],
        ],
    ]) ?>
     </div>
   </div>
</div>
</div>
