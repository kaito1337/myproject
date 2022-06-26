<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap4\ActiveForm;
use app\models\RegisterForm;
use yii\bootstrap4\Html;
// use yii\widgets\Pjax; 

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>


    <? /*Pjax::begin([
        'enablePushState' => false,
        'enableReplaceState' => false,
        'timeout' => 5000,
        ]); */ // метод валидации через pjax ?> 
        <div class="row">
            <div class="col-lg-5">
            
                <?php $form = ActiveForm::begin(['id' => 'register-form', 'enableAjaxValidation' => true]); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'surname') ?>

                    <?= $form->field($model, 'patronymic') ?>

                    <?= $form->field($model, 'login') ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'password_repeat')->passwordInput() ?>

                    <?= $form->field($model, 'rules')->checkbox() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    <? // Pjax::end(); ?>
</div>
