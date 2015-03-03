<?php

namespace app\models;

use app\helpers\File;
use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property integer $id
 * @property integer $cid
 * @property string $title
 * @property string $content
 * @property integer $status
 * @property string $input
 * @property string $output
 * @property string $checker
 * @property string $time_limit
 * @property string $memory_limit
 *
 * @property Checkertests[] $checkertests
 * @property Solutions[] $solutions
 * @property Contests $c
 */
class Task extends \yii\db\ActiveRecord
{
    public $file;
    public $prFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cid'], 'required'],
            [['cid'], 'integer'],
            [['content'], 'string'],
            [['file'], 'file'],
            //[['file'], 'required'],
            [['title', 'input', 'output', 'checker', 'time_limit', 'memory_limit'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cid' => 'Cid',
            'title' => 'Title',
            'content' => 'Content',
            'input' => 'Input',
            'output' => 'Output',
            'checker' => 'Checker',
            'time_limit' => 'Time Limit',
            'memory_limit' => 'Memory Limit',
            'file' => 'Checker file'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCheckergroups()
    {
        return $this->hasMany(Checkergroup::className(), ['tid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCheckertests()
    {
        return $this->hasMany(Checkertest::className(), ['gid' => 'id'])
            ->viaTable('checkergroups', ['tid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolutions()
    {
        return $this->hasMany(Solution::className(), ['tid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContest()
    {
        return $this->hasOne(Contest::className(), ['id' => 'cid']);
    }

    public function getTestsDir() {
        return Yii::getAlias(Yii::$app->params['testsDir']).'/'.$this->contest->id.'/'.$this->id;
    }

    public function getProblemsDir() {
        return Yii::getAlias(Yii::$app->params['problemsDir']).'/'.$this->contest->id.'/'.$this->id;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCheckergroupsArray()
    {
        $cg = $this->checkergroups;
        $arr = [];
        foreach ($cg as $c) {
            $arr[$c->id] = $c->name;
        }
        return $arr;
    }

    public function getCheckertestsArray() {
        $arr = [];
        foreach ($this->checkertests as $chtest) {
            $arr[] = [
                'id' => $chtest->id,
                'scores' => $chtest->scores,
                'input' => $chtest->input,
                'outputs' => [
                    $chtest->output,
                ]
            ];
        }
        return $arr;
    }

    public function beforeDelete()
    {
//        unlink($this->testsDir .'/*'/*. $this->checker*/);
//        foreach ($this->checkertests as $cht) {
//            $cht->delete();
//        }
        File::rmdir($this->testsDir);
        return true;
    }

}
