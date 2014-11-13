<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LoginForm */

$this->title = 'Привет, мир!';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::encode($message) ?>
</div>
