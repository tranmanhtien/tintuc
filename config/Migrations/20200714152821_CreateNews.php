<?php
use Migrations\AbstractMigration;

class CreateNews extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('news');
        $table->addColumn('title','string',[
            'default' => null,
            'null' => false]);
        $table->addColumn('description','string',[
            'default' => null,
            'null' => false]);
        $table->addColumn('tag','string',[
            'default' => null,
            'null' => false]);
        $table->addColumn('image','string',[
            'default' => null,
            'null' => false]);
        $table->addColumn('status','string',[
            'default' => null,
            'null' => false]);
        $table->addColumn('hot','string',[
            'default' => null,
            'null' => false]);
        $table->create();
    }
}
