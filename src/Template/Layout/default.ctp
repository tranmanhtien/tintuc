<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Nikki - Blog &amp; Magazine Template</title>

    <!-- Favicon -->
    <link rel="icon" href="img/img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <?= $this->Html->css('page/style.css') ?>

</head>
<body>
 <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="nikki-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container-fluid">
                    <!-- Menu -->
                    <?= $this->element('page/menu') ?>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Blog Content Area Start ##### -->
        <?= $this->fetch('content') ?>
    <!-- ##### Blog Content Area End ##### -->

    <!-- ##### Instagram Area Start ##### -->
    
    <!-- ##### Instagram Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?= $this->element('page/footer') ?>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <?= $this->Html->script('jquery-2.2.4.min.js') ?>
    <!-- Popper js -->
    <?= $this->Html->script('popper.min.js') ?>
    <!-- Bootstrap js -->
    <?= $this->Html->script('bootstrap.min.js') ?>
    <!-- All Plugins js -->
    <?= $this->Html->script('plugins.js') ?>
    <!-- Active js -->
    <?= $this->Html->script('active.js') ?>
</body>
</html>
