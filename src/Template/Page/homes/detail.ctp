
<?php $breadcrum = 'Bài viết';?>
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
                                                    <a href="#"><img style="width:150px;height:100px" src="/<?= $row->cover_image?>" alt=""></a>
                                                </div>
                                                <!-- Content -->
                                                <div class="post-content">
                                                    <p class="post-date"><?= $row->created?> / <?= $row->tag['name']?></p>
                                                    <a href="#" class="post-title">
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
                                <h4 class="headline">12 Comments</h4>                                   
                                <ol>
                                    <!-- Single Comment Area -->
                                    <li class="single_comment_area">
                                        <div class="comment-wrapper d-flex">
                                            <!-- Comment Meta -->
                                            <div class="comment-author">
                                                <img src="img/blog-img/9.jpg" alt="">
                                            </div>
                                            <!-- Comment Content -->
                                            <div class="comment-content">
                                                <span class="comment-date">MAY 10, 2018</span>
                                                <h5>Calantha Flower</h5>
                                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi</p>
                                                <a href="#">Like</a>
                                                <a class="active" href="#">Reply</a>
                                            </div>
                                        </div>
                                        <ol class="children">
                                            <li class="single_comment_area">
                                                <div class="comment-wrapper d-flex">
                                                    <!-- Comment Meta -->
                                                    <div class="comment-author">
                                                        <img src="img/blog-img/10.jpg" alt="">
                                                    </div>
                                                    <!-- Comment Content -->
                                                    <div class="comment-content">
                                                        <span class="comment-date">MAY 18, 2018</span>
                                                        <h5>Dianna Agron</h5>
                                                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi</p>
                                                        <a href="#">Like</a>
                                                        <a class="active" href="#">Reply</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
                                    </li>
                                    <li class="single_comment_area">
                                        <div class="comment-wrapper d-flex">
                                            <!-- Comment Meta -->
                                            <div class="comment-author">
                                                <img src="img/blog-img/11.jpg" alt="">
                                            </div>
                                            <!-- Comment Content -->
                                            <div class="comment-content">
                                                <span class="comment-date">MAY 24, 2018</span>
                                                <h5>Chris Hemsworth</h5>
                                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi</p>
                                                <a href="#">Like</a>
                                                <a class="active" href="#">Reply</a>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </div>

                            <!-- Leave A Comment -->
                            <div class="leave-comment-area clearfix">
                                <div class="comment-form">
                                    <h4 class="headline">Leave A Comment</h4>

                                    <!-- Comment Form -->
                                    <form action="#" method="post">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="contact-name" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="contact-email" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Comment"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn nikki-btn">Send Message</button>
                                            </div>
                                        </div>
                                    </form>
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