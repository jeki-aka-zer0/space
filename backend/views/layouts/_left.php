<?php

use app\models\User;
use dmstr\widgets\Menu;
use yii\web\Controller;
use yii\web\View;

/**
 * @var View $this
 * @var User $user
 * @var Controller $context
 */

$user = Yii::$app->user->identity;
$context = $this->context;
$isGuest = Yii::$app->user->isGuest;

$menu = [
    'options' => ['class' => 'sidebar-menu tree', 'data' => ['widget' => 'tree', 'animation-speed' => '200']],
    'items' => [
        [
            'label' => 'Test 1',
            'icon' => 'file-text-o',
            'url' => '#',
            'items' => [
                [
                    'label' => 'Test 2',
                    'url' => ['/catalog/order/default/index'],
                    'active' => strpos($context->id, 'catalog/order') === 0,
                ],
            ],
        ],
    ],
];

if (YII_ENV === 'dev') {
    $menu['items'] = array_merge(
        $menu['items'],
        [
            ['label' => 'Dev tools', 'options' => ['class' => 'header']],
            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'], 'visible' => YII_ENV === 'dev'],
            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'], 'visible' => YII_ENV === 'dev'],
            ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
        ]
    );
}

?>
<aside class="main-sidebar">
    <section class="sidebar">
        <?php if ($isGuest) {
            echo Menu::widget($menu);
        } ?>
    </section>
</aside>