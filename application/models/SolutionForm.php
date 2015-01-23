<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class SolutionForm extends Model
{
    public $task;
    public $lang;
    public $code;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['task', 'lang', 'code'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'task' => 'Задача',
            'lang' => 'Язык',
            'code' => 'Решение',
        ];
    }

    public function getActiveTasks($contestId) {
        $tasks = Task::find()
            ->where([
                'cid' => $contestId,
            ])
            ->all();
        $taskArr = [];
        foreach ($tasks as $task) {
            $taskArr[$task->id] = $task->title;
        }

        return $taskArr;
    }

    public function getLangs() {
        return Lang::getLanguages();
    }

//    public function getFileExtensions() {
//        $langs = Lang::find()->all();
//        $result = [];
//        foreach ($langs as $lang) {
//            $result[$lang->id] = $lang->extension;
//        }
//        return $result;
//    }
}
