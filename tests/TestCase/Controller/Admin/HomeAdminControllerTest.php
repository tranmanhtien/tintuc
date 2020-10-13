<?php
namespace App\Test\TestCase\Controller\Admin;

use App\Controller\Admin\HomeAdminController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Admin\HomeAdminController Test Case
 *
 * @uses \App\Controller\Admin\HomeAdminController
 */
class HomeAdminControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.HomeAdmin',
    ];

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
