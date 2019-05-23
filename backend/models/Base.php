<?php

declare(strict_types=1);

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property string $status
 */
abstract class Base extends ActiveRecord
{
    public function afterFind()
    {
        parent::afterFind();
        $this->status = trim($this->status);
    }
}
