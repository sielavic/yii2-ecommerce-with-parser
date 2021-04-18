<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "likes".
 *
 * @property string $id

 * @property string $materialId
 * @property string $userId
 * @property string $rateNum
 * @property string $rateDate
 *
 */
class Raits extends \yii\db\ActiveRecord
{

  
   

   

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'raits';
    }











    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'materialId', 'userid', 'rateNum', 'rateDate'], 'safe'],
            
        ];
    }


    public function behaviors()
    {
        return [
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'defaultValue' => 1,
                'createdByAttribute' => 'userid',
                'updatedByAttribute' => null,
            ],
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    \yii\db\BaseActiveRecord::EVENT_BEFORE_INSERT => ['rateDate'],
                    \yii\db\BaseActiveRecord::EVENT_BEFORE_UPDATE => null,

                ],
                'value' => new \yii\db\Expression('NOW()'),

            ],
        ];
    }


    /**
     * @inheritdoc
     * @return LikesQuery the active query used by this AR class.
     */
   
}
