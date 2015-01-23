<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 17.12.2014
 * Time: 17:19
 */

namespace app\components\testers;




use app\models\Solution;

abstract class BaseTester implements TesterInterface {
    protected $testsResult = [];

    abstract public function run();

    public function getCount() {
        return count($this->testsResult);
    }
    public function getResult() {
        if (empty($this->testsResult)) {
            $this->run();
        }
        return $this->testsResult;
    }

} 