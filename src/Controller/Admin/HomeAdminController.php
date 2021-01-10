<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * HomeAdmin Controller
 *
 */
class HomeAdminController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->viewBuilder()->setLayout('admin');
        $this->loadComponent('Flash');
        $this->loadComponent('Paginator');

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        $this->loadModel('News');
        $this->loadComponent('Auth',
            ['authenticate'=>[
                'Form'=>[
                    'fields' => [
                            'username' => 'email',
                            'password' => 'password'
                        ]
                    ]
                ],
                'loginAction' => [
                    'controller' => 'Users',
                    'action' => 'login'
                ],
                'loginRedirect' => [
                    'controller' => 'HomeAdmin',
                    'action' => 'index'
            ]
        ]);
        $this->set('admin_user', $this->Auth->user());
        
    }
    public $paginate = [
        'limit' => 5
    ];
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['register']);
    }
    public function index(){
    }
}
