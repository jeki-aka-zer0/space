<?php

use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;
use \yii\helpers\Html;

/**
 * @var string $content
 */

?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="row">

            <div class="col-sm-<?= isset($this->params['buttons']) ? '8' : '12' ?>">
                <?= Breadcrumbs::widget([
                    'encodeLabels' => false,
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </div>

            <?php if (isset($this->params['buttons'])): ?>
                <div class="col-sm-4 text-right">
                    <div class="btn-group">
                        <?php foreach ($this->params['buttons'] as $button) {
                            echo $button;
                        } ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </section>

    <section class="content">
        <?= Alert::widget(), $content; ?>
    </section>
</div>

<footer class="main-footer">
    <div class="pull-left hidden-xs">
        <?= Html::a('Сайт', Yii::$app->params['frontendHostInfo'], ['target' => '_blank']); ?>
    </div>
    <div class="pull-right">
        &copy; <?= Yii::$app->name ?> <?= date('Y') ?>
    </div>
    <div class="clearfix"></div>
</footer>