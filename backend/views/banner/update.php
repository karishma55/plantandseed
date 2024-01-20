<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\State */
$this->title = Yii::t('app', 'Update Banner');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Banner'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->banner_heading, 'url' => ['view', 'id' => $model->banner_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-xs-12">
			<div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"><i class="fa fa-edit"></i> <?php echo Yii::t('app', 'Update Banner') ?> </h3>
  		</div>
  		<div class="col-xs-4"></div>
    <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4 edusecArLangHide"></div>
	<div class="col-xs-4 edusecArLangHide"></div>
	<div class="col-xs-4 left-padding">
	<?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-block btn-warning']) ?>
	</div>
    </div>
		</div>

	</div>
    <?=$this->render ( '_form', [ 'model' => $model ] )?>
</div>

