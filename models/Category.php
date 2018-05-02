<?php

namespace app\models;

use Ramsey\Uuid\Uuid;
use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "categories".
 *
 * @property string $id
 * @property string $name
 * @property string $slug
 * @property string $parentCategory
 * @property bool $isVisible
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    public function behaviors()
    {
        return [
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'id',
                ],
                'value' => Uuid::uuid4(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slug'], 'required'],
            [['id', 'name', 'slug', 'parentCategory'], 'string'],
            [['isVisible'], 'boolean'],
            [['isVisible'], 'default', 'value' => 1],
            [['parentCategory'], 'default', 'value' => null],
            [['slug'], 'unique'],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'parentCategory' => 'Parent Category',
            'isVisible' => 'Is Visible',
        ];
    }

    public function extraFields()
    {
        return ['parent', 'children'];
    }

    public function getParent()
    {
        return $this->hasOne(Category::className(), ['id' => 'parentCategory']);
    }

    public function getChildren()
    {
        return $this->hasMany(Category::className(), ['parentCategory' => 'id']);
    }
}
