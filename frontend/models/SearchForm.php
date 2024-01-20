<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * LoginForm is the model behind the login form.
 */
class SearchForm extends Model
{
    public $search;
   
 

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [            
        		[['search'], 'safe', 'message' => ''],
        	
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'search' => Yii::t('app', 'Search'),
            
        ];
    }

    
}
