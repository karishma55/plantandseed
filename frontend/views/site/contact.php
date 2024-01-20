<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    

    <!--  <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>
	-->
    <div class="row">
        <!--  <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>-->
		<div class="col-lg-5">
		<h4>Address:</h4>
		
		<p>Plant and Seed Oils Pvt. Ltd.<br>
		252, 1st/Kh no. 40, Kua Chowk,<br>
		Village Dallupura,Near Dharamshila Hospital<br>
		Delhi - 110096, India</p>
		<h4>Contact:</h4>
		<p>+91 9599221142<br>+91 9599221141</p>		
		<h4>Email:</h4>
		<p>export@plantandseedoil.com<br>marketing@plantandseedoils.com</p>
		<h4>Web:</h4>
		<p><a href="http://plantandseedoils.com">http://plantandseedoils.com</a></p>
		</div>
		
		<div class="col-lg-5">	
		<h4>Social Links:</h4>	
		<p><img style="width:20px;height:20px;" src="<?php echo Yii::getAlias('@web')."/data/social/skype.png";?>" alt="">plantandseedoils<br>
		<img style="width:20px;height:20px;" src="<?php echo Yii::getAlias('@web')."/data/social/facebook.png";?>" alt=""><a href="https://www.facebook.com/plantandseedoils">https://www.facebook.com/plantandseedoils</a><br>
		<img style="width:20px;height:20px;" src="<?php echo Yii::getAlias('@web')."/data/social/twitter.png";?>" alt=""><a href="https://www.twitter.com/plantandseedoils">https://www.twitter.com/plantandseedoils</a><br>
		<img style="width:20px;height:20px;" src="<?php echo Yii::getAlias('@web')."/data/social/instagram.png";?>" alt=""><a href="https://www.instagram.com/plantandseedoils">https://www.instagram.com/plantandseedoils</a><br>
		<img style="width:20px;height:20px;" src="<?php echo Yii::getAlias('@web')."/data/social/linkedin.png";?>" alt=""><a href="https://www.linkedin.com/company/plant-and-seed-oils-pvt-ltd">https://www.linkedin.com/company/plant-and-seed-oils-pvt-ltd</a></p>
		</div>
    </div>

</div>
