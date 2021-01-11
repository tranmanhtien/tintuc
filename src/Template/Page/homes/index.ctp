<?php $this->set('Tittlepage', 'Nikki'); ?>
<?= $this->element('page/slider') ?>
<section class="blog-content-area section-padding-100">
    <div class="container">

        <div class="row justify-content-center">
            <!-- Blog Posts Area -->
            <div class="col-12 col-lg-8">
                <div class="blog-posts-area">
                    <div class="row">

                        <!-- Featured Post Area -->
                        <div class="col-12">
                            <div class="featured-post-area mb-50">
                            <?php $allnew = $news->toArray();
                                $newfirst = array_shift($allnew);
                                // pr($newfirst);
                            ?>
                                <!-- Thumbnail -->
                                <div class="post-thumbnail mb-30">
                                    <a href="<?= $this->Url->build(['controller' => 'Homes', 'action' => 'detail',$newfirst['id']])?>"><img src="/<?= $newfirst['cover_image']?>" alt=""></a>
                                </div>
                                <!-- Featured Post Content -->
                                <div class="featured-post-content">
                                    <p class="post-date"><?= $newfirst['created']?> / <?= $newfirst->tag['name']?></p>
                                    <a href="<?= $this->Url->build(['controller' => 'Homes', 'action' => 'detail',$newfirst['id']])?>" class="post-title">
                                        <h2><?=$newfirst['tittle']?></h2>
                                    </a>
                                    <p class="post-excerpt">
                                        <?= $this->Text->truncate(
                                            $newfirst['description'],
                                            100,
                                            [
                                                'ellipsis' => '... còn tiếp',
                                                'exact' => false
                                            ])
                                        ?>
                                        <?= $acc_user['email']?>
                                    </p>
                                </div>
                                <!-- Post Meta -->
                                <div class="post-meta d-flex align-items-center justify-content-between">
                                    <!-- Author Comments -->
                                    <div class="author-comments">
                                        <a href="#"><span>Tác giả: </span> <?= $newfirst['author']['name']?></a>
                                        <a href="#">03 <span>Comments</span></a>
                                    </div>
                                    <!-- Social Info -->
                                    <div class="social-info">
                                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Blog Post -->
                        <?php foreach($news as $row){?>
                        <div class="col-12 col-sm-6">
                            <div class="single-blog-post mb-50">
                                <!-- Thumbnail -->
                                <div class="post-thumbnail">
                                    <a href="<?= $this->Url->build(['controller' => 'Homes', 'action' => 'detail',$row->id])?>"><img style="width:300px;height:200px;" src="/<?= $row->cover_image?>" alt=""></a>
                                </div>
                                <!-- Content -->
                                <div class="post-content">
                                    <p class="post-date"><?= $row->created?> / <?= $row->tag['name'] ?></p>
                                    <a href="<?= $this->Url->build(['controller' => 'Homes', 'action' => 'detail',$row->id])?>" class="post-title">
                                        <h4>
                                        <?= $row->tittle?>
                                        </h4>
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

                <!-- Pager -->
                <ol class="nikki-pager">
                    <li><a href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Mới hơn</a></li>
                    <li><a href="#">Cũ hơn <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                </ol>
            </div>

            <!-- Blog Sidebar Area -->
            <div class="col-12 col-sm-9 col-md-6 col-lg-4">
                <div class="post-sidebar-area">

                    <!-- ##### Single Widget Area ##### -->
                    <div class="single-widget-area mb-30">
                        <!-- Title -->
                        <div class="widget-title">
                            <h6>Giới thiệu</h6>
                        </div>
                        <!-- Thumbnail -->
                        <div class="about-thumbnail">
                            <img src="/img/img/blog-img/about-me.jpg" alt="">
                        </div>
                        <!-- Content -->
                        <div class="widget-content text-center">
                            <img src="/img/img/core-img/signature.png" alt="">
                            <p>Nikki là một trang web luôn mang đến cho bạn những thông tin mới nhất, chính xác nhất trong nước lẫn ngoài nước</p>
                        </div>
                    </div>

                    <!-- ##### Single Widget Area ##### -->
                    <div class="single-widget-area mb-30">
                        <!-- Title -->
                        <div class="widget-title">
                            <h6>Đăng ký &amp; Theo dõi</h6>
                        </div>
                        <!-- Widget Social Info -->
                        <div class="widget-social-info text-center">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-rss"></i></a>
                        </div>
                    </div>

                    <!-- ##### Single Widget Area ##### -->
                    <div class="single-widget-area mb-30">
                        <!-- Title -->
                        <div class="widget-title">
                            <h6>Bài viết mới nhất</h6>
                        </div>
                        <!-- Single Latest Posts -->
                        <?php foreach($newpopular as $row){?>
                            <div class="single-latest-post d-flex">
                                <div class="post-thumb">
                                    <img style="width:120px;height:70px" src="/<?= $row->cover_image?>" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="<?= $this->Url->build(['controller' => 'Homes', 'action' => 'detail',$row->id])?>" class="post-title">
                                        <h6><?= $row->tittle?></h6>
                                    </a>
                                    <a href="<?= $this->Url->build(['controller' => 'Homes', 'action' => 'detail',$row->id])?>" class="post-author"><span>Tác giả: </span> <?= $row->author['name']?></a>
                                </div>
                            </div>
                        <?php } ?>

                    </div>

                    <!-- ##### Single Widget Area ##### -->
                    <div class="single-widget-area mb-30">
                        <!-- Adds -->
                        <a href="#"><img src="img/blog-img/add.png" alt=""></a>
                    </div>

                    <!-- ##### Single Widget Area ##### -->
                    <div class="single-widget-area mb-30">
                        <!-- Title -->
                        <div class="widget-title">
                            <h6>Bản tin</h6>
                        </div>
                        <!-- Content -->
                        <div class="newsletter-content">
                            <p>Đăng ký bản tin của chúng tôi để nhận thông báo về các bản cập nhật mới, chiết khấu thông tin, ...</p>
                            <form action="#" method="post">
                                <input type="email" name="email" class="form-control" placeholder="email của bạn">
                                <button><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>

                    <!-- ##### Single Widget Area ##### -->
                    <div class="single-widget-area mb-30">
                        <!-- Title -->
                        <div class="widget-title">
                            <h6>Thẻ phổ biến</h6>
                        </div>
                        <!-- Tags -->
                        <ol class="popular-tags d-flex flex-wrap">
                            <?php foreach($tags as $tag){?>
                                <li><a href="<?= $this->Url->build(['controller' => 'Homes','action' => 'newtag',$tag->id])?>"><?= $tag->name?></a></li>
                            <?php }?>
                          
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>