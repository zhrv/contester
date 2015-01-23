<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 17.12.2014
 * Time: 22:21
 */

namespace app\components\testers;
use app\models\Solution;

class TesterFactory {
    public static function create(Solution $solution) {
        return new DebugTester($solution);
    }
} 