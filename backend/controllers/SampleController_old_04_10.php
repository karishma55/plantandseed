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
use mPDF;
//use Mpdf\Mpdf;
use app\models\SampleInvoice;
use app\models\Batch;
use app\models\SampleInvoiceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;


//require  '../../vendor/mpdf/mpdf/mpdf.php';


class SampleController extends Controller
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
		$searchModel = new SampleInvoiceSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$model = new SampleInvoice();
		return $this->render('index', [
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
				'model' => $model,
		]);
	}
	/**
	 * Print Sample Invoice.
	 * @return mixed
	 */
	public function actionPrint($id)
	{
		$model = $this->findModel($id);
		ob_start();
		$mpdf = new mPDF('utf-8', 'A4',10,'dejavusans',0,0,60,16,4,9,'P');
		
		$header='<div><img src="'.Yii::getAlias('@web').'/data/comp/logo.png"/></div>';
		
		$footer='<div>
					<div style="float:left;width:10%"><img src="'.Yii::getAlias('@web').'/data/comp/logo1.png"/></div>
					<div style="float:right">252, 1st/Kh no. 40, Kua Chowk,Village Dallupura,Near Dharamshila Hospital 
					Delhi - 110096, India, Contact: +91 9599221142/41,Email:marketing@plantandseedoils.com,
					Website:- www.plantandseedoils.com </div>
				</div>';
		//$mpdf->SetHTMLHeader($header);
		//$mpdf->SetHTMLFooter($footer);
		//$mpdf->SetFooter($footer);
		$mpdf->WriteHTML($this->renderPartial('invoice',[
				'model' => $model,
		]));
		$mpdf->Output();
		ob_end_flush();
		exit;
		
		
		
		
	}
	
	/**
	 * Lists all State models.
	 * @return mixed
	 */
	public function actionLable()
	{
		if (Yii::$app->request->post ()) {
			
			
			$model= (new \yii\db\Query())
			->select(['batch.*'])
			->from(['batch' => 'batch'])
			//->leftJoin('inquiry', 'inquiry.inquiry_id = batch.inquiry_id')
			->where(['inquiry_id' => $_POST['inquiry']])
			->orderBy(['batch_id' => SORT_ASC])->all();
			ob_start();
			$mpdf = new mPDF('utf-8', 'A4',7,'serif',0,0,5,0,0,0,'P');
			$mpdf->setAutoTopMargin='pad';
			$mpdf->defaultfooterline=false;
			$mpdf->WriteHTML($this->renderPartial('lable_print',[
					'model' => $model,
			]));
			$mpdf->Output();
			ob_end_flush();
			exit;
		}
		
		$model= (new \yii\db\Query())
		->select(['batch.*', new \yii\db\Expression('COUNT(batch_id) as total'), 'inquiry.companyName'])
		->from(['batch' => 'batch'])
		->leftJoin('inquiry', 'inquiry.inquiry_id = batch.inquiry_id')
		->where(['batch.lable_type' =>'Sample'])
		->orderBy(['batch_id' => SORT_DESC])->groupBy('inquiry_id')->all();
		//echo $model->createCommand()->getRawSql();  die;
		
		return $this->render('lable', [				
				'model' => $model,
		]);
	}
	
	
	
	/**
	 * Print Sample Invoice.
	 * @return mixed
	 */
	public function actionAddress($id)
	{
		$model = $this->findModel($id);
		ob_start();
		$mpdf = new mPDF('utf-8', 'A4',11,'serif',0,0,5,0,0,0,'P');
		$mpdf->setAutoTopMargin='pad';
		$mpdf->defaultfooterline=false;
		$mpdf->WriteHTML($this->renderPartial('address',[
				'model' => $model,				
		]));
		$mpdf->Output();
		ob_end_flush();
		exit;
		
		
		
	}

	/**
	 * Creates a new State model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new SampleInvoice();
		
		if (($model->load ( Yii::$app->request->post () )) && Yii::$app->request->isAjax) {
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			return ActiveForm::validate ( $model );
		}
		if ($model->load ( Yii::$app->request->post () )) {
			
			$model->companyName= $_POST['SampleInvoice']['companyName'];
			$model->address= $_POST['SampleInvoice']['address'];
			$model->phoneNo= $_POST['SampleInvoice']['phoneNo'];
			$model->name= $_POST['SampleInvoice']['name'];
			$model->inquiry= $_POST['SampleInvoice']['inquiry'];			
			$model->inquiry_date= new \yii\db\Expression('NOW()');
			
			if($model->save()){
				Yii::$app->session->setFlash('inquiry-success', "Inquiry added successfully !!!");
				return $this->redirect(['index']);
			}
			else{
				Yii::$app->session->setFlash('inquiry-error', "Inquiry could not be added!!!");
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
			$model->companyName= $_POST['SampleInvoice']['companyName'];
			$model->address= $_POST['SampleInvoice']['address'];
			$model->phoneNo= $_POST['SampleInvoice']['phoneNo'];
			$model->name= $_POST['SampleInvoice']['name'];
			$model->inquiry= $_POST['SampleInvoice']['inquiry'];
			$model->status= 'Dispatched';
			$model->dispatch_date= new \yii\db\Expression('NOW()');
			
			if($model->save()){
				$productArray=explode(',', $_POST['SampleInvoice']['inquiry']);
				
				
				$last_batch_data= \app\models\Batch::find()->where(['created_date' => new \yii\db\Expression('CURRENT_DATE()')])
				->orderBy(['batch_id' => SORT_DESC])->one(); 
				//echo $last_batch_data->createCommand()->sql;
				//$last_batch_data->createCommand()->getRawSql();  
				$lastBatchNo=0;
				
				if($last_batch_data){
					$lastBatchNo=substr($last_batch_data->batch_No,10);
				}
				
				
				
				for($i=1;$i<=count($productArray);$i++){
					$lastBatchNo++;
					$model_batch = new Batch();
					$date=Yii::$app->formatter->asDate('now', 'php:ymd');
					$batchNo='PSO-'.$date.$lastBatchNo;
					$model_batch->inquiry_id= $model->inquiry_id;;
					$model_batch->product_Name= strtolower(trim($productArray[$i-1]));
					$model_batch->batch_No=$batchNo;
					$model_batch->lable_type= 'Sample';					
					$model_batch->created_date= new \yii\db\Expression('NOW()');
					$model_batch->save();
					
				}
				
				Yii::$app->session->setFlash('inquiry-success', "Inquiry updated successfully !!!");
				return $this->redirect(['index']);
			}
			else{
				Yii::$app->session->setFlash('inquiry-error', "Inquiry could not be updated!!!");
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
	
	/**
	 * Deletes an existing State model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		
		$this->findModel($id)->delete();
		
				
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
		if (($model = SampleInvoice::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
