<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\filters\GoodsFilter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'level1') ?>

    <?= $form->field($model, 'level2') ?>

    <?php // echo $form->field($model, 'level3') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'priceSP') ?>

    <?php // echo $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'property') ?>

    <?php // echo $form->field($model, 'joint_purchase') ?>

    <?php // echo $form->field($model, 'measure') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'show_on_main') ?>

    <?php // echo $form->field($model, 'description') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
