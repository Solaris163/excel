<?php


namespace app\controllers;


use app\models\File;
use app\models\Goods;
use Yii;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\UploadedFile;

class UploadController extends Controller
{
    //Этот экшн отображает форму для загрузки файла csv
    public function actionIndex()
    {
        $file = new File();

        return $this->render('index',
            [
                'file' => $file,
            ]);
    }

    //этот экшн загружает файл, валидирует его, сохраняет временную копию файла
    //заносит данные из файла в базу, затем удаляет временную копию
    public function actionUpload()
    {
        $file = new File();

        if(UploadedFile::getInstance($file, 'upload')) //Проверка, загружен ли файл
        {
            $file->upload = UploadedFile::getInstance($file, 'upload');
            if($file->validate())
            {
                $file->upload->saveAs('../temp/temp.csv'); //сохраняем временную копию файла

                //Дальше перебираем файл по строкам, валидируем данные и записываем их в базу.
                $r = 0;
                if (($handle = fopen('../temp/temp.csv', "r")) !== FALSE) {
                    while (($row = fgetcsv($handle, 5000, ";")) !== FALSE) {
                        $r++;
                        if($r == 1) {continue;} //Не импортируем первую строку (т.к. там заголовки)

                        //записываем данные в модель
                        //в строковых данных меняем кодировку на utf-8
                        $good = new Goods();
                        $good->code = mb_convert_encoding($row[0], 'utf-8', 'windows-1251');
                        $good->name = mb_convert_encoding($row[1], 'utf-8', 'windows-1251');
                        $good->level1 = mb_convert_encoding($row[2], 'utf-8', 'windows-1251');
                        $good->level2 = mb_convert_encoding($row[3], 'utf-8', 'windows-1251');
                        $good->level3 = mb_convert_encoding($row[4], 'utf-8', 'windows-1251');
                        $good->price = $row[5];
                        $good->priceSP = $row[6];
                        $good->quantity = $row[7];
                        $good->property = mb_convert_encoding($row[8], 'utf-8', 'windows-1251');
                        $good->joint_purchase = $row[9];
                        $good->measure = mb_convert_encoding($row[10], 'utf-8', 'windows-1251');
                        $good->img = mb_convert_encoding($row[11], 'utf-8', 'windows-1251');
                        $good->show_on_main = $row[12];
                        $good->description = mb_convert_encoding($row[13], 'utf-8', 'windows-1251');

                        if($good->validate()) //Валидируем введенные в модель данные. И вносим их в базу.
                        {
                            $good->save();
                        }else {
                            echo "данные в строке {$r} не соответствуют стандарту";
                            exit();
                        }
                    }

                    fclose($handle);
                    unlink('../temp/temp.csv'); //удаляем временный файл
                    Yii::$app->getResponse()->redirect('/show'); //переходим на страницу с таблицей товаров
                }


            }else echo "Файл должен быь csv";

        }else echo "файла нет";
    }

    //экшн очищает таблицу от данных
    public function actionDelete()
    {
        Goods::deleteAll();
        Yii::$app->getResponse()->redirect('/show');
    }

}