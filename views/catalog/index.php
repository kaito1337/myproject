<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Каталог';
$this->registerCssFile("@web/css/catalog.css");
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index", id = "block-pjax-catalog">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin([
        'enablePushState' => false, 
        'timeout' => 5000,
        'id' => 'pjaxcatalog',
    ]); 
    ?>
    <?php echo $this->render('_search', ['model' => $searchModel,
        'categories' => $categories, 'dataProvider' => $dataProvider,
    ]); 
    ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'layout' => '{pager}<div class ="row">{items}</div>{pager}',
        'pager' => ['class' => \yii\bootstrap4\LinkPager::class],
        'itemView' => function ($model, $key, $index, $widget) {
            $card = "<div class=\"card\" style=\"width: 18rem;\">"
        . Html::a(Html::img("@web/img/{$model->image}", ['class' => "card-img", 'alt' => "Картинка к карточке"]), ['view','id' => $model->id])
    . "<div class=\"card-body\">"
    . "<h5 class=\"card-title\">"

    . Html::a(Html::encode($model->title),['view','id' => $model->id])
    . "</h5>"
    . "<p class=\"card-text\">Цена: {$model->price} рублей</p>"
    . "</div>"
    . ( !Yii::$app->user->isGuest && !Yii::$app->user->identity->isAdmin ?
    Html::a('В корзину', ['cart/add','id' => $model->id], ['class' => "btn btn-success"]) : '')
    . "</div>";
            return $card;
        },
    ]) ?>

    <?php Pjax::end(); ?>

</div>
