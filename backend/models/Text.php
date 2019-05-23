<?php

declare(strict_types=1);

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "txt_texts".
 *
 * @property string $id (DC2Type:id)
 * @property string $name
 * @property string $content
 * @property string $language_code (DC2Type:code)
 * @property string $status (DC2Type:status)
 * @property string $slug
 *
 * @property Language $languageCode
 */
final class Text extends ActiveRecord
{
    public static function tableName():string
    {
        return 'txt_texts';
    }

    public function rules():array
    {
        return [
            [['name', 'content', 'status'], 'required'],
            [['content'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['status'], 'in', 'range' => ['draft', 'active']],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'content' => 'Содержимое',
            'language_code' => 'Язык',
            'status' => 'Статус',
            'slug' => 'Slug',
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
