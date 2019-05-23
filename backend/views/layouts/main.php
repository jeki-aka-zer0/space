<?php

use dmstr\web\AdminLteAsset;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 * @var string $content
 */

AdminLteAsset::register($this);

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head(); ?>
</head>
<body class="hold-transition sidebar-mini skin-blue">
<?php $this->beginBody() ?>
<div class="wrapper">

    <?php echo
    $this->render('_header.php', ['directoryAsset' => $directoryAsset]),
    $this->render('_left.php', ['directoryAsset' => $directoryAsset]),
    $this->render('_content.php', ['content' => $content]); ?>

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
