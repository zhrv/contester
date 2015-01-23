<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "checkertests".
 *
 * @property integer $id
 * @property integer $tid
 * @property integer $scores
 * @property string $input
 * @property string $output
 *
 * @property Tasks $t
 */
class Checkertest extends \yii\db\ActiveRecord
{

    public $infile;
    public $outfile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'checkertests';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gid', 'scores'], 'integer'],
            [['gid'], 'required'],
            [['infile', 'outfile'], 'file'],
            [['input', 'output'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gid' => 'Group',
            'scores' => 'Scores',
            'input' => 'Input',
            'output' => 'Output',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'tid'])
            ->viaTable('checkergroups', ['id' => 'gid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCheckergroup()
    {
        return $this->hasOne(Checkergroup::className(), ['id' => 'gid']);
    }

    public function beforeDelete()
    {
        unlink($this->task->testsDir .'/'. $this->input);
        unlink($this->task->testsDir .'/'. $this->output);
        return true;
    }
}
