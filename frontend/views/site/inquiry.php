<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Inquiry';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>

    <div class="row">
        <div class="col-lg-8">
            <?php $form = ActiveForm::begin(['id' => 'inquiry-form']); ?>

                <?= $form->field($model, 'companyName')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'address')->textarea(['rows' => 3])?>

                <?= $form->field($model, 'phoneNo')->textInput(['type' => 'integer','maxlength'=>10])?>

                <?= $form->field($model, 'name') ?>
                <?= $form->field($model, 'inquiry')->textarea(['rows' => 6])?>
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'sample-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
		
    </div>

</div>
