<?php

use app\models\Text;
use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->params['breadcrumbs'][] = $this->title = 'Тексты';

?>
<div class="text-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'name',
                'format' => 'raw',
            ],
            'language_code',
            [
                'attribute' => 'status',
                'value' => function (Text $model): string {
                    return $model->status === 'draft' ? 'Черновик' : 'Активен';
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>

</div>
