<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'О нас';
$this->registerCssFile("@web/css/about.css");
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p style="text-align:justify">
    Компания «Copy Star» занимается обслуживанием физических и юридических лиц и дает возможность приобретать любой товар в любом количестве из всего огромного ассортимента,
представленного на сайте компании.
Индивидуальный подход к каждому клиенту и выделение персонального
менеджера по продажам позволяет подобрать наиболее эффективное решение
и обеспечить достойный сервис, отвечающий всем пожеланиям.
    </p>
<p>
    <h2 id="deviz">Пока принтер печатает — вы отдыхаете!  </h2>
</p>
</div>
<h3 id="newcom">Новинки компании </h3>
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
  </ol>
  <div class="carousel-inner">
<?php foreach($rows as $key => $row): ?>
<?php $active= !$key ? "active" : ""?> 
    <div class="carousel-item <?=$active ?>"  >
    <h5 class="title-item"> <?= $row['title']?></h5>
        <?= Html::img("@web/img/{$row['image']}", ['class' => 'd-block w-100 img-item', 'alt' => 'Картинка продукта']) ?>
    </div>
    <? endforeach ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Предыдущий</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Следующий</span>
  </a>
