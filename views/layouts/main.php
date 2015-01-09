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
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'PTasks',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            if (Yii::$app->user->isGuest)
            {
                $isGuest = [['label' => 'Главная', 'url' => ['/site/index']],
                    ['label' => 'Задачи', 'url' => ['/site/about']],
                    ['label' => 'Настройки', 'url' => ['/site/contact']],
                    ['label' => 'Войти', 'url' => ['/site/login']],
                    ['label' => 'Регистрация', 'url' => ['/users/registration']]];
}
            else
            {
                $isGuest = [['label' => 'Главная', 'url' => ['/site/index']],
                    ['label' => 'Задачи', 'url' => ['/site/about']],
                    ['label' => 'Настройки', 'url' => ['/site/contact']],
                    ['label' => 'Выйти (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']]];
            }
                        
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $isGuest,
                ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
