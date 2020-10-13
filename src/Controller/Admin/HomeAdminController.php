<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

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

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }
    public function index(){
    }
}
