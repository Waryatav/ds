<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

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
    <link rel="shortcut icon" href="theme/ds/img/favicon.png" type="image/png">
</head>
<body>
<?php $this->beginBody() ?>


<section class="header">
    <div class="container">
<!--        <a target="_blank" class="vk-link" href="--><?//= \common\models\db\KeyValue::find()->where(['key'=>'social_link_vk'])->one()->value;?><!--"><span class="vk-icon"></span>Мы в социальных сетях</a>-->
        <a target="_blank" class="personal-kabinet" href="<?= \common\models\db\KeyValue::find()->where(['key'=>'social_link_vk'])->one()->value;?>"><span style="float: none;" class="vk-icon"></span>Мы в социальных сетях</a>
        <div class="header-menu">
            <div class="left">
                <a href="/"><span class="">
          <img src="theme/ds/img/icon/main-icon.png" alt="">
          <p>Главная</p>
        </span>

                </a>
                <a href="<?= Url::to(['/pages/default/pages','slug'=>'kursy']);?>"><span class="">
          <img src="theme/ds/img/icon/courses-icon.png" alt="">
          <p>Курсы</p>
        </span></a>
            </div>
            <a href="/" class="logo"><span class="logo-pic"></span>Сила <br>Фокуса Внимания</a>
            <div class="right">
                <a href="<?= Url::to(['/pages/default/pages','slug'=>'otzyvy']);?>"><span class="">
          <img src="theme/ds/img/icon/news-icon.png" alt="">
          <p>Отзывы</p>
        </span></a>
                <a href="<?= Url::to(['/pages/default/pages','slug'=>'skachat-knigu-i-besplatnye-kursy']);?>"><span class="">
          <img src="theme/ds/img/icon/about-icon.png" alt="">
          <p>Скачать книгу и бесплатные курсы</p>
        </span></a>
            </div>
        </div>
        <button class="toggle_mnu">
      <span class="sandwich">
        <span class="sw-topper"></span>
        <span class="sw-bottom"></span>
        <span class="sw-footer"></span>
      </span>
        </button>
        <ul class="mobile-menu">
            <li><a href="/">Главная</a></li>
            <li><a href="<?= Url::to(['/pages/default/pages','slug'=>'kursy']);?>">Курсы</a></li>
            <li><a href="<?= Url::to(['/pages/default/pages','slug'=>'otzyvy']);?>">Отзывы</a></li>
            <li><a href="<?= Url::to(['/pages/default/pages','slug'=>'skachat-knigu-i-besplatnye-kursy']);?>">Скачать книгу и бесплатные курсы</a></li>
        </ul>
    </div>
</section>

<?= $content;?>


<footer class="footer">
    <div class="container">
        <div class="footer__left">
            <div class="txt">
                <p>
                    &copy; 2016 Все права защищены. Использование материалов сайта без разрешения администрации запрещено.
                </p>
            </div>
        </div>
        <div class="footer__right">
            <a href="http://intera-media.ru/" target="_blank" class="thumb">
                <img src="theme/ds/img/inter.png" alt="null">
            </a>
            <div class="txt">
                <p>Разработка и поддержка сайтов любой сложности</p>
            </div>
        </div>
        <a href="#" id='Go_Top'><img alt="up" src="theme/ds/img/icon/up.png"></a>
    </div>
</footer>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
