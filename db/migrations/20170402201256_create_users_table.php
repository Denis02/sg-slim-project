<?php

use Phinx\Migration\AbstractMigration;

class CreateUsersTable extends AbstractMigration
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
        $this->table('users')
            ->addColumn('email', 'string', array('limit' => 100))
            ->addColumn('password', 'string', array('limit' => 40))
            ->addColumn('name', 'string', array('limit' => 30))
            ->addColumn('surname', 'string', array('limit' => 30))
            ->addColumn('birthday', 'date')
            ->addColumn('phone', 'string', array('limit' => 20))
            ->addColumn('address', 'string')
            ->addColumn('about_me', 'text')
            ->addIndex(array('email'), array('unique'=>TRUE))
            ->create();
    }
}
