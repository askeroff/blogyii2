<?php
use yii\helpers\Html;

//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
$this->title = "Askerov Javid";
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

    <div class="sidebar-wrap">
        <div class="sidebar">
            <div class="logo">
                <div><a href="/" title="Main page"><img src="/assets/images/me.jpg" class="me-logo"></a>
                    <h6 class="logo-title">Askerov Javid </h6>
                </div>
            </div>
            <div class="cont nav">
                <ul class="nav-menu twelve columns">
                    <li><?= Html::a('Home', ['site/index']) ?></li>
                    <li><?= Html::a('About', ['site/about']) ?></li>
                    <?php if (Yii::$app->user->isGuest) { ?>
                        <li><?= Html::a('Sign up', ['site/signup']) ?></li>
                        <li><?= Html::a('Login', ['site/login']) ?></li>

                    <?php } else { ?>
                        <li><?= Html::a('Logout', ['site/logout'], ['data' => ['method' => 'post']]) ?></li>
                    <?php } ?>
                    <li><?= Html::a('Contact', ['site/contact']) ?></li>
                </ul>
            </div>
            <div class="cont">
                <div class="social">
                    <h3>Social</h3><a href="#"><img src="/assets/images/twitter.png"></a><a href="#">
                        <img src="/assets/images/vk.jpg"></a><a href="#">
                        <img src="/assets/images/googleplus.png"></a>
                </div>
            </div>
            <div class="cont">
                <div class="searchbox">
                    <h3>Search</h3>
                    <input type="text" placeholder="your search" id="searchbox" class="search-box">
                </div>
            </div>

            <div class="cont">
                <div class="searchbox">
                    Built with <a href="https://github.com/askeroff/blogyii2">Maggie CMS</a>
                </div>
            </div>
        </div>
    </div>

    <div class="posts-wrap">
        <h1 class="page-title">About</h1>

        <div class="full-content">
            <?= $content ?>
        </div>
    </div>

</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
