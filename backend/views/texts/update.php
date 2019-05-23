<?php

/* @var $this yii\web\View */
/* @var $model app\models\Text */

$this->title = 'Редактирование текста: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Тексты', 'url' => ['/texts/index']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="text-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
