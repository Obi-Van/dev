<?php

use Phinx\Migration\AbstractMigration;
use Cake\ORM\TableRegistry;

class MyCustomMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('companies');
        
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255
        ]);
        $table->addColumn('quota', 'integer', [
            'limit' => 11
        ]);
        $table->create();
        $this->execute('INSERT INTO companies (name,quota) VALUES ("Adidas","100"),("Nike","150")');

        $table_2 = $this->table('users');

        $table_2->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255
        ]);
        $table_2->addColumn('email', 'string', [
            'limit' => 255
        ]);
        $table_2->addColumn('company_id', 'integer', [
            'limit' => 11
        ]);
        $table_2->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false
        ]);
        $table_2->create();

        $this->execute('INSERT INTO users (name,email,company_id,created) VALUES ("John","Don@yahoo.com","1",NOW()),("Jack","Chan@ukr.net","2",NOW())');

        $table_3 = $this->table('transfers');

        $table_3->addColumn('user_id','integer',['limit'=>11]);
        $table_3->addColumn('resource','text');
        $table_3->addColumn('amount','float');
        $table_3->addColumn('date', 'datetime', [
            'default' => null,
            'null' => false
        ]);
        $table_3->addColumn('company_id','integer',['limit'=>11]);
        $table_3->create();

    }

}