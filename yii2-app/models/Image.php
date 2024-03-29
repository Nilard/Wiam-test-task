<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Image extends ActiveRecord
{
    const STATUS_APPROVED = 1;
    const STATUS_REJECTED = 0;

    public static function tableName()
    {
        return 'image';
    }

    public function rules()
    {
        return [
            [['image_id', 'status'], 'required'],
            [['image_id', 'status'], 'integer'],
        ];
    }
}
