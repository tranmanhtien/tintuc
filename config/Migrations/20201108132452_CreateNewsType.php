<?php
use Migrations\AbstractMigration;

class CreateNewsType extends AbstractMigration
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
        $table = $this->table('news_type');
        $table->addColumn('name','string',[
            'default' => null
        ]);
        $table->addColumn('name_unsigned','string',[
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('category_id','integer',[
            'default' => null
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
