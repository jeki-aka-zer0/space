<?php

use yii\helpers\Html;
use app\models\User;
use yii\web\View;

/**
 * @var View $this
 * @var string $content
 * @var User $user
 */

$appName = Yii::$app->name;
$user = Yii::$app->user->identity;

?>
<header class="main-header">

    <?= Html::a(
        <<<HTML
<span class="logo-mini" title="{$appName}"><i class="fa fa-home"></i></span><span class="logo-lg">{$appName}</span>
HTML
        ,
        Yii::$app->homeUrl,
        ['class' => 'logo']
    ) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle sidebar-toggle-js" data-toggle="push-menu">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs"><?= $user->username; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <p>
                                <?= $user->username; ?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left"></div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Выход',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
