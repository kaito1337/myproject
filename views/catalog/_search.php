<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-md-6">
        <div>Сортировать по:
            <div class="sort-item" ><?= $dataProvider->sort->link('title')?>
            <?= $dataProvider->sort->link('price')?>
            <?= $dataProvider->sort->link('year')?>
            </div>
        </div>
    </div>    
</div>
