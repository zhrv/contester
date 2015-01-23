<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use app\assets\AppAsset;
use app\widgets\Alert;

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
        'brandLabel' => 'Contester',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Главная', 'url' => ['contest/index']],
            ['label' => 'Языки', 'url' => ['lang/index']],
             Yii::$app->user->isGuest ?
                ['label' => 'Войти', 'url' => ['site/login']] :
                ['label' => 'Выйти (' . Yii::$app->user->identity->login . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <div class="site-index">

            <div class="body-content">

                <div class="row">
                    <div class="col-lg-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">Действия</div>
                            <div class="panel-body">

                                <?php
                                    echo Menu::widget([
                                        'items' => isset($this->params['menu']) ? $this->params['menu'] : [],
                                    ]);

                                ?>
                            </div>
                        </div>




                    </div>
                    <div class="col-lg-9">
                        <?= Alert::widget([
                            'options' => [
                                'class' => 'alert-info',
                            ],
                        ]) ?>
                        <?= $content ?>
                    </div>

                </div>

            </div>
        </div>

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
