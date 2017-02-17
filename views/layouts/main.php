<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

//use yii\widgets\Block;
//use yii\bootstrap\SideNav;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Yii-Basic 2F',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

// **************************************************************************************
// **************************************************************************************
//                                                                                     **
//  START  MAin  Vertical  menu-------
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            
            ['label' => 'MyStats', 'url' => ['/site/mydbstart']],
             

            ['label' => 'Register', 'url' => ['/site/registartion'] ,'visible' => (Yii::$app->user->isGuest)]  ,
            ['label' => 'My Page', 'url' => ['/site/mypage']],
            ['label' => 'Admin', 'url' => ['/site/admin']],
            ['label' => 'Calc', 'url' => ['/site/calc']],
            ['label' => 'Split', 'url' => ['/site/split']],
            ['label' => 'Summary', 'url' => ['/site/summary']],
            ['label' => 'Gallery', 'url' => ['/site/gallery']],
            //['label' => 'BStrap', 'url' => ['/site/bstrap']],
            ['label' => 'Geo', 'url' => ['/site/geocoding']],
            ['label' => 'Re-route', 'url' => ['/site/reroute']],

//Start submenu
['label' => 'Sub',  
        'url' => ['#'],
        'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
        'items' => [
            ['label' => 'BStrap', 'url' => ['/site/bstrap']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => 'Another action', 'url' => '#'],
            ['label' => 'Something else here', 'url' => '#'],
            ['label' => 'Additional  action', 'url' => '#'],
        ],
    ],
// END  Submenu           


            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
//  END  MAin  Vertical  menu---------------------
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************  
    ?>



    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>


<!------->
<?php /*Block::begin(array('id'=>'sidebar')); ?>

    <?php

                echo SideNav::widget([
                'type' => SideNav::TYPE_DEFAULT,
                'heading' => Yii::t('app','Party Options'),
                'items' => 
                [
                    [
                        'url' => ['/site/index'],
                        'label' => 'Home',
                        'icon' => 'home'
                    ],
                    ['label' => Yii::t('app','Create'), 'icon'=>'plus', 'url'=>['create']]
                  ]
        ]);
   ?>   
<?php Block::end();*/ ?>
<!--//-->


    </div>
</div>

<footer class="footer">
    <div class="container"> 
        <p class="pull-left">&copy; Yii-basic <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>