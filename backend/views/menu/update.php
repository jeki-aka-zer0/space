<?php

/* @var $this yii\web\View */
/* @var $model app\models\Menu */

$this->title = 'Редактирование меню: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Меню', 'url' => ['/menus/index']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="menu-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
