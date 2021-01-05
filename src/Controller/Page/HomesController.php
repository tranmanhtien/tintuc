<?php
namespace App\Controller\Page;

use App\Controller\AppController;

use App\Model\Entity\News;

/**
 * Homes Controller
 *
 */
class HomesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Authors');
        $this->loadModel('Categories');
        $this->loadModel('NewsType');
        $this->loadModel('Tags');
        $this->loadModel('News');
        $this->loadComponent('Paginator');
        // take data show to menu
        $newtypemenu = $this->NewsType->find();
        $this->set('newtypemenu',$newtypemenu);
    }
    public $paginate = [
        'limit' => 5
    ];
    public function index(){
        $arrSlide = [];
        $news = $this->Paginator->paginate($this->News->find()->contain(['Authors', 'Tags' , 'NewsType' => ['Categories']])->order(['News.created' => 'DESC']));
        $newpopular = $this->News->find()->contain(['Authors', 'Tags' , 'NewsType' => ['Categories']])->where(['hot' => 1])->order(['News.created' => 'DESC'])->limit(5);
        $arrSlide = $this->News->find()->contain(['Authors', 'Tags' , 'NewsType' => ['Categories']])->where(['hot' => 1])->order(['News.created' => 'DESC'])->limit(3);
        
     
     

        //take tags
        $tags = $this->Tags->find();

       
        $this->set('tags',$tags);
        $this->set('news',$news);
        $this->set('newpopular',$newpopular);
        $this->set('arrSlide',$arrSlide);
    }
    public function detail($id){
        $new = $this->News->get($id,[
            'contain' => array('Authors', 'Tags' , 'NewsType' => ['Categories'])
        ]);
        // take two news with tag
        $twonews = $this->News->find()->contain(['Authors', 'Tags' , 'NewsType' => ['Categories']])->where(['News.tag_id' => $new->tag_id,'News.id !=' => $id])->order(['News.created' => 'DESC'])->limit(2);
        //take tags
        $tags = $this->Tags->find();
        $this->set('tags',$tags);
        $this->set('new',$new);
        $this->set('twonews',$twonews);
    }
    //search news by newtype
    public function newType($type_id){
        $this->paginate = [
            'limit' => 6
        ];
        $news = $this->Paginator->paginate($this->News->find()->contain(['Authors', 'Tags' , 'NewsType' => ['Categories']])->where(['News.newstype_id' => $type_id])->order(['News.created' => 'DESC']));
        $newpopular = $this->News->find()->contain(['Authors', 'Tags' , 'NewsType' => ['Categories']])->where(['hot' => 1])->order(['News.created' => 'DESC'])->limit(5);
        $nametype = $this->NewsType->get($type_id);
        // take name category
        $namecate = $this->Categories->find();
        //take tags
        $tags = $this->Tags->find();
        $this->set('tags',$tags);

        $this->set('namecate',$namecate);
        $this->set('news',$news);
        $this->set('nametype',$nametype);
        $this->set('newpopular',$newpopular);
    }
    //search news by tag
    public function newTag($tag_id){
        $this->paginate = [
            'limit' => 6
        ];
        $news = $this->Paginator->paginate($this->News->find()->contain(['Authors', 'Tags' , 'NewsType' => ['Categories']])->where(['News.tag_id' => $tag_id])->order(['News.created' => 'DESC']));
        $this->set('news',$news);  
    }
    //search news by category
    public function newCategory($cate_id){

    }
}
