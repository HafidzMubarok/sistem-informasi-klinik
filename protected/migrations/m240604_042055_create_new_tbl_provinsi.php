<?php

class m240604_042055_create_new_tbl_provinsi extends CDbMigration
{
	public function up()
	{
		$this->createTable('provinsi', array(
            'code' => 'pk',
            'parent_code' => 'integer NOT NULL',
            'name' => 'integer NOT NULL',
        ));
	}

	public function down()
	{
		$this->dropTable('provinsi');
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