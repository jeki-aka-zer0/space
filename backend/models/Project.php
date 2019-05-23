<?php

declare(strict_types=1);

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "project_projects".
 *
 * @property string $id (DC2Type:id)
 * @property string $language_code (DC2Type:code)
 * @property string $name
 * @property string $content
 * @property string $status (DC2Type:status)
 * @property int $sort (DC2Type:sort)
 *
 * @property Language $languageCode
 */
final class Project extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'project_projects';
    }

    public function rules(): array
    {
        return [
            [['name', 'content', 'status', 'sort'], 'required'],
            [['content'], 'string'],
            [['sort'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['status'], 'in', 'range' => ['draft', 'active']],
            [['sort'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'language_code' => 'Язык',
            'name' => 'Наименование',
            'content' => 'Содержимое',
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
