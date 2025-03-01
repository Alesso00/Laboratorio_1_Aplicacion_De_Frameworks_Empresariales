<?php

namespace app\controllers; 

use Yii;
use yii\web\Controller;
use app\models\CalculadoraForm; 

class CalculadoraController extends Controller
{
    public function actionIndex()
    {
        $model = new CalculadoraForm(); 
        $resultado = null; 

    
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $resultado = $model->calcular(); 
        }


        return $this->render('index', compact('model', 'resultado'));
    }
}