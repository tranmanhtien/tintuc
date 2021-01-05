<?php
namespace App\Controller\Admin;

use App\Controller\Admin\HomeAdminController;

/**
 * Ajax Controller
 *
 */
class AjaxController extends HomeAdminController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('NewsType');
        $this->loadModel('Categories');
    }

    public function loadNewtype($category_id){
        $newtype = $this->NewsType->find()->where(['category_id' => $category_id]);
        foreach($newtype as $row){
            echo "<option value='". $row->id ."'>". $row->name ."</option>";
        }
    }
}
