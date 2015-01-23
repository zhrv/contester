<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tests".
 *
 * @property integer $id
 * @property integer $sid
 * @property integer $num
 * @property integer $res
 *
 * @property Solutions $s
 */
class Test extends \yii\db\ActiveRecord
{
    const RESULT_OK     = 0;
    const RESULT_TLE    = 1;
    const RESULT_MLE    = 2;
    const RESULT_CRASH  = 3;
    const RESULT_BAD    = 4;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tests';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sid', 'num', 'res'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sid' => 'Sid',
            'num' => 'Num',
            'res' => 'Res',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolution()
    {
        return $this->hasOne(Solution::className(), ['id' => 'sid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCheckertest()
    {
        return $this->hasOne(Checkertest::className(), ['id' => 'cid']);
    }

    static public function getResultsByName()
    {
        return [
            'ok' => self::RESULT_OK,
            'tle' => self::RESULT_TLE,
            'mle' => self::RESULT_MLE,
            'crash' => self::RESULT_CRASH,
            'bad' => self::RESULT_BAD,
        ];
    }
}
