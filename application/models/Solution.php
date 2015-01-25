<?php

namespace app\models;

use app\helpers\File;
use Yii;
use yii\base\Exception;
use yii\base\ErrorException;
use yii\log\Logger;

/**
 * This is the model class for table "solutions".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $tid
 * @property string $code
 * @property string $file
 * @property integer $created_at
 * @property string $hash
 *
 * @property Users $u
 * @property Tasks $t
 * @property Tests[] $tests
 */
class Solution extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'solutions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'tid'], 'required'],
            [['uid', 'tid', 'created_at'], 'integer'],
            [['code'], 'string'],
            [['file', 'hash'], 'string', 'max' => 255],
            [['score'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'tid' => 'Tid',
            'code' => 'Code',
            'file' => 'File',
            'created_at' => 'Created At',
            'hash' => 'Hash',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'uid']);
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
    public function getLang()
    {
        return $this->hasOne(Lang::className(), ['id' => 'lid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTests()
    {
        return $this->hasMany(Test::className(), ['sid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContest()
    {
        return $this->hasOne(Contest::className(), ['id' => 'cid'])
            ->viaTable('tasks', ['id' => 'tid']);
    }

    public function beforeSave($insert) {
        return true;
    }

    public function getGoodTestsCount() {
        return Test::find()
            ->where(['sid' => $this->id, 'res' => 1])
            ->count();
    }

    public function getBadTestsCount() {
        return Test::find()
            ->where(['sid' => $this->id, 'res' => 0])
            ->count();
    }

    public function getJson() {
        $task = Task::findOne(['id' => $this->tid]);
        $tests = $task->getCheckertestsArray();

        $json = [
            'problem' => [
                'name' => $this->task->title,
                'config' => [
                    "time_limit" => (int)$this->task->time_limit,
                    "memory_limit" => (int)$this->task->memory_limit,
                    "input" => $this->task->input,
                    "output" => $this->task->output,
                    "test_dir" => $this->task->testsDir,
                    "checker" => $this->task->checker,
                    'tests' => $tests,
                ],
            ],
            'language' => [
                'name'      => $this->lang->identifier,
                'template'  => $this->lang->compiler,
            ],
        ];

        return json_encode($json);

    }

    public function parseResult($json) {
        $pos = strpos($json, '{"status"');
        $json = substr($json, $pos);

        $this->result = $json;
        $this->status = 0;
        $this->score = 0;
        $this->save();

        Yii::$app->db->createCommand()->delete('tests', ['sid' => $this->id])->execute();


        $result = json_decode($json);
        if (!isset($result->status)) {
            throw new Exception('Сбой при проверке тестов. Данные о результатах не получены.');
        }
        if ($result->status !== 'ok') {
            throw new Exception($result->error_msg);
        }

        $i = 0;
        $report = $result->report;
        foreach ($report as $t) {
            $test = new Test();
            $test->cid = $t->id;
            $test->sid = $this->id;
            $test->res = $test->resultsByName[$t->result];
            $test->num = ++$i;
            $test->save();
        }

        $totScore = 0;
        $grScores = $this->getGroupsScores();

        foreach ($grScores as $gs) {
            $totScore += $gs;
        }
        $this->score = $totScore;
        $this->save();

    }

    public function getGroupsScores()
    {
        $arr = [];
        $i = 0;
        foreach ($this->task->checkergroups as $group) {
            $arr[$i] = 0;
            $tests = Test::find()
                ->leftJoin('checkertests', 'checkertests.id = tests.cid')
                ->where(['tests.sid' => $this->id, 'checkertests.gid' => $group->id])
                ->all();

            $grScore = 0;
            $ok = true;
            foreach ($tests as $test) {
                if ($test->res == Test::RESULT_OK) {
                    $grScore += $test->checkertest->scores;
                } elseif ($group->method == Checkergroup::METHOD_TOTAL) {
                    $ok = false;
                    //break;
                }
            }
            if ($ok) {
                if ($group->method == Checkergroup::METHOD_TOTAL) {
                    $arr[$i] = $group->scores;
                }
                else {
                    $arr[$i] = $grScore;
                }
            }
            $i++;
        }

        return $arr;
    }

    public function getCompileDir()
    {
        if (!isset($this->id)) {
            throw new Exception('Solution not saved.');
        }

        $dir = Yii::getAlias(Yii::$app->params['compileDir']) .'/'. $this->task->cid .'/'. $this->uid .'/';
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        return $dir;
    }

    public function clearFiles()
    {
        if (!isset($this->id)) {
            throw new Exception('Solution not saved.');
        }
        try {
            File::rmdir($this->getCompileDir());
        }
        catch (Exception $e) {
            Yii::getLogger()->log('Произошла ошибка: '. $e->getMessage(), Logger::LEVEL_WARNING);
        }
        catch (ErrorException $e) {
            Yii::getLogger()->log('Произошла ошибка: '. $e->getMessage(), Logger::LEVEL_WARNING);
        }
    }
}
