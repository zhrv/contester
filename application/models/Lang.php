<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "langs".
 *
 * @property integer $id
 * @property string $name
 * @property string $compiler
 */
class Lang extends \yii\db\ActiveRecord
{
    protected static $fileExtensions = null;
    protected static $languages = null;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'langs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'compiler', 'extension', 'identifier'], 'string', 'max' => 255]
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
            'identifier' => 'System name',
            'compiler' => 'Compiler',
            'extension' => 'File extension',
        ];
    }

    public static function getFileExtension($id) {
        if (self::$fileExtensions === null) {
            $langs = Lang::find()->all();
            self::$fileExtensions = [];
            foreach ($langs as $lang) {
                self::$fileExtensions[$lang->id] = $lang->extension;
            }

        }

        return self::$fileExtensions[$id];
    }

    public static function getLanguage($id) {
        return self::getLanguages()[$id];
    }

    public static function getLanguages() {
        if (self::$languages === null) {
            $langs = Lang::find()->all();
            self::$languages = [];
            foreach ($langs as $lang) {
                self::$languages[$lang->id] = $lang->name;
            }

        }
        return self::$languages;
    }


}
