<?php
namespace App\Test\TestCase\Controller\Admin;

use App\Controller\Admin\NewsTypeController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Admin\NewsTypeController Test Case
 *
 * @uses \App\Controller\Admin\NewsTypeController
 */
class NewsTypeControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.NewsType',
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
