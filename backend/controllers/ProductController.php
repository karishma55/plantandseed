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
 * StateController implements the CRUD actions for State model.
*/

namespace backend\controllers;

use Yii;
use app\models\Product;
use app\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;

class ProductController extends Controller
{
	public function behaviors()
	{
		return [
				'verbs' => [
						'class' => VerbFilter::className(),
						'actions' => [
								'delete' => ['post'],
						],
				],
		];
	}

	/**
	 * Lists all State models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new ProductSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$model = new Product();
		return $this->render('index', [
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
				'model' => $model,
		]);
	}

	/**
	 * Displays a single State model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		return $this->render('view', [
				'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new State model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Product();

		if (($model->load ( Yii::$app->request->post () )) && Yii::$app->request->isAjax) {
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			return ActiveForm::validate ( $model );
		}
		if ($model->load ( Yii::$app->request->post () )) {
			
		
			
			$model->attributes = $_POST['Product'];
			$model->created_by = Yii::$app->getid->getId();
			$model->created_at= new \yii\db\Expression('NOW()');
			$model->product_image = UploadedFile::getInstance($model,'product_image');
			
			if(!empty($model->product_image))  {
				$name=explode('.',$model->product_image);
				$ext= substr(strrchr($model->product_image, '.'), 1);
					
				if($ext != null)
				{
					$newFName = $name[0].'-'.mt_rand(1, time()).'.'.$ext;
					$model->product_image->saveAs(Yii::getAlias('@frontend').'/data/product_image/' .$model->product_image = $newFName);
				}
			}
			if($model->save()){
				Yii::$app->session->setFlash('product-success', "Product added successfully !!!");
				return $this->redirect(['index']);
			}
			else{
				Yii::$app->session->setFlash('product-error', "Product could not be added!!!");
				return $this->render ( 'create', [
						'model' => $model
				] );
			}

		} else {
			return $this->render ( 'create', [
					'model' => $model
			] );
		}


	}

	/**
	 * Updates an existing State model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if (($model->load ( Yii::$app->request->post () )) && Yii::$app->request->isAjax) {
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			return ActiveForm::validate ( $model );
		}
		if ($model->load(Yii::$app->request->post())) {
		    
			$cmodel = $this->findModel($id);
			if(!empty($_FILES['Product']['name']['product_image'])){ 
			$model->product_image = UploadedFile::getInstance($model,'product_image');
			if(!empty($model->product_image))  {
				$name=explode('.',$model->product_image);
				$ext= substr(strrchr($model->product_image, '.'), 1);
			
				if($ext != null)
				{
					$newFName = $name[0].'-'.mt_rand(1, time()).'.'.$ext;
					$model->product_image->saveAs(Yii::getAlias('@frontend').'/data/product_image/' .$model->product_image = $newFName);
				}
			}
			}
			
			if($model->product_image=='')
				$model->product_image = $cmodel->product_image;
			
			$model->product_category_id = $_POST['Product']['product_category_id'];
			$model->product_name = $_POST['Product']['product_name'];
			$model->product_short_description = $_POST['Product']['product_short_description'];
			$model->product_description = $_POST['Product']['product_description'];
			$model->product_meta_title = $_POST['Product']['product_meta_title'];
			$model->product_meta_tag = $_POST['Product']['product_meta_tag'];
			$model->product_meta_description = $_POST['Product']['product_meta_description'];
			
			$model->updated_by = Yii::$app->getid->getId();
			$model->updated_at= new \yii\db\Expression('NOW()');
			
			if($model->save()){
				
				Yii::$app->session->setFlash('product-success', "Product updated successfully !!!");
				return $this->redirect(['index']);
			}
			else{
				Yii::$app->session->setFlash('product-error', "Product could not be updated!!!");
				return $this->render ( 'update', [
						'model' => $model
				] );
			}
				
		} else {
			return $this->render ( 'update', [
					'model' => $model
			] );
		}
	}
	
	public function actionDocsDownload( $product_id ,$field,$path)
	{
		$path = Yii::getAlias('@frontend') . '/data/'.$path.'/';
		$model = Product::find()->where(['product_id' => $product_id])->one();
		$file = $path.$model->$field;
		$ext = substr(strrchr($model->$field,'.'),1);
	
		if(!empty($model) && file_exists($file)) {
			return Yii::$app->response->sendFile($file, date('Y-m-dHis').".".$ext);
		}
		else
			throw new NotFoundHttpException('The requested page does not exist.');
	
	}

	/**
	 * Deletes an existing State model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		//$this->findModel($id)->delete();
		$model = Product::findOne($id);
		$model->delete();
		
		//$model->is_status = 2;
		//$model->updated_by = Yii::$app->getid->getId();
		//$model->updated_at = new \yii\db\Expression('NOW()');
		//$model->save();

		return $this->redirect(['index']);
	}

	/**
	 * Finds the State model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return State the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Product::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
