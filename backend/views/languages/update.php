<?php

/* @var $this yii\web\View */
/* @var $model app\models\Language */

$this->title = 'Редактирование языка: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Языки', 'url' => ['/languages/index']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="language-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
