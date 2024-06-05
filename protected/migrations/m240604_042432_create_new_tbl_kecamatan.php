<?php

class m240604_042432_create_new_tbl_kecamatan extends CDbMigration
{
	public function up()
	{
		$transaction=$this->getDbConnection()->beginTransaction();
        try
        {
            $this->createTable('kecamatan', array(
                'code' => 'pk',
				'parent_code' => 'integer NOT NULL',
				'name' => 'integer NOT NULL',
            ));
            $transaction->commit();
        }
        catch(Exception $e)
        {
            echo "Exception: ".$e->getMessage()."\n";
            $transaction->rollback();
            return false;
        }
	}

	public function down()
	{
		$this->dropTable('kecamatan');
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