
<?php 
    $this->set('Tittlepage', 'Chi tiết tin');
    $breadcrum = 'Bài viết';
?>
<?= $this->element('page/breadcrumb',['breadcrum' => $breadcrum]) ?>
<!-- ##### Blog Content Area Start ##### -->
<section class="blog-content-area section-padding-0-100">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Blog Posts Area -->
            <div class="col-12">

                <!-- Post Details Area -->
                <div class="single-post-details-area">
                    <div class="post-content">
                        <div class="text-center mb-50">
                            <p class="post-date"><?= $new['created']?> / <?= $new->tag['name']?> </p>
                            <h2 class="post-title"><?= $new['tittle']?></h2>
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <a href="#"><span>by</span> <?= $new->author['name']?></a>
                                <a href="#">03 <span>Comments</span></a>
                            </div>
                        </div>

                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail mb-50">
                            <img src="img/blog-img/8.jpg" alt="">
                        </div>

                        <!-- Post Text -->
                        <div class="post-text">
                            <!-- Share -->
                            <div class="post-share">
                                <span>Share</span>
                                <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#" class="pin"><i class="fa fa-thumb-tack" aria-hidden="true"></i></a>
                            </div>

                            <p><?= $new['description']?></p>

                            <!-- Post Tags & Share -->
                            <div class="post-tags-share">
                                <!-- Tags -->
                                <ol class="popular-tags d-flex flex-wrap">
                                    <?php foreach($tags as $tag){?>
                                        <li><a href="#"><?= $tag->name?></a></li>
                                    <?php }?>
                                </ol>
                            </div>

                            <!-- Related Post Area -->
                            <div class="related-posts clearfix">
                                <!-- Headline -->
                                <h4 class="headline">Bài viết cùng chủ đề</h4>

                                <div class="row">

                                    <!-- Single Blog Post -->
                                    <?php foreach($twonews as $row){?>
                                        <div class="col-12 col-lg-6">
                                            <div class="single-blog-post mb-50">
                                                <!-- Thumbnail -->
                                                <div class="post-thumbnail">
                                                    <a href="<?= $this->Url->build(['controller'=> 'Homes', 'action' =>'detail',$row->id])?>"><img style="width:150px;height:100px" src="/<?= $row->cover_image?>" alt=""></a>
                                                </div>
                                                <!-- Content -->
                                                <div class="post-content">
                                                    <p class="post-date"><?= $row->created?> / <?= $row->tag['name']?></p>
                                                    <a href="<?= $this->Url->build(['controller'=> 'Homes', 'action' =>'detail',$row->id])?>" class="post-title">
                                                        <h4><?= $row->tittle?></h4>
                                                    </a>
                                                    <p class="post-excerpt">
                                                        <?= $this->Text->truncate(
                                                            $row->description,
                                                            100,
                                                            [
                                                                'ellipsis' => '... còn tiếp',
                                                                'exact' => false
                                                            ])
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }?>

                                    

                                </div>
                            </div>

                            <!-- Comment Area Start -->
                            <div class="comment_area clearfix">
                                <h4 class="headline"><?php echo (count($comment)>0)?count($comment):'0'?> Bình luận</h4>                                   
                                <ol>
                                    <?php foreach($comment as $cm){?>
                                        <li class="single_comment_area">
                                            <div class="comment-wrapper d-flex">
                                                <div class="comment-author">
                                                    <img src="/img/img/user.png" alt="">
                                                </div>
                                                <div class="comment-content">
                                                    <span class="comment-date"><?= $cm->created?></span>
                                                    <h5><?= $cm['user']['name']?></h5>
                                                    <p><?= $cm->content?></p>
                                                </div>
                                            </div>
                                        </li>
                                    <?php }?>
                                </ol>
                            </div>

                            <!-- Leave A Comment -->
                            <div class="leave-comment-area clearfix">
                                <div class="comment-form">
                                    <h4 class="headline">Thông tin bình luận</h4>
                                    <?= $this->flash->render()?>
                                    <!-- Comment Form -->
                                    <?php if(!$acc_user): ?>
                                    <?php echo $this->Form->create(NULL,array('url'=>'page/new/comment','type' => 'post'));?>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text"  name='Name' class="form-control" id="contact-name" placeholder="Tên">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="email"  name='Email' class="form-control" id="contact-email" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="content" id="message" cols="30" rows="10" placeholder="Lời bình"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn nikki-btn" disabled >Gửi </button>
                                            </div>
                                        </div>
                                    <?php echo $this->Form->end();?>
                                    <?php else :?>
                                        <?php echo $this->Form->create(NULL,array('url'=>'page/new/comment','type' => 'post'));?>
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" value="<?= $acc_user['name']?>" name='Name' class="form-control" id="contact-name" placeholder="Tên" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <input type="email" value="<?= $acc_user['email']?>" name='Email' class="form-control" id="contact-email" placeholder="Email" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 d-none" >
                                                    <div class="form-group">
                                                        <input  type="text"  name="user_id" value="<?= $acc_user['id']?>">
                                                        <input  type="text"  name="new_id" value="<?= $new['id']?>">
                                                    </div>
                                                </div>
                                            
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="content" id="message" cols="30" rows="10" placeholder="Lời bình"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn nikki-btn"
                                                    <?php echo (!$acc_user)?'disabled':''; ?>
                                                    >Gửi </button>
                                                </div>
                                            </div>
                                        <?php echo $this->Form->end();?>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Blog Content Area End ##### -->

<!-- ##### Instagram Area Start ##### -->
<div class="follow-us-instagram">
    <div class="instagram-content d-flex flex-wrap align-items-center">

        <!-- Single Instagram Slide -->
        <div class="single-instagram">
            <img src="img/blog-img/insta1.jpg" alt="">
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>

        <!-- Single Instagram Slide -->
        <div class="single-instagram">
            <img src="img/blog-img/insta2.jpg" alt="">
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>

        <!-- Single Instagram Slide -->
        <div class="single-instagram">
            <img src="img/blog-img/insta3.jpg" alt="">
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>

        <!-- Single Instagram Slide -->
        <div class="single-instagram">
            <img src="img/blog-img/insta4.jpg" alt="">
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>

        <!-- Single Instagram Slide -->
        <div class="single-instagram">
            <img src="img/blog-img/insta5.jpg" alt="">
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>

        <!-- Single Instagram Slide -->
        <div class="single-instagram">
            <img src="img/blog-img/insta6.jpg" alt="">
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>

        <!-- Single Instagram Slide -->
        <div class="single-instagram">
            <img src="img/blog-img/insta7.jpg" alt="">
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>

        <!-- Single Instagram Slide -->
        <div class="single-instagram">
            <img src="img/blog-img/insta8.jpg" alt="">
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
    </div>
</div>
<!-- ##### Instagram Area End ##### -->