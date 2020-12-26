<?php
namespace App\Test\TestCase\Controller\Page;

use App\Controller\Page\HomesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Page\HomesController Test Case
 *
 * @uses \App\Controller\Page\HomesController
 */
class HomesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Homes',
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
