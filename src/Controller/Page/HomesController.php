<?php
namespace App\Controller\Page;

use App\Controller\AppController;
use App\Model\Entity\News;
use Cake\Event\Event;

/**
 * Homes Controller
 *
 */
class HomesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
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
                    'controller' => 'Homes',
                    'action' => 'index'
            ]
            ]
        );
        $this->set('acc_user', $this->Auth->user());
        $this->loadModel('Authors');
        $this->loadModel('Categories');
        $this->loadModel('NewsType');
        $this->loadModel('Tags');
        $this->loadModel('News');
        $this->loadComponent('Paginator');
       
        // take data show to menu
        $newtypemenu = $this->NewsType->find();
        $newpopular = $this->News->find()->contain(['Authors', 'Tags' , 'NewsType' => ['Categories']])->where(['hot' => 1])->order(['News.created' => 'DESC'])->limit(5);  
       
        //count new by category
        $namecate = $this->News->find()->contain(['Authors', 'Tags' , 'NewsType' => ['Categories']]);
        $namecate->select([
            'categories.name','categories.id',
            'count' => $namecate->func()->count('news.id')
        ])
        ->group('categories.name');
        // debug($query);die;

        //take tags
        $tags = $this->Tags->find();
        $this->set('tags',$tags);
        $this->set('newtypemenu',$newtypemenu);
        $this->set('newpopular',$newpopular);
        $this->set('namecate',$namecate); 
    }
    public $paginate = [
        'limit' => 5
    ];
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['index','register']);
    }
    public function index(){
        $arrSlide = [];
        $news = $this->Paginator->paginate($this->News->find()->contain(['Authors', 'Tags' , 'NewsType' => ['Categories']])->order(['News.created' => 'DESC']));
        $arrSlide = $this->News->find()->contain(['Authors', 'Tags' , 'NewsType' => ['Categories']])->where(['hot' => 1])->order(['News.created' => 'DESC'])->limit(3);
        
        $this->set('news',$news);
        $this->set('arrSlide',$arrSlide);
    }
    public function detail($id){
        $new = $this->News->get($id,[
            'contain' => array('Authors', 'Tags' , 'NewsType' => ['Categories'])
        ]);
        // take two news with tag
        $twonews = $this->News->find()->contain(['Authors', 'Tags' , 'NewsType' => ['Categories']])->where(['News.tag_id' => $new->tag_id,'News.id !=' => $id])->order(['News.created' => 'DESC'])->limit(2);
        $this->set('new',$new);
        $this->set('twonews',$twonews);
    }
    //search news by newtype
    public function newType($type_id){
        $this->paginate = [
            'limit' => 6
        ];
        $news = $this->Paginator->paginate($this->News->find()->contain(['Authors', 'Tags' , 'NewsType' => ['Categories']])->where(['News.newstype_id' => $type_id])->order(['News.created' => 'DESC']));
       
        $nametype = $this->NewsType->get($type_id);
        $this->set('news',$news);
        $this->set('nametype',$nametype);
    }
    //search news by tag
    public function newTag($tag_id){
        $this->paginate = [
            'limit' => 6
        ];
        $news = $this->Paginator->paginate($this->News->find()->contain(['Authors', 'Tags' , 'NewsType' => ['Categories']])->where(['News.tag_id' => $tag_id])->order(['News.created' => 'DESC']));
        // take name tag
        $nametag = $this->Tags->get($tag_id);
        $this->set('nametag',$nametag);
        $this->set('news',$news);  
    }
    //search news by category
    public function newCategory($cate_id){
        $this->paginate = [
            'limit' => 6
        ];
        $news = $this->News->find()->contain(['Authors', 'Tags' , 'NewsType' => ['Categories']])->where(['NewsType.category_id' => $cate_id])->order(['News.created' => 'DESC'])->toArray();
        // pr($news);die;
        
        // take name tag
        $namecate_current = $this->Categories->get($cate_id);
        $this->set('namecate_current',$namecate_current);
        $this->set('news',$news); 
    }

    //about
    public function About(){

    }
     //contact
     public function Contact(){
        
    }

    //search new
    public function searchNew(){
        $this->paginate = [
            'limit' => 6
        ];
        $keysearch = $this->request->getQuery('search');
        $data = $this->Paginator->paginate($this->News->find()->contain(['Authors', 'Tags' , 'NewsType' => ['Categories']])
        ->where(['News.tittle like'=> '%'.$keysearch.'%'])
        ->orWhere(['News.description like'=> '%'. $keysearch.'%']));
        $this->set('data',$data);
        $this->set('keysearch',$keysearch);

    }
}
