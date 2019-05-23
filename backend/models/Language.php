<?php

declare(strict_types=1);

namespace app\models;

use yii\db\ActiveQuery;

/**
 * This is the model class for table "lng_languages".
 *
 * @property string $code (DC2Type:code)
 * @property string $name
 * @property string $create_date (DC2Type:datetime_immutable)
 * @property string $update_date (DC2Type:datetime_immutable)
 * @property string $status (DC2Type:status)
 * @property int $sort (DC2Type:sort)
 *
 * @property Job[] $jobJobs
 * @property Menu[] $navMenus
 * @property Project[] $projectProjects
 * @property Text[] $txtTexts
 */
final class Language extends Base
{
    public static function tableName(): string
    {
        return 'lng_languages';
    }

    public function rules(): array
    {
        return [
            [['name', 'status', 'sort'], 'required'],

            [['sort'], 'integer'],
            [['sort'], 'unique'],

            [['status'], 'in', 'range' => ['draft', 'active']],

            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'code' => 'Код',
            'name' => 'Наименование',
            'create_date' => 'Дата создания',
            'update_date' => 'Дата редактирования',
            'status' => 'Статус',
            'sort' => 'Сортировка',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getJobJobs()
    {
        return $this->hasMany(Job::class, ['language_code' => 'code']);
    }

    /**
     * @return ActiveQuery
     */
    public function getNavMenus()
    {
        return $this->hasMany(Menu::class, ['language_code' => 'code']);
    }

    /**
     * @return ActiveQuery
     */
    public function getProjectProjects()
    {
        return $this->hasMany(Project::class, ['language_code' => 'code']);
    }

    /**
     * @return ActiveQuery
     */
    public function getTxtTexts()
    {
        return $this->hasMany(Text::class, ['language_code' => 'code']);
    }
}
