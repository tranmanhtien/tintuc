<?php 
    $this->set('Tittlepage', 'Thẻ nhãn');
    $breadcrum = 'Thẻ nhãn';
?>
<?= $this->element('page/breadcrumb',['breadcrum' => $breadcrum]) ?>
<!-- ##### Blog Content Area Start ##### -->
<section class="blog-content-area section-padding-0-100">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Blog Posts Area -->
            <div class="col-12 col-lg-8">
                <div class="blog-posts-area">
                    <div class="row">
                        
                        <!-- Section Heading -->
                        <div class="col-12">
                            <div class="section-heading">
                                <h2><?= $nametag->name?></h2>
                                <p>Thẻ nhãn: <?= $nametag->name?></p>
                            </div>
                        </div>

                        <!-- Single Blog Post -->
                        <?php foreach($news as $row){?>
                            <div class="col-12 col-lg-6">
                                <div class="single-blog-post mb-50">
                                    <!-- Thumbnail -->
                                    <div class="post-thumbnail">
                                        <a href="<?= $this->Url->build(['controller' => 'Homes', 'action' => 'detail',$row->id])?>"><img style="width:350px;height:250px" src="/<?= $row->cover_image?>" alt=""></a>
                                    </div>
                                    <!-- Content -->
                                    <div class="post-content">
                                        <p class="post-date"><?= $row->created?> / <?= $row->tag['name']?></p>
                                        <a href="<?= $this->Url->build(['controller' => 'Homes', 'action' => 'detail',$row->id])?>" class="post-title">
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
                    <div class="single-widget-area mb-50">
                        <form class="search-form" action="#" method="post">
                            <input type="search" name="search" class="form-control" placeholder="Tìm kiếm...">
                            <button><i class="fa fa-send"></i></button>
                        </form>
                    </div>

                    <!-- ##### Single Widget Area ##### -->
                    <div class="single-widget-area mb-30">
                        <!-- Title -->
                        <div class="widget-title">
                            <h6>Thể loại</h6>
                        </div>
                        <ol class="nikki-catagories">
                            <?php foreach($namecate as $row){?>
                                <li><a href="<?= $this->Url->build(['controller' => 'Homes', 'action' => 'newcategory',$row->categories['id']])?>"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?= $row->categories['name']?></span> <span>(<?= $row->count?>)</span></a></li>
                            <?php }?>
                        </ol>
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
                        <!-- Title -->
                        <div class="widget-title">
                            <h6>Thẻ phổ biến</h6>
                        </div>
                        <!-- Tags -->
                        <ol class="popular-tags d-flex flex-wrap">
                            <?php foreach($tags as $tag){?>
                                <li><a href="<?= $this->Url->build(['controller' => 'Homes', 'action' => 'newtag',$tag->id])?>"><?= $tag->name?></a></li>
                            <?php }?>
                        </ol>
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