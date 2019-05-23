<?php

/* @var $this yii\web\View */
/* @var $model app\models\Job */

$this->title = 'Редактирование вакансии: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Вакансии', 'url' => ['/jobs/index']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="job-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
