<?php

/*****************************************************************************************
 * EduSec  Open Source Edition is a School / College management system developed by
 * RUDRA SOFTECH. Copyright (C) 2010-2015 RUDRA SOFTECH.

 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see http://www.gnu.org/licenses. 

 * You can contact RUDRA SOFTECH, 1st floor Geeta Ceramics, 
 * Opp. Thakkarnagar BRTS station, Ahmedbad - 382350, India or
 * at email address info@rudrasoftech.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * RUDRA SOFTECH" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by RUDRA SOFTECH".
*****************************************************************************************/

/**
 * This is the model class for table "state".
 * @package EduSec.models
 */

namespace app\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "category".
 *
 * @property integer $product_id
 * @property integer $product_category_id
 * @property string $product_name
 * @property string $product_image
 * @property string $product_description
 * @property string $product_meta_title
 * @property string $product_meta_tag
 * @property string $product_meta_description
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property integer $is_status  
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }
    public static function find()
    {
	return parent::find()->andWhere(['<>', 'is_status', 2]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_name','created_at', 'created_by', 'product_category_id'], 'required', 'message' => ''],
            [['product_category_id','created_by', 'updated_by', 'is_status'], 'integer'],
            [['product_image','product_short_description','product_description','product_meta_title','product_meta_tag','product_meta_description','created_at', 'updated_at'], 'safe'],
            [['product_name'], 'string', 'max' => 35],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        	'product_id' => Yii::t('app', 'Product ID'),
			'product_category_id' => Yii::t('app', 'Category'),
            'product_name' => Yii::t('app', 'Product'),
            'product_image' => Yii::t('app', 'Product Image'),
            'product_short_description' => Yii::t('app', 'Product Short Description'),
        	'product_description' => Yii::t('app', 'Product Description'),
        	'product_meta_title' => Yii::t('app', 'Product Meta Title'),
        	'product_meta_tag' => Yii::t('app', 'Product Meta Tag'),
        	'product_meta_description' => Yii::t('app', 'Product Meta Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'is_status' => Yii::t('app', 'Is Status'),
        ];
    }
    
    public function getProductCategory()
    {
    	
    	return $this->hasOne(\app\models\Category::className(), ['category_id' => 'product_category_id']);
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
    
    public static function getProductImage($imgName,$path)
    {
    	#echo Yii::getAlias('@frontend').'/data/'.$path.'/'.$imgName; die;
    	$dispImg = is_file(Yii::getAlias('@frontend').'/data/'.$path.'/'.$imgName) ? true :false;
    	return Yii::getAlias('@base')."/data/$path/".(($dispImg) ? $imgName : "no-photo.png");
    }

   
}
