<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 17.12.2014
 * Time: 22:27
 */

namespace app\components\testers;

use app\models\Solution;
use app\models\Lang;
use yii\base\ErrorException;
use Yii;

class DebugTester extends BaseTester{

    protected $solution = null;

    public function __construct(Solution $solution) {
        $this->solution = $solution;
    }

    public function run() {

        $dir = $this->solution->getCompileDir();


        $srcFile = 'src_'. $this->solution->uid .'_'. $this->solution->tid . Lang::getFileExtension($this->solution->lid);

        $fp = fopen($dir . $srcFile, 'w');
        if (!$fp) {
            throw new ErrorException("Can't create source file for compiling...");
        }
        fprintf($fp, "%s", $this->solution->code);
        fclose($fp);

        $jsonFile = $dir .'cfg_'. $this->solution->uid .'_'. $this->solution->tid . '.json';


        $fp = fopen($jsonFile, 'w');
        if (!$fp) {
            throw new ErrorException("Can't create configuration file for compiling...");
        }
        fprintf($fp, "%s", $this->solution->getJson());
        fclose($fp);

        $cmd = Yii::getAlias(Yii::$app->params['checkerBin']) .' '. $jsonFile .' '. $dir .' '. $srcFile;// .' > '.$dir.'log.txt';

        exec($cmd, $out, $retVar);

        $outStr = '';
        foreach ($out as $str) {
            $outStr .= $str;
        }

        $this->testsResult = $outStr;

        $this->solution->clearFiles();
    }

} 