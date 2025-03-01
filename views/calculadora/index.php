<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Calculadora';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="d-flex justify-content-center align-items-center" style="height: 75vh;">
    <div class="card shadow-lg p-4" style="width: 350px; text-align: center;">
        <h2><?= Html::encode($this->title) ?></h2>

        <?php if ($model->hasErrors()): ?>
            <div class="alert alert-danger">
                <?= Html::errorSummary($model) ?>
            </div>
        <?php endif; ?>

        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'numero1')->input('number', ['class' => 'form-control']) ?>
        <?= $form->field($model, 'numero2')->input('number', ['class' => 'form-control']) ?>
        <?= $form->field($model, 'operacion')->dropDownList(['+' => 'Suma +', '-' => 'Resta -', '*' => 'Multiplicacion *', '/' => 'Division /'], ['class' => 'form-control']) ?>
        <?= Html::submitButton('Calcular', ['class' => 'btn btn-primary w-100']) ?>
        <?php ActiveForm::end(); ?>

        <?php if ($resultado !== null): ?>
            <h3 class="mt-3">Resultado: <strong><?= Html::encode($resultado) ?></strong></h3>
        <?php endif; ?>
    </div>
</div>
