<?php
/**
 * @var App\View\AppView $this
 */
?>
<section class="hero-area">
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="circle-preloader">
            <div class="a" style="--n: 5;">
                <div class="dot" style="--i: 0;"></div>
                <div class="dot" style="--i: 1;"></div>
                <div class="dot" style="--i: 2;"></div>
                <div class="dot" style="--i: 3;"></div>
                <div class="dot" style="--i: 4;"></div>
            </div>
        </div>
    </div>

    <div class="hero-post-slides owl-carousel">
        <?php foreach($arrSlide as $row){?>
            <!-- Single Hero Post -->
            <div class="single-hero-post d-flex flex-wrap">
                <!-- Post Thumbnail -->
                <div class="slide-post-thumbnail h-100 bg-img" style="background-image: url(/<?= $row->cover_image?>);"></div>
                <!-- Post Content -->
                <div class="slide-post-content h-100 d-flex align-items-center">
                    <div class="slide-post-text">
                        <p class="post-date" data-animation="fadeIn" data-delay="100ms"><?= $row['created']?> / <?= $row->tag['name'] ?></p>
                        <a href="#" class="post-title" data-animation="fadeIn" data-delay="300ms">
                            <h2><?= $row['tittle']?></h2>
                        </a>
                        <p class="post-excerpt" data-animation="fadeIn" data-delay="500ms">
                            <?= $this->Text->truncate(
                                $row['description'],
                                100,
                                [
                                    'ellipsis' => '... ',
                                    'exact' => false
                                ])
                            ?></p>
                        <a href="<?= $this->Url->build(['controller' => 'Homes', 'action' => 'detail',$row->id])?>" class="btn nikki-btn" data-animation="fadeIn" data-delay="700ms">Đọc tiếp</a>
                    </div>
                    <!-- Page Count -->
                    <div class="page-count"></div>
                </div>
            </div>
        <?php }?>
    </div>
</section>