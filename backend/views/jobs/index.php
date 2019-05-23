<?php

use app\models\Job;
use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->params['breadcrumbs'][] = $this->title = 'Вакансии';

?>
<div class="job-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'language_code',
            'experience',
            [
                'attribute' => 'status',
                'value' => function (Job $model): string {
                    return $model->status === 'draft' ? 'Черновик' : 'Активна';
                },
            ],
            'sort',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>

</div>
