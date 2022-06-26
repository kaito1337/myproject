<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$this->registerCssFile("@web/css/catalog.css");
?>
<div class="product-view">

    <h1 class='text-center'><?= Html::encode($this->title) ?></h1>
    <div class = 'n-flex'>
    <?= Html::img("@web/img/{$model->image}", ['class' => "card-image", 'alt' => "Картинка"]) ?>
    </div>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',    
            'price',
            'year',
            'country',
            'model',
            'count',
        ],
    ]) ?>
    <? !Yii::$app->user->isGuest && !Yii::$app->user->identity->isAdmin ?
    Html::a('В корзину', ['cart/add','id' => $model->id], ['class' => "btn btn-success"]) : ''
    ?>
   <?= Html::a('Вернуться в каталог',['index','id' => $id], ['class' => 'btn btn-primary']) ?>

</div>

