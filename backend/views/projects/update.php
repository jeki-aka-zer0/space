<?php

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = 'Редактирование проекта: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Проекты', 'url' => ['/projects/index']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="project-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
