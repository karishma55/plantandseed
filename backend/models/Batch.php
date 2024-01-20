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
class Batch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'batch';
    }
   

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        		[['product_Name','batch_No','lable_type','created_date',], 'required', 'message' => ''],
        		[['net_weight','tear_weight','total_weight','drum_No',],'safe'],
            
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [        	
			'batch_id' => Yii::t('app', 'Batch Id'),
        	'inquiry_id' => Yii::t('app', 'Inquiry ID'),
            'product_Name' => Yii::t('app', 'Product Name'),
            'batch_No' => Yii::t('app', 'Batch No'),
        	'lable_type' => Yii::t('app', 'Type'),        	
        	
        ];
    }
    
    public function getSampleStatus()
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
    
  

   
}
