<?php

/**
 * This is the model class for table "master_wilayah".
 *
 * The followings are the available columns in table 'master_wilayah':
 * @property integer $id
 * @property integer $id_provinsi
 * @property integer $id_kota
 * @property integer $id_kecamatan
 * @property integer $id_kelurahan
 */
class MasterWilayah extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'master_wilayah';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_provinsi, id_kota, id_kecamatan, id_kelurahan', 'required'),
			array('id_provinsi, id_kota, id_kecamatan, id_kelurahan', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_provinsi, id_kota, id_kecamatan, id_kelurahan', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'provinsi' => array(self::BELONGS_TO, 'Provinsi', 'id_provinsi'),
            'kota' => array(self::BELONGS_TO, 'Kota', 'id_kota'),
            'kecamatan' => array(self::BELONGS_TO, 'Kecamatan', 'id_kecamatan'),
            'kelurahan' => array(self::BELONGS_TO, 'Kelurahan', 'id_kelurahan'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_provinsi' => 'Provinsi',
			'id_kota' => 'Kota',
			'id_kecamatan' => 'Kecamatan',
			'id_kelurahan' => 'Kelurahan',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_provinsi',$this->id_provinsi);
		$criteria->compare('id_kota',$this->id_kota);
		$criteria->compare('id_kecamatan',$this->id_kecamatan);
		$criteria->compare('id_kelurahan',$this->id_kelurahan);

		// Join dengan tabel relasi untuk mendapatkan kolom name
		$criteria->with = array('provinsi', 'kota', 'kecamatan', 'kelurahan');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MasterWilayah the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
