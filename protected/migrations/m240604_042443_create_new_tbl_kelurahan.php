<?php

class m240604_042443_create_new_tbl_kelurahan extends CDbMigration
{
	public function up()
	{
		$transaction=$this->getDbConnection()->beginTransaction();
        try
        {
            $this->createTable('kelurahan', array(
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