<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\models\Category;
use yii\bootstrap\ActiveForm;
use frontend\models\SearchForm;
$searchform= new SearchForm();
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
	
	<?php $this->registerJs(
    '$("body").on("contextmenu",function(e){
        return false;
    });'
); ?>
<?php $this->registerJs(
    ' $(document).keydown(function(e){
    e.preventDefault();
  });'
); ?>
	
</head>
<body>
<?php $this->beginBody() ?>


<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Plant and Seed Oils Pvt. Ltd.',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    
    $menuItemsSample = [
    		['label' => 'Inquiry', 'url' => ['/site/inquiry']],
    		
    ];
    echo Nav::widget([
    		'options' => ['class' => 'navbar-nav navbar-left'],
    		'items' => $menuItemsSample,
    ]);
		
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About Us', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    
   /* if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }*/
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
   
    echo '<div class="col-lg-2 navbar-nav navbar-right" style="padding: 10px 10px; height:10px;" >';
    $form = ActiveForm::begin(['id' => 'form-search',]);
    $search=!empty($_REQUEST['SearchForm']['search'])?$_REQUEST['SearchForm']['search']:""; 
    echo $form->field($searchform, 'search')->textInput(['autofocus' => true,'value'=>$search,'style'=>'height:27px;','placeholder'=>'Search...'])->label(false);
    //echo '<div class="form-group">';
   // echo Html::submitButton('Search', ['class' => 'btn btn-primary', 'name' => 'search-button']) ;
   // echo '</div>';	
    ActiveForm::end();
    echo '</div>';	
   
    NavBar::end();
    ?>
   
    <?php
    $categories =  Category::find ()->where ( [ 
				'is_status' => 0,				
		] )->orderBy(['category_id' => SORT_ASC])->all ();
    ?>

    <div class="container">
		<div class="col-md-3">
		<div style="position: fixed; top: 2%; left: 3%;padding: 61px;">
                <p class="lead">Category</p>
                <div class="list-group">
                    <?php
                        foreach ($categories as $categories) {
                            echo Html::a($categories->category_name,['/site/index', 'catId' => $categories->category_id],['class' => 'list-group-item',]);
                            
                            //'<a href="#" class="list-group-item">'.$categories->category_name.'</a>';
                        }
                    ?>
                    
                </div>
            </div>
            <?php $url=explode('/',Yii::$app->request->url);
            $isindex= end($url);  
            if($isindex=='index.php' || $isindex==''){ 
            ?>
            
               <!--<div style="position: fixed; top: 45%; left: 3%;padding: 61px;"> 
                <div style="width:250px;">
                   <img src="<?php echo Yii::getAlias('@base')."/data/certificates/iso.jpg";?>" alt="" style="height:150px;">
                    <img src="<?php echo Yii::getAlias('@base')."/data/certificates/gmp.jpeg";?>" alt="" style="height:150px;">
                   
                    
                </div>
                </div>-->
           
            <?php } ?>
            </div>
			<div class="col-md-9">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
		</div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-right">&copy; Plant and Seed Oils Pvt. Ltd. </p>

        <!--  <p class="pull-right"><?=Yii::powered() ?></p>-->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
