<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="<?= Yii::$app->homeUrl ?>css/prettify.css" type="text/css" rel="stylesheet" />
    <script src="<?= Yii::$app->homeUrl ?>js/google-code-prettify/prettify.js"></script>
</head>
<body onload="prettyPrint()">

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Турниры',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    Yii::$app->user->isGuest ?
                        ['label' => 'Войти', 'url' => ['/user/login']] :
                        [
                            'encode' => false,
                            'label' => '<i class="glyphicon glyphicon-user"></i> '. Yii::$app->user->identity->login,
                            'items' => [
                                [
                                    'label' => 'Профиль',
                                    'url' => ['/user/update'],
                                    'linkOptions' => ['data-method' => 'post'],
                                ],
                                [
                                    'label' => 'Выйти',
                                    'url' => ['/user/logout'],
                                    'linkOptions' => ['data-method' => 'post'],
                                ],
                            ],
                        ],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'homeLink' => ['label' => 'Главная', 'link' => Yii::$app->homeUrl],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; ФМиИТ <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
