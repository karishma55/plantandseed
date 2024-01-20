<?php
use yii\helpers\Html;
?>
<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                        <?= Html::a('<i class="fa fa-dashboard fa-fw"></i> '.Yii::t('app', 'Dashboard'),['/site/index'])  ?>
                           
                        </li>
                        <!-- <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Flot Charts</a>
                                </li>
                                <li>
                                    <a href="morris.html">Morris.js Charts</a>
                                </li>
                            </ul>
                            
                        </li> -->
                        <li>
                        	<?= Html::a('<i class="fa fa-edit fa-fw"></i> '.Yii::t('app', 'Banner'),['/banner/index'])  ?>                           
                        </li>
                        <li>
                        <?= Html::a('<i class="fa fa-table fa-fw"></i> '.Yii::t('app', 'Category'),['/category/index'])  ?>
                            
                        </li>
                        <li>
                        	<?= Html::a('<i class="fa fa-edit fa-fw"></i> '.Yii::t('app', 'Product'),['/product/index'])  ?>                           
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Sample<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                        	<?= Html::a('<i class="fa fa-edit fa-fw"></i> '.Yii::t('app', 'Sample Invoice'),['/sample/index'])  ?>                           
                        </li>
                                 <li>
                        	<?= Html::a('<i class="fa fa-edit fa-fw"></i> '.Yii::t('app', 'Sample Lable'),['/sample/lable'])  ?>                           
                        </li>
                         
                            </ul>
                            
                        </li>
                       
                        <li>
                        	<?= Html::a('<i class="fa fa-edit fa-fw"></i> '.Yii::t('app', 'Invoice'),['/invoice/index'])  ?>                           
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Invoice Lable<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <li>
                        	<?= Html::a('<i class="fa fa-edit fa-fw"></i> '.Yii::t('app', 'Create Lable'),['/lable/create'])  ?>                           
                        </li>
                                <li>
                        	<?= Html::a('<i class="fa fa-edit fa-fw"></i> '.Yii::t('app', 'Big Lable'),['/lable/index'])  ?>                           
                        </li>
                                 <li>
                        	<?= Html::a('<i class="fa fa-edit fa-fw"></i> '.Yii::t('app', 'Small Lable'),['/lable/small'])  ?>                           
                        </li>
                        
                            </ul>
                            
                        </li>
                        
                      
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>