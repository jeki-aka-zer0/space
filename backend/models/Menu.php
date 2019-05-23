<?php

declare(strict_types=1);

namespace app\models;

use yii\db\ActiveQuery;

/**
 * This is the model class for table "nav_menu".
 *
 * @property string $id (DC2Type:id)
 * @property string $language_code (DC2Type:code)
 * @property string $name
 * @property string $slug
 * @property string $status (DC2Type:status)
 * @property int $sort (DC2Type:sort)
 *
 * @property Language $languageCode
 */
class Menu extends Base
{
    public static function tableName():string
    {
        return 'nav_menu';
    }

    public function rules():array
    {
        return [
            [['name', 'status', 'sort'], 'required'],

            [['sort'], 'integer'],
            [['sort'], 'unique'],

            [['name'], 'string', 'max' => 255],

            [['status'], 'in', 'range' => ['draft', 'active']],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'language_code' => 'Язык',
            'name' => 'Наименование',
            'slug' => 'Slug',
            'status' => 'Статус',
            'sort' => 'Сортировка',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getLanguageCode()
    {
        return $this->hasOne(Language::class, ['code' => 'language_code']);
    }
}
