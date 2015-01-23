<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\User;
use yii\console\Controller;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";
    }

    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionTestusers($message = 'hello world')
    {
        for ($class = 9; $class <= 11; $class++) {
            for ($i = 1; $i < 50; $i++) {
                $user = new User();
                $name = 'user_'.$class.'_' . $i;
                $user->login = $name;
                $user->pass = substr(md5($name), 2, 6);
                $user->name = $name;
                $user->auth_key = substr(md5(md5($name)), 2, 6);
                $user->access_token = md5($user->pass);
                $user->save();
            }
        }

    }



}
