<?php

declare(strict_types=1);

namespace app\controllers;

use Yii;
use app\models\LoginForm;
use yii\web\ErrorAction;

final class SiteController extends BaseController
{
    public function behaviors(): array
    {
        $behaviors = parent::behaviors();

        array_unshift($behaviors['access']['rules'], [
            'actions' => ['login'],
            'allow' => true,
            'roles' => ['?'],
        ]);

        return $behaviors;
    }

    public function actions(): array
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
