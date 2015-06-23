<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\module\admin\models\Theme;
use \bootui\datetimepicker\Datepicker;

/* @var $this yii\web\View */
/* @var $model app\module\admin\models\news */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_news')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_news')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'theme_news')->dropDownList(ArrayHelper::map(Theme::find()->all(),'id_theme','name_theme'),
        ['prompt'=>'Выберите тему']
        ) ?>
    <?= $form->field($model, 'date_news')->widget(Datepicker::className()); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
