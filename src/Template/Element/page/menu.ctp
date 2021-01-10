<?php
/**
 * @var App\View\AppView $this
 */

use Composer\Util\Url;

?>
  <nav class="classy-navbar justify-content-between" id="nikkiNav">

<!-- Nav brand -->
<a href="index.html" class="nav-brand"><img src="/img/img/core-img/logo.png" alt=""></a>

<!-- Navbar Toggler -->
<div class="classy-navbar-toggler">
    <span class="navbarToggler"><span></span><span></span><span></span></span>
</div>

<!-- Menu -->
<div class="classy-menu">

    <!-- close btn -->
    <div class="classycloseIcon">
        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
    </div>

    <!-- Nav Start -->
    <div class="classynav">
        <ul>
            <li><a href="<?= $this->Url->build('page')?>">Trang chủ</a></li>
            <li><a href="#">Thể loại</a>
                <div class="megamenu">
                    <ul class="single-mega cn-col-4">
                        <?php foreach($newtypemenu as $row){?>
                            <li><a href="<?= $this->Url->build(['controller' => 'Homes', 'action' => 'newtype', $row->id]);?>">- <?= $row->name?></a></li>
                        <?php }?>
                    </ul>
                </div>
            </li>
            <li><a href="<?= $this->Url->build('/page/aboutus')?>">Giới thiệu</a></li>
            <li><a href="<?= $this->Url->build('/page/contact')?>">Liên hệ</a></li>
        </ul>

        <!-- Search Form -->
        <div class="search-form">
            <?php echo $this->Form->create(NULL,array('url'=>'page/search','type' => 'get'));?>
                <!-- <form action="page/search" method="get" enctype="multipart/form-data"> -->
                    <input type="search" name="search" class="form-control" placeholder="Tìm kiếm...">
                    <button type="submit"><i class="fa fa-search"></i></button>
                <!-- </form> -->
            <?php echo $this->Form->end();?>
        </div>

        <!-- Social Button -->
        <div class="top-social-info">
            <?php if (!$acc_user) : ?>
                <a class="btn btn-outline-secondary" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login']) ?>">Đăng nhập</a>
            <?php else: ?>
            <a href="<?= $this->Url->build('page/profile/' . $acc_user['id'])?>" ><?= $acc_user['name']?></a>
            <a class="btn btn-outline-secondary" href="<?= $this->Url->build('page/logout' )?>" >Đăng xuất</a>
            <?php endif;?>
        </div>

    </div>
    <!-- Nav End -->
</div>
</nav>
