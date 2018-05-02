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

    public function actions()
    {
        $actions = parent::actions();

        $actions['view'] = [
            'class' => 'app\components\ViewCategoryAction',
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
        ];

        return $actions;
    }

    public function checkAccess($action, $model = null, $params = [])
    {
    }
}
