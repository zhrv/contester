<?php

namespace app\models;

use Yii;
use yii\base\ErrorException;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "contests".
 *
 * @property integer $id
 * @property string $name
 * @property integer $start_at
 * @property integer $finish_at
 * @property integer $status
 *
 * @property Tasks[] $tasks
 */
class Contest extends \yii\db\ActiveRecord
{
    const STATUS_INACTIVE   = 0;
    const STATUS_ACTIVE     = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contests';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['start_at', 'finish_at', 'status'], 'integer'],
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
            'name' => 'Name',
            'start_at' => 'Start At',
            'finish_at' => 'Finish At',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['cid' => 'id']);
    }

    public function getUsers()
    {
        if (!isset($this->id)) {
            throw new ErrorException('Получение участников несуществующего турнира...');
        }
        $users = (new ActiveQuery(User::className()))//->find()
            ->leftJoin('solutions', 'users.id = solutions.uid')
            ->leftJoin('tasks', 'solutions.tid = tasks.id')
            ->leftJoin('contests', 'contests.id = tasks.cid')
            ->where(['contests.id' => $this->id])
            ->all();
        return $users;
    }

    public function getActive() {
        $time = time();
        if (($this->start_at <= $time) && ($time <= $this->finish_at) && ($this->status == self::STATUS_ACTIVE)) {
            return true;
        } else {
            return false;
        }
    }
}
