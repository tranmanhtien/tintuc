<?php
use Migrations\AbstractSeed;

/**
 * Categories seed.
 */
class CategoriesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'    => 'Xã hội',
                'name_unsigned' => 'Xa-hoi',
            ],
            [
                'name'    => 'Pháp luật',
                'name_unsigned' => 'Phap-luat',
            ]
        ];

        $table = $this->table('categories');
        $table->insert($data)->save();
    }
}
