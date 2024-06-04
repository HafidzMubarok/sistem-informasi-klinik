<?php

class m240604_041724_create_new_tbl_master_wilayah extends CDbMigration
{
	public function up()
	{
		$this->createTable('master_wilayah', array(
            'id' => 'pk',
            'id_provinsi' => 'integer NOT NULL',
            'id_kota' => 'integer NOT NULL',
            'id_kecamatan' => 'integer NOT NULL',
            'id_kelurahan' => 'integer NOT NULL',
        ));
	}

	public function down()
	{
		$this->dropTable('master_wilayah');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}