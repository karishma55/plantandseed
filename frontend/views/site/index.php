<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

use yii\widgets\LinkPager;
use yii\bootstrap\Modal;
$this->title = 'Products';
?>
                 
<div class="site-index">

    <div class="row carousel-holder">

         <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php 
                                $count=0;
                                foreach($banners as $bannersli){
                                    if($count==0) $divClass='active';
                                   echo  '<li data-target="#carousel-example-generic" data-slide-to="'.$count.'" class="'.$divClass.'"></li>';
                                   $count++;
                                }?>
                                <!--<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>-->
                            </ol>
                            <div class="carousel-inner">
                                <?php
                                $count=0;
                                foreach($banners as $banners){
                                    $divClass='';
                                    if($count==0) $divClass='active';
                                    echo '<div class="item '.$divClass.'">
                                    <img class="slide-image" style="width:800px;height:300px;" src="'.Yii::getAlias('@base')."/data/banner_image/$banners->banner_image".'" alt="">
                               		<div class="carousel-caption">
										<h3>'.$banners->banner_heading.'</h3>
										<p>'.$banners->banner_description.'</p>
									  </div>
							    </div>';
                                    $count++;
                                }
                                ?>
                                <!--<div class="item active">
                                    <img class="slide-image" style="width:800px;height:300px;" src="<?php echo Yii::getAlias('@web')."/data/banner_image/Jojoba.jpg";?>" alt="">
                               		<div class="carousel-caption">
										<h3>jojoba oil</h3>
										<p>Jojoba oil is used as a replacement for whale oil and its derivatives, such as cetyl alcohol.</p>
									  </div>
							    </div>
                                <div class="item">
                                     <img class="slide-image" style="width:800px;height:300px;" src="<?php echo Yii::getAlias('@web')."/data/banner_image/Jojoba.jpg";?>" alt="">
                                	<div class="carousel-caption">
										<h3>Chania</h3>
										<p>The atmosphere in Chania has a touch of Florence and Venice.</p>
									  </div>
								</div>
                                <div class="item">
                                     <img class="slide-image" style="width:800px;height:300px;" src="<?php echo Yii::getAlias('@web')."/data/banner_image/Jojoba.jpg";?>" alt="">
                                		<div class="carousel-caption">
										<h3>Chania</h3>
										<p>The atmosphere in Chania has a touch of Florence and Venice.</p>
									  </div>
								</div>-->
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
          </div>

    </div>

    <div class="body-content" style="margin-top:20px;">
    
		
        <div class="row">
                    
            <?php
            foreach($products as $products){
                                   
                                    echo '<div class="col-lg-4">
                <div class="thumbnail" style="border: 0px solid #ddd">
                            <img src="'.Yii::getAlias('@base')."/data/product_image/$products->product_image".'" alt="" style="height:185px;">
                            <div class="caption" style="height:127px;">';
                                
echo  '<h4>'.Html::a(Yii::t('app', $products->product_name),['/site/productdetail', 'ProductId' => $products->product_id]).' </h4>';
                                    //echo  '<h4 style="color: #337ab7;">'. $products->product_name.' </h4>';
echo  '<p>'.$modelProduct->getDescription($products->product_short_description,$products->product_id,'90').' </p>';
                            echo '</div>
                            
                        </div>
            </div>';
                                    
                                }
            ?>
         
            
           <!-- <div class="col-lg-4">
                <div class="thumbnail">
                            <img src="<?php echo Yii::getAlias('@web')."/data/product_image/menthol-crystal-2.jpg";?>" alt="">
                            <div class="caption">
                                
                                <h4><a href="#">Menthol Crystal</a>
                                </h4>
                                <p>See more snippets like this online store item at See more snippets <a target="_blank" href="http://www.bootsnipp.com">More...</a></p>
                            </div>
                            
                        </div>
            </div>
        	<div class="col-lg-4">
                <div class="thumbnail">
                            <img src="<?php echo Yii::getAlias('@web')."/data/product_image/menthol-crystal-2.jpg";?>" alt="">
                            <div class="caption">
                                
                                <h4><a href="#">Menthol Crystal</a>
                                </h4>
                                <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                            </div>
                            
                        </div>
            </div>
			<div class="col-lg-4">
                <div class="thumbnail">
                            <img src="<?php echo Yii::getAlias('@web')."/data/product_image/menthol-crystal-2.jpg";?>" alt="">
                            <div class="caption">
                                
                                <h4><a href="#">Menthol Crystal</a>
                                </h4>
                                <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                            </div>
                            
                        </div>
            </div>
			<div class="col-lg-4">
                <div class="thumbnail">
                            <img src="<?php echo Yii::getAlias('@web')."/data/product_image/menthol-crystal-2.jpg";?>" alt="">
                            <div class="caption">
                                
                                <h4><a href="#">Menthol Crystal</a>
                                </h4>
                                <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                            </div>
                            
                        </div>
            </div>
			<div class="col-lg-4">
                <div class="thumbnail">
                            <img src="<?php echo Yii::getAlias('@web')."/data/product_image/menthol-crystal-2.jpg";?>" alt="">
                            <div class="caption">
                                
                                <h4><a href="#">Menthol Crystal</a>
                                </h4>
                                <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                            </div>
                            
                        </div>
            </div>
			<div class="col-lg-4">
                <div class="thumbnail">
                            <img src="<?php echo Yii::getAlias('@web')."/data/product_image/menthol-crystal-2.jpg";?>" alt="">
                            <div class="caption">
                                
                                <h4><a href="#">Menthol Crystal</a>
                                </h4>
                                <p><a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                            </div>
                            
                        </div>
            </div>
			<div class="col-lg-4">
                <div class="thumbnail">
                            <img src="<?php echo Yii::getAlias('@web')."/data/product_image/menthol-crystal-2.jpg";?>" alt="">
                            <div class="caption">
                                
                                <h4><a href="#">Menthol Crystal</a>
                                </h4>
                                <p><a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                            </div>
                            
                        </div>
            </div>
			<div class="col-lg-4">
                <div class="thumbnail">
                            <img src="<?php echo Yii::getAlias('@web')."/data/product_image/menthol-crystal-2.jpg";?>" alt="">
                            <div class="caption">
                                
                                <h4><a href="#">Menthol Crystal</a>
                                </h4>
                                <p><a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                            </div>
                            
                        </div>
            </div>
			<div class="col-lg-4">
                <div class="thumbnail">
                            <img src="<?php echo Yii::getAlias('@web')."/data/product_image/menthol-crystal-2.jpg";?>" alt="">
                            <div class="caption">
                                
                                <h4><a href="#">Menthol Crystal</a>
                                </h4>
                                <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                            </div>
                            
                        </div>
            </div>
            -->
        </div>
	
	 <?php 
     echo LinkPager::widget([
     		'pagination' => $pagination,
     ]);
     ?>  
    </div>
</div>
<?php
           /* Modal::begin([
                'toggleButton' => [
                    'label' => '<i class="glyphicon glyphicon-plus"></i> Add',
                    'class' => 'btn btn-success'
                ],
                'closeButton' => [
                  'label' => 'Close',
                  'class' => 'btn btn-danger btn-sm pull-right',
                ],
                'size' => 'modal-lg',
            ]);
           
            echo $this->render('/someview/create', ['model' => $modelProduct]);
            Modal::end();*/
        ?>
