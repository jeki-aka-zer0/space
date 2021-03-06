<?php

declare(strict_types=1);

namespace app\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;

abstract class BaseController extends Controller
{
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
}
