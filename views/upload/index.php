<?php

use \yii\widgets\ActiveForm;

//создаем форму для загрузки файла
echo "<div>";
$form = ActiveForm::begin(['action' => 'upload/upload']);
echo $form->field($file, 'upload')->fileInput()->label('Загрузить файл csv');
echo \yii\helpers\Html::submitButton(\Yii::t("app", "upload"), ['class' => 'btn btn-success form-group col-lg-2']);
ActiveForm::end();
echo "</div>";