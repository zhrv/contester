<?php
/**
 * Created by PhpStorm.
 * User: Appmath
 * Date: 22.01.2015
 * Time: 0:53
 */

namespace app\helpers;

class File {
    static public function rmdir($dir) {
        if ($objs = glob($dir."/*")) {
            foreach($objs as $obj) {
                is_dir($obj) ? self::rmdir($obj) : unlink($obj);
            }
        }
        rmdir($dir);
    }
}