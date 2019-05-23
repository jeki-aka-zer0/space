<?php

use app\models\Menu;
use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->params['breadcrumbs'][] = $this->title = 'Меню';

?>
<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'language_code',
            [
                'attribute' => 'status',
                'value' => function (Menu $model): string {
                    return $model->status === 'draft' ? 'Черновик' : 'Активен';
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
