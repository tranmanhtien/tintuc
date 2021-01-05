<?php
namespace App\Test\TestCase\Controller\Admin;

use App\Controller\Admin\AjaxController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Admin\AjaxController Test Case
 *
 * @uses \App\Controller\Admin\AjaxController
 */
class AjaxControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Ajax',
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
