<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php  if (Yii::$app->user->isGuest) {?>
 <div id="wrapper">
<div class="container">
        
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
    </div>
<?php }else{?>
 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?= Html::a('Admin', ['index'], ['class' => 'navbar-brand']) ?>
               
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
               
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <?php 
                       echo '<li>'
                        		. Html::beginForm(['/site/logout'], 'post')
                        		. Html::submitButton(
                        				'Logout (' . Yii::$app->user->identity->username . ')',
                        				['class' => 'btn btn-link logout']
                        				)
                        				. Html::endForm()
                        				. '</li>';
                        ?>
                        <!-- <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li> -->
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
			 <?= $this->render('left.php') ?>
            
            <!-- /.navbar-static-side -->
        </nav>
		<?= $content ?>

    </div>
    <!-- /#wrapper -->
<?php }?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
