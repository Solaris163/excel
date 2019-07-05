<?php


namespace app\models;


class File extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'files';
    }

    public $upload;

    public function rules()
    {
        return [
            [['upload'], 'file', 'checkExtensionByMimeType' => false, 'extensions' => 'csv'],
        ];
    }

}