<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "checkergroups".
 *
 * @property integer $id
 * @property integer $tid
 * @property integer $method
 * @property string $name
 *
 * @property Tasks $t
 * @property Checkertests[] $checkertests
 */
class Checkergroup extends \yii\db\ActiveRecord
{
    const METHOD_EACH   = 0;
    const METHOD_TOTAL  = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'checkergroups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tid', 'method', 'scores'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tid' => '',
            'method' => 'Method',
            'name' => 'Name',
            'scores' => 'Баллы',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'tid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCheckertests()
    {
        return $this->hasMany(Checkertest::className(), ['gid' => 'id']);
    }

    static public function getScoreCalcMethods() {
        return [
            self::METHOD_EACH   => 'Потестовая оценка',
            self::METHOD_TOTAL  => 'Полная оценка',
        ];
    }
}
