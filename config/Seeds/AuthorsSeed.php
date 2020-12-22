<?php
use Migrations\AbstractSeed;

/**
 * Authors seed.
 */
class AuthorsSeed extends AbstractSeed
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
                'name'    => 'Kim Đồng',
                'address' => 'Số 123,Hoàng Hoa Thám,Hà Nội',
            ],
            [
                'name'    => 'Bông Hoa',
                'address' => 'Số 1,Nam Ngư,Hà Nội',
            ]
        ];
        $table = $this->table('authors');
        $table->insert($data)->save();
    }
}
