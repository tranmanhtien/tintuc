<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?= $Tittlepage ?>    
    </title>

    <!-- Font Icon -->
    <?= $this->Html->css('auth/fonts/material-icon/css/material-design-iconic-font.min.css') ?>

    <!-- Main css -->
    <?= $this->Html->css('auth/style.css') ?>
</head>
<body>

    <div class="main">
        <?= $this->fetch('content') ?>
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <?= $this->Html->script('main.js') ?>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>