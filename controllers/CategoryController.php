<?php

namespace app\controllers;

use yii\rest\ActiveController;
use yii\web\Response;

class CategoryController extends ActiveController
{
    public $modelClass = 'app\models\Category';

    public function behaviors()
    {
        parent::behaviors();

        return [
            [
                'class' => 'yii\filters\ContentNegotiator',
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
        ];
    }
}
