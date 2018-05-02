<?php

namespace app\components;

use app\models\Category;
use Ramsey\Uuid\Uuid;
use Yii;
use yii\rest\ViewAction;

/**
 * ViewAction implements the API endpoint for returning the detailed information about a model.
 *
 * For more details and usage information on ViewAction, see the [guide article on rest controllers](guide:rest-controllers).
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ViewCategoryAction extends ViewAction
{
    /**
     * Displays a model.
     * @param string $id the primary key of the model.
     * @return \yii\db\ActiveRecordInterface the model being displayed
     */
    public function run($id)
    {
//        var_dump($id);die();
        if (Uuid::isValid($id)) {
            $model = $this->findModel($id);
        } else {
//            $model = $this->findModelBySlug($id);
            $model = Category::findOne(['slug' => $id]);
        }

        if ($this->checkAccess) {
            call_user_func($this->checkAccess, $this->id, $model);
        }

        return $model;
    }

    private function findModelBySlug($slug)
    {
        return Category::findOne(['slug' => $slug]);
    }
}
