<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\ltAppAsset;
AppAsset::register($this);
ltAppAsset::register($this);
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
    <?php
//        $this->registerJsFile('js/html5shiv.js', ['position' => \yii\web\View::POS_HEAD, 'condition' => 'lte IE9']);
//        $this->registerJsFile('js/respond.min.js', ['position' => \yii\web\View::POS_HEAD, 'condition' => 'lte IE9']);
    ?>
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<?php $this->beginBody() ?>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +0082 010 2438 3939</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> seteca39@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                    
                        <a href="<?= \yii\helpers\Url::home()?>"><?= Html::img('@web/images/home/logo.svg', ['alt' => '??????7??????'])?></a>
                    </div>
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                ??????
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">?????????</a></li>
                                <li><a href="#">??????</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                ??????
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">????????? ??????</a></li>     
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
<?php if(!Yii::$app->user->isGuest): ?>
    <li><a href="<?= \yii\helpers\Url::to(['/site/logout'])?>"><i class="fa fa-user"></i> <?= Yii::$app->user->identity['username']?> (??????)</a></li>
<?php endif;?>
                            <li><a href="<?= \yii\helpers\Url::to(['wishlist/view']) ?>" > <i class="fa fa-star"></i>???????????????</a></li>  
                            <li><a href="#" onclick="return getCart()"><i class="fa fa-shopping-cart"></i> ?????? ?????????</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['/admin'])?>"><i class="fa fa-lock"></i> ?????????</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="<?= \yii\helpers\Url::home()?>" class="active">?????? ?????????</a></li>
                            <li class="dropdown"><a href="#">?????? ????????????<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                <li><a href="<?= \yii\helpers\Url::to(['category/allcategory']) ?> ">?????? ?????????</a></li>
                               <?= \app\components\BrandsWidget2::widget(); ?>

                              </ul>
                            </li>
                            <li> <a href="<?= \yii\helpers\Url::to(['site/about']) ?> ">?????? ??????</a> </li>
                            <li><a href="<?= \yii\helpers\Url::to(['site/contact']) ?> ">??????</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <form method="get" action="<?= \yii\helpers\Url::to(['category/search'])?>">
                            <input type="text" placeholder="??????" name="q">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<?= $content ?>  <!--INDEX FAILE-->

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>??????</span>7??????</h2>
                    </div>
                </div>
                <div class="col-sm-7">
                 <div class="companyinfo">
                 <h2> ????????? ??? ???????????? ??????????????? </h2>
                </div>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="/images/home/map.png" alt="" />
                        <p>????????? ???????????? 405 ?????? ????????????</p>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>?????????</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="<?= \yii\helpers\Url::to('@web/site/contact') ?>">????????????</a></li> 
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>??????</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="<?= \yii\helpers\Url::to('@web/site/privat') ?>">?????? ?????? ??????</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>???????????? ??????</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="<?= \yii\helpers\Url::to('@web/site/about') ?>">?????? ??????</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright ?? 2021 ??????7??????. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->


<?php
\yii\bootstrap\Modal::begin([
    'header' => '<h2 class="text-secondary">???????????????</h2>',
    'id' => 'wishlist',
    'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">?????? ??????</button>
        <button type="button" class="btn btn-default" onclick="clearWishlist()">?????? ??????</button>'
]);
\yii\bootstrap\Modal::end();
?>

<?php
\yii\bootstrap\Modal::begin([
    'header' => '<h2 class="text-secondary">?????? ??????</h2>',
    'id' => 'cart',
    'size' => 'modal-lg',
    'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">?????? ??????</button>

        <a href="' . \yii\helpers\Url::to(['cart/view']) . '" class="btn  btn-default">?????? ??? ??????</a>
        <button type="button" class="btn btn-default" onclick="clearCart()">?????? ??????</button>'
]);
\yii\bootstrap\Modal::end();
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
