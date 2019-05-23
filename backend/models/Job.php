<?php

declare(strict_types=1);

namespace app\models;

use yii\db\ActiveQuery;

/**
 * This is the model class for table "job_jobs".
 *
 * @property string $id (DC2Type:id)
 * @property string $language_code (DC2Type:code)
 * @property string $name
 * @property string $experience
 * @property string $content
 * @property string $status (DC2Type:status)
 * @property int $sort (DC2Type:sort)
 *
 * @property Language $languageCode
 */
final class Job extends Base
{
    public static function tableName(): string
    {
        return 'job_jobs';
    }

    public function rules(): array
    {
        return [
            [['name', 'experience', 'content', 'status', 'sort'], 'required'],

            [['content'], 'string'],

            [['name', 'experience'], 'string', 'max' => 255],

            [['sort'], 'integer'],
            [['sort'], 'unique'],

            [['status'], 'in', 'range' => ['draft', 'active']],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'language_code' => 'Язык',
            'name' => 'Наименование',
            'experience' => 'Опыт',
            'content' => 'Содержание',
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
