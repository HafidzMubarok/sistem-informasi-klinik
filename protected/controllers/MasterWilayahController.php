<?php

class MasterWilayahController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'getKotaByProvinsi', 'getKecamatanByKota', 'getKelurahanByKecamatan'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new MasterWilayah;

		// Ambil data dari tabel relasi untuk select options
		$provinsiList = CHtml::listData(Provinsi::model()->findAll(), 'code', 'name');
		$kotaList = array();
		$kecamatanList = array();
		$kelurahanList = array();

		if (isset($_POST['MasterWilayah'])) {
			$model->attributes = $_POST['MasterWilayah'];
			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array(
			'model' => $model,
			'provinsiList' => $provinsiList,
			'kotaList' => $kotaList,
			'kecamatanList' => $kecamatanList,
			'kelurahanList' => $kelurahanList,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		// Ambil data dari tabel relasi untuk select options
		$provinsiList = CHtml::listData(Provinsi::model()->findAll(), 'code', 'name');
		$kotaList = CHtml::listData(Kota::model()->findAll('parent_code=:provinsi_code', array(':provinsi_code' => $model->id_provinsi)), 'code', 'name');
		$kecamatanList = CHtml::listData(Kecamatan::model()->findAll('parent_code=:kota_code', array(':kota_code' => $model->id_kota)), 'code', 'name');
		$kelurahanList = CHtml::listData(Kelurahan::model()->findAll('parent_code=:kecamatan_code', array(':kecamatan_code' => $model->id_kecamatan)), 'code', 'name');

		if (isset($_POST['MasterWilayah'])) {
			$model->attributes = $_POST['MasterWilayah'];
			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
			'model' => $model,
			'provinsiList' => $provinsiList,
			'kotaList' => $kotaList,
			'kecamatanList' => $kecamatanList,
			'kelurahanList' => $kelurahanList,
		));
	}

	public function actionGetKotaByProvinsi()
	{
		if(isset($_POST['provinsi_id']))
		{
			$provinsiId = (int) $_POST['provinsi_id'];

			// Debug: Cek apakah provinsi_id benar
			error_log("provinsi_id: " . $provinsiId);

			$data = Kota::model()->findAll('parent_code=:provinsi_code', array(':provinsi_code' => $provinsiId));

			// Debug: Cek jumlah data yang ditemukan
			error_log("Jumlah data kota: " . count($data));

			$data = CHtml::listData($data, 'code', 'name');
			foreach ($data as $value => $name) {
				echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
			}
		} else {
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
		}
	}

	public function actionGetKecamatanByKota()
	{
		if(isset($_POST['kota_id']))
		{
			$kotaId = (int) $_POST['kota_id'];

			// Debug: Cek apakah provinsi_id benar
			error_log("kota_id: " . $kotaId);

			$data = Kecamatan::model()->findAll('parent_code=:kota_code', array(':kota_code' => $kotaId));

			// Debug: Cek jumlah data yang ditemukan
			error_log("Jumlah data kecamatan: " . count($data));

			$data = CHtml::listData($data, 'code', 'name');
			foreach ($data as $value => $name) {
				echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
			}
		} else {
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
		}
	}

	public function actionGetKelurahanByKecamatan()
	{
		if(isset($_POST['kecamatan_id']))
		{
			$kecamatanId = (int) $_POST['kecamatan_id'];

			// Debug: Cek apakah provinsi_id benar
			error_log("kecamatan_id: " . $kecamatanId);

			$data = Kelurahan::model()->findAll('parent_code=:kecamatan_code', array(':kecamatan_code' => $kecamatanId));

			// Debug: Cek jumlah data yang ditemukan
			error_log("Jumlah data kelurahan: " . count($data));

			$data = CHtml::listData($data, 'code', 'name');
			foreach ($data as $value => $name) {
				echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
			}
		} else {
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('MasterWilayah');

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new MasterWilayah('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MasterWilayah']))
			$model->attributes=$_GET['MasterWilayah'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return MasterWilayah the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=MasterWilayah::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MasterWilayah $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='master-wilayah-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
