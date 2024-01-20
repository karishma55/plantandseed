<?php

/* @var $this yii\web\View. */

use yii\helpers\Html;

$this->title = 'Product Detail';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-about">
  


<p style="text-align: justify;"><?php echo $productRes->product_name ?></p>
<p style="text-align: justify;"><?php echo $productRes->product_description ?></p>

  
</div>
