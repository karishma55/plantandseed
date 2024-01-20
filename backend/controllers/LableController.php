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
//use mPDF;
error_reporting(0);
require __DIR__.'/../../vendor/mpdf/mpdf/mpdf.php';
use app\models\SampleInvoice;
use app\models\Batch;
use app\models\SampleInvoiceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;

class LableController extends Controller {
	public function behaviors() {
		return [ 
				'verbs' => [ 
						'class' => VerbFilter::className (),
						'actions' => [ 
								'delete' => [ 
										'post' 
								] 
						] 
				] 
		];
	}
	
	/**
	 * Lists all State models.
	 *
	 * @return mixed
	 */
	public function actionIndex() {
		if (Yii::$app->request->post ()) {
			
			
			$model= (new \yii\db\Query())
			->select(['batch.*',new \yii\db\Expression('DATE_SUB(DATE_ADD(batch.created_date, INTERVAL 2 YEAR), INTERVAL 1 DAY) as expDate'),'inquiry.address'])
			->from(['batch' => 'batch'])
			->leftJoin('inquiry', 'inquiry.inquiry_id = batch.inquiry_id')
			->where(['batch.inquiry_id' => $_POST['inquiry'],'batch.lable_type' =>'Big'])
			->orderBy(['batch_id' => SORT_ASC])->all();
			//echo '<pre>';
			//print_r($model); die;
			ob_start();
			$mpdf = _get_mpdf_obj( 'utf-8', 'A4', 7, 'serif', 0, 0, 5, 0, 0, 0, 'P' );
			$mpdf->setAutoTopMargin = 'pad';
			$mpdf->defaultfooterline = false;
			$mpdf->WriteHTML ( $this->renderPartial ( 'big_lable_print',[
					'model' => $model,
			]) );
			$mpdf->Output ();
			ob_end_flush();
			exit ();
			
			
		}
		
		$model= (new \yii\db\Query())
		->select(['batch.*', new \yii\db\Expression('COUNT(batch_id) as total'), 'inquiry.companyName'])
		->from(['batch' => 'batch'])
		->leftJoin('inquiry', 'inquiry.inquiry_id = batch.inquiry_id')
		->where(['batch.lable_type' =>'Big'])
		->orderBy(['batch_id' => SORT_DESC])->groupBy('inquiry_id')->all();
		//echo $model->createCommand()->getRawSql();  die;
		
		return $this->render('big_lable', [
				'model' => $model,
		]);
	}
	public function actionCreate() {
		$model = new SampleInvoice ();
		
		if ($model->load ( Yii::$app->request->post () )) {
			
			//$product_50gm = $_POST ['products_0_05'];
			$product_100gm = $_POST ['products_0_10'];
			$product_500gm = $_POST ['products_0_50'];
			$product_1kg = $_POST ['products_1'];			
			$product_5kg = $_POST ['products_5'];			
			$product_10kg = $_POST ['products_10'];
		    $product_20kg = $_POST ['products_20'];
			$product_25kg = $_POST ['products_25'];
			$product_25_1kg = $_POST ['products_25_1'];
		    $product_200kg = $_POST ['products_200'];
			
			$drum_tear_weight = array (
					//'0.05' => '0.005',
					'0.10' => '0.010',
					//'0.50' => '0.040',
					'1' => '0.090',					
					'5' => '0.300',					
					'10' => '0.500',
					'20' => '1.000',
					'25' => '1.680',
					'25.1' => '1.280',
					'200' => '8.000' 
			);
			$productArray = array ();
			$unique_Product = array ();
			/*if (! empty ( $product_50gm)) {
				$productArr = explode ( ',', $product_50gm);
				for($i = 0; $i < count ( $productArr ); $i ++) {
					$productNameWeightArr = explode ( '-', $productArr [$i]); 
					$productArray [] = array (
							'name' => strtolower(trim($productNameWeightArr[0])),
							'weight' => $productNameWeightArr[1],
							'tear_weight' => $drum_tear_weight ['0.05']
					);
					if (! in_array ( $productNameWeightArr[0], $unique_Product ))
						array_push ( $unique_Product, $productNameWeightArr[0]);
				}
			}*/
			if (! empty ( $product_100gm)) {
				$productArr = explode ( ',', $product_100gm);
				for($i = 0; $i < count ( $productArr ); $i ++) {
					$productNameWeightArr = explode ( '-', $productArr [$i]); 
					$productArray [] = array (
							'name' => strtolower(trim($productNameWeightArr[0])),
							'weight' => $productNameWeightArr[1],
							'tear_weight' => $drum_tear_weight ['0.10']
					);
					if (! in_array ( $productNameWeightArr[0], $unique_Product ))
						array_push ( $unique_Product, $productNameWeightArr[0]);
				}
			}
			/*if (! empty ( $product_500gm)) {
				$productArr = explode ( ',', $product_500gm);
				for($i = 0; $i < count ( $productArr ); $i ++) {
					$productNameWeightArr = explode ( '-', $productArr [$i]); 
					$productArray [] = array (
							'name' => strtolower(trim($productNameWeightArr[0])),
							'weight' => $productNameWeightArr[1],
							'tear_weight' => $drum_tear_weight ['0.50']
					);
					if (! in_array ( $productNameWeightArr[0], $unique_Product ))
						array_push ( $unique_Product, $productNameWeightArr[0]);
				}
			}*/
			if (! empty ( $product_1kg )) {
				$productArr = explode ( ',', $product_1kg );
				for($i = 0; $i < count ( $productArr ); $i ++) {
					$productNameWeightArr = explode ( '-', $productArr [$i]); 
					$productArray [] = array (
							'name' => strtolower(trim($productNameWeightArr[0])),
							'weight' => $productNameWeightArr[1],
							'tear_weight' => $drum_tear_weight ['1'] 
					);
					if (! in_array ( $productNameWeightArr[0], $unique_Product ))
						array_push ( $unique_Product, $productNameWeightArr[0]);
				}
			}
			
			if (! empty ( $product_5kg )) {
				$productArr = explode ( ',', $product_5kg );
				for($i = 0; $i < count ( $productArr ); $i ++) {
					$productNameWeightArr = explode ( '-', $productArr [$i]); 
					$productArray [] = array (
							'name' => strtolower(trim($productNameWeightArr[0])),
							'weight' => $productNameWeightArr[1],
							'tear_weight' => $drum_tear_weight ['5'] 
					);
					if (! in_array ( $productNameWeightArr[0], $unique_Product ))
						array_push ( $unique_Product, $productNameWeightArr[0]);
				}
			}
			
			if (! empty ( $product_10kg )) {
				$productArr = explode ( ',', $product_10kg );
				for($i = 0; $i < count ( $productArr ); $i ++) {
					$productNameWeightArr = explode ( '-', $productArr [$i]);
					$productArray [] = array (
							'name' => strtolower(trim($productNameWeightArr[0])),
							'weight' => $productNameWeightArr[1],
							'tear_weight' => $drum_tear_weight ['10'] 
					);
					if (! in_array ( $productNameWeightArr[0], $unique_Product ))
						array_push ( $unique_Product, $productNameWeightArr[0]);
				}
			}
			if (! empty ( $product_20kg )) {
				$productArr = explode ( ',', $product_20kg );
				for($i = 0; $i < count ( $productArr ); $i ++) {
					$productNameWeightArr = explode ( '-', $productArr [$i]);
					$productArray [] = array (
							'name' => strtolower(trim($productNameWeightArr[0])),
							'weight' => $productNameWeightArr[1],
							'tear_weight' => $drum_tear_weight ['20'] 
					);
					if (! in_array ( $productNameWeightArr[0], $unique_Product ))
						array_push ( $unique_Product, $productNameWeightArr[0]);
				}
			}
			if (! empty ( $product_25kg )) {
				$productArr = explode ( ',', $product_25kg );
				for($i = 0; $i < count ( $productArr ); $i ++) {
					$productNameWeightArr = explode ( '-', $productArr [$i]);
					$productArray [] = array (
							'name' => strtolower(trim($productNameWeightArr[0])),
							'weight' => $productNameWeightArr[1],
							'tear_weight' => $drum_tear_weight ['25'] 
					);
					if (! in_array ( $productNameWeightArr[0], $unique_Product ))
						array_push ( $unique_Product, $productNameWeightArr[0]);
				}
			}
			
				if (! empty ( $product_25_1kg )) {
				$productArr = explode ( ',', $product_25_1kg );
				for($i = 0; $i < count ( $productArr ); $i ++) {
					$productNameWeightArr = explode ( '-', $productArr [$i]);
					$productArray [] = array (
							'name' => strtolower(trim($productNameWeightArr[0])),
							'weight' => $productNameWeightArr[1],
							'tear_weight' => $drum_tear_weight ['25.1'] 
					);
					if (! in_array ( $productNameWeightArr[0], $unique_Product ))
						array_push ( $unique_Product, $productNameWeightArr[0]);
				}
			}
			
				if (! empty ( $product_200kg )) {
				$productArr = explode ( ',', $product_200kg );
				for($i = 0; $i < count ( $productArr ); $i ++) {
					$productNameWeightArr = explode ( '-', $productArr [$i]);
					$productArray [] = array (
							'name' => strtolower(trim($productNameWeightArr[0])),
							'weight' => $productNameWeightArr[1],
							'tear_weight' => $drum_tear_weight ['200'] 
					);
					if (! in_array ( $productNameWeightArr[0], $unique_Product ))
						array_push ( $unique_Product, $productNameWeightArr[0]);
				}
			}
			
			$total_lable = count ( $productArray );
			
			$model->companyName = $_POST ['SampleInvoice'] ['companyName'];
			$model->address = $_POST ['SampleInvoice'] ['address'];
			$model->phoneNo = '9599112242';
			$model->name = 'Himanshu';
			$model->inquiry = implode ( ', ', $unique_Product );
			$model->inquiry_date = new \yii\db\Expression ( 'NOW()' );
			$model->status= 'Dispatched';
			$model->dispatch_date= new \yii\db\Expression('NOW()');
			//$model->save ();
			if ($model->save ()) {
				
				$last_batch_data = \app\models\Batch::find ()->where ( [ 
						'created_date' => new \yii\db\Expression ( 'CURRENT_DATE()' ) 
				] )->orderBy ( [ 
						'batch_id' => SORT_DESC 
				] )->one ();
				// echo $last_batch_data->createCommand()->sql;
				// $last_batch_data->createCommand()->getRawSql();
				$lastBatchNo = 0;
				
				if ($last_batch_data) {
					$lastBatchNo = substr ( $last_batch_data->batch_No, 10 );
				}
				
				
				
				$product_batch_arr=array();
				
				for($i = 1; $i <= count ( $productArray ); $i ++) {
					
					$last_batch_data = \app\models\Batch::find ()->where ( [ 
							'created_date' => new \yii\db\Expression ( 'CURRENT_DATE()' ),
							'inquiry_id' => $model->inquiry_id ,
							'product_Name' => $productArray [$i - 1]['name']
					] )->orderBy ( [ 
							'batch_id' => SORT_DESC 
					] )->count();
					//echo $last_batch_data->createCommand()->getRawSql(); die;
					
					$model_batch = new Batch ();
					if($last_batch_data==0){
						$lastBatchNo ++;						
						$date = Yii::$app->formatter->asDate ( 'now', 'php:ymd' );
						$batchNo = 'PSO-' . $date . $lastBatchNo;
						$product_batch_arr[$productArray [$i - 1]['name']]=$batchNo;
						
						
					}else{
						
						$batchNo=$product_batch_arr[trim($productArray[$i - 1]['name'])];
					}
					
					
					$model_batch->inquiry_id = $model->inquiry_id;					
					$model_batch->product_Name = $productArray [$i - 1]['name'];
					$model_batch->batch_No = $batchNo;
					if($productArray [$i - 1]['weight']>='25')
					$model_batch->lable_type = 'Big';
					else
						$model_batch->lable_type = 'Small';
					
						$model_batch->net_weight= $productArray [$i - 1]['weight'];
						$model_batch->tear_weight= $productArray [$i - 1]['tear_weight'];
						$model_batch->total_weight= $productArray [$i - 1]['weight']+ $productArray [$i - 1]['tear_weight'];
						$model_batch->drum_No= $i.'/'.count ( $productArray );
					$model_batch->created_date = new \yii\db\Expression ( 'NOW()' );
					
					$model_batch->save ();
					
				}
				
				Yii::$app->session->setFlash ( 'inquiry-success', "Inquiry added successfully !!!" );
				return $this->redirect ( [ 
						'index' 
				] );
			} else {
				Yii::$app->session->setFlash ( 'inquiry-error', "Inquiry could not be added!!!" );
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
	 * Lists all State models.
	 *
	 * @return mixed
	 */
	public function actionSmall() {
		if (Yii::$app->request->post ()) {
			
			
			$model= (new \yii\db\Query())
			->select(['batch.*',new \yii\db\Expression('DATE_SUB(DATE_ADD(batch.created_date, INTERVAL 2 YEAR), INTERVAL 1 DAY) as expDate'),'inquiry.address'])
			->from(['batch' => 'batch'])
			->leftJoin('inquiry', 'inquiry.inquiry_id = batch.inquiry_id')
			->where(['batch.inquiry_id' => $_POST['inquiry'],'batch.lable_type' =>'Small'])
			->orderBy(['batch_id' => SORT_ASC])->all();
			
			ob_start();
			$mpdf = _get_mpdf_obj( 'utf-8', 'A4', 7, 'serif', 0, 0, 5, 0, 0, 0, 'P' );
			$mpdf->setAutoTopMargin = 'pad';
			$mpdf->defaultfooterline = false;
			$mpdf->WriteHTML ( $this->renderPartial ( 'small_lable_print',[
					'model' => $model,
			]) );
			$mpdf->Output ();
			ob_end_flush();
			exit ();
		}
		
		$model= (new \yii\db\Query())
		->select(['batch.*', new \yii\db\Expression('COUNT(batch_id) as total'), 'inquiry.companyName'])
		->from(['batch' => 'batch'])
		->leftJoin('inquiry', 'inquiry.inquiry_id = batch.inquiry_id')
		->where(['batch.lable_type' =>'Small'])
		->orderBy(['batch_id' => SORT_DESC])->groupBy('inquiry_id')->all();
		//echo $model->createCommand()->getRawSql();  die;
		
		return $this->render('small_lable', [
				'model' => $model,
		]);
	}
	
	
	
	/**
	 * Finds the State model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @param integer $id        	
	 * @return State the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if (($model = SampleInvoice::findOne ( $id )) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException ( 'The requested page does not exist.' );
		}
	}
}
