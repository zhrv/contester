<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 17.12.2014
 * Time: 17:04
 */

namespace app\components\testers;


interface TesterInterface {
    public function run();
    public function getCount();
    public function getResult();
} 