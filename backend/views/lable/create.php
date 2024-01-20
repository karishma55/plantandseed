<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\State */
$this->title = Yii::t('app', 'Add Inquiry');
$this->params ['breadcrumbs'] [] = [
		'label' => Yii::t ( 'app', 'Inquiry List' ),
		'url' => [
				'index'
		]
];
$this->params['breadcrumbs'][] = $this->title;

?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-xs-12">
			<div class="col-lg-4 col-sm-4 col-xs-12 no-padding edusecArLangCss">
				<h3 class="box-title">
					<i class="fa fa-plus"></i> <?php echo Yii::t('app', 'Add Lable') ?></h3>
			</div>
		</div>

	</div>
    <?=$this->render ( '_form', [ 'model' => $model ] )?>
</div>