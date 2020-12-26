<?php
namespace App\Controller\Admin;
// namespace Cake\Utility;

use App\Controller\Admin\HomeAdminController;
use App\Model\Entity\Author;
use Cake\Database\Type\UuidType;
use Cake\Filesystem\File;
/**
 * @property \App\Model\Table\Author $Author
 * @property \App\Model\Table\Category $Categories
 * @property \App\Model\Table\NewsType $NewsType
 *  @property \App\Model\Table\Tag $Tag
 */

/**
 * News Controller
 *
 */
class NewsController extends HomeAdminController
{
    public function initialize(){
        parent::initialize();
        $this->loadModel('Authors');
        $this->loadModel('Categories');
        $this->loadModel('NewsType');
        $this->loadModel('Tags');
    }

    public function index(){
        $news = $this->paginate($this->News->find()->contain([
            'Authors', 'Tags' , 'NewsType' => ['Categories']
        ]));
       $this->set('news', $news);
    }

    public function add(){
        $arrAth = [];
        $arrCate = [];
        $arrNewType = [];
        $arrTag = [];
        //take authour
        $authours = $this->Authors->find()->toArray();
        foreach($authours as $row){
            $arrAth[$row->id] = $row->name;
        }
        //take Categories
        $Categories = $this->Categories->find()->toArray();
        foreach($Categories as $row){
            $arrCate[$row->id] = $row->name;
        }
        //take NewsType
        $newstype = $this->NewsType->find()->toArray();
        foreach($newstype as $row){
            $arrNewType[$row->id] = $row->name;
        }
         //take Tag
         $tag = $this->Tags->find()->toArray();
         foreach($tag as $row){
             $arrTag[$row->id] = $row->name;
         }
        $new = $this->News->newEntity();
        if($this->request->is('post')){
             if(!empty($this->request->data['cover_image']['name']))
            {
                $fileName = rand(1,999999) .'_'. $this->request->data['cover_image']['name'];
                $uploadPath = 'uploads/images/';
                while(file_exists("uploads/images/".$fileName)){
                    $fileName = rand(1,999999) .'_'. $this->request->data['cover_image']['name'];
                }
                $uploadFile = $uploadPath.$fileName;
                if(move_uploaded_file($this->request->data['cover_image']['tmp_name'],$uploadFile))
                {
                    $this->request->data['cover_image'] = $uploadFile;
                }
            }
           
            $this->News->patchEntity($new , $this->request->data);
            if($this->News->save($new)) {
                $this->Flash->success(__('Đã được lưu'));
                return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error(__('Các trường chưa nhập đủ!'));
            }
        }
        // $this->set(['new','arrAth','arrCate','arrNewType']);
        $this->set('new',$new);
        $this->set('arrAth',$arrAth);
        $this->set('arrCate',$arrCate);
        $this->set('arrNewType',$arrNewType);
        $this->set('arrTag',$arrTag);
    }
    
    public function edit($id){
        $arrAth = [];
        $arrCate = [];
        $arrNewType = [];
        $arrTag = [];
        //take authour
        $authours = $this->Authors->find()->toArray();
        foreach($authours as $row){
            $arrAth[$row->id] = $row->name;
        }
        //take Categories
        $Categories = $this->Categories->find()->toArray();
        foreach($Categories as $row){
            $arrCate[$row->id] = $row->name;
        }
        //take NewsType
        $newstype = $this->NewsType->find()->toArray();
        foreach($newstype as $row){
            $arrNewType[$row->id] = $row->name;
        }
         //take Tag
         $tag = $this->Tags->find()->toArray();
         foreach($tag as $row){
             $arrTag[$row->id] = $row->name;
         }
        $new = $this->News->get($id);
        if($this->request->is('post')){
             if(!empty($this->request->data['cover_image']['name']))
            {
                $fileName = rand(1,999999) .'_'. $this->request->data['cover_image']['name'];
                $uploadPath = 'uploads/images/';
                while(file_exists("uploads/images/".$fileName)){
                    $fileName = rand(1,999999) .'_'. $this->request->data['cover_image']['name'];
                }
                $uploadFile = $uploadPath.$fileName;
                if(move_uploaded_file($this->request->data['cover_image']['tmp_name'],$uploadFile))
                {
                    $this->request->data['cover_image'] = $uploadFile;
                }
            }
           
            // dump($test);die;
            $this->News->patchEntity($new , $this->request->data);
            // pr($new);die;
            if($this->News->save($new)) {
                $this->Flash->success(__('Đã được lưu'));
                return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error(__('Các trường chưa nhập đủ!'));
            }
        }
        // $this->set('new','arrAth','arrCate','arrNewType');
        $this->set('new',$new);
        $this->set('arrAth',$arrAth);
        $this->set('arrCate',$arrCate);
        $this->set('arrNewType',$arrNewType);
        $this->set('arrTag',$arrTag);
    }

    public function delete($id){
        $new = $this->News->get($id);
        $f =  $new['cover_image'];
        $file = new File(WWW_ROOT .$f,false, 0777);
        if($this->News->delete($new)){
            if(file_exists($f)){
                $file->delete();
            }else{
            }
            $this->Flash->success(__('Tin có mã id: {0} đã bị xóa thành công .', h($id)));
            return $this->redirect(['action' => 'index']);
        }
        else{
            $this->Flash->success(__('Xóa không thành công !'));
        }
    }

}
