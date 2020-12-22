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
        $table->addColumn('tittle','string',[
            'default' => null,
            'null' => false]);
        $table->addColumn('author_id','integer',[
            'default' => null,
            'null' => false]);
        $table->addColumn('newstype_id','integer',[
            'default' => null,
            'null' => false]);
        $table->addColumn('description','text',[
            'default' => null,
            'null' => true]);
        $table->addColumn('tag_id','integer',[
            'default' => null,
            'null' => false]);
        $table->addColumn('comment_id','integer',[
            'default' => null,
            'null' => true]);
        $table->addColumn('cover_image','string',[
            'default' => null,
            'null' => true]);
        $table->addColumn('status','string',[
            'default' => 0,
            'null' => false]);
        $table->addColumn('hot','integer',[
            'default' => 1,
            'null' => true]);
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
