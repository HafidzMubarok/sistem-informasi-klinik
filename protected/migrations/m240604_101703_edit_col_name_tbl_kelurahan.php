<?php

class m240604_101703_edit_col_name_tbl_kelurahan extends CDbMigration
{
	public function up()
	{
		$transaction=$this->getDbConnection()->beginTransaction();
        try
        {
            $this->alterColumn('kelurahan', 'name', 'string');
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
		$this->alterColumn('kelurahan','name', 'integer' );//int is old_data_type
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