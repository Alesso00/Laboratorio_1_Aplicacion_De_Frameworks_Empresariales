<?php
namespace app\controllers;

use Yii;
use Exception;
use yii\helpers\Html;
use app\models\ErrorLog;

class CoreController
{

    public static function getErrorLog($idUser, $e, $controller)
    {
        Yii::$app->getSession()->setFlash('error', "La transaccion no se pudo completar. Intentelo de nuevo o consulte al administrador.");
        Yii::$app->getSession()->setFlash('warning', nl2br(Html::encode($e)));
    
        $errorLog = new ErrorLog();
        
        $errorLog->message = nl2br(Html::encode($e));
        $errorLog->date = date("Y-m-d H:i:s");
        $errorLog->id_user = $idUser;
        $errorLog->controller = $controller;
        
        echo "<pre>";
        print_r($errorLog);
        echo "</pre>";
       // die();
        try{
            $errorLog->save();
        }
        catch(Exception $e){
            Yii::$app->getSession()->setFlash('error','No se pudo enviar el registro de error al servidor.');
        }
    }


    public static function showNotificacion($title, $text, $type, $timer, $button)
    {
        Yii::$app->getSession()->setFlash('success', [
            'title' => $title,
            'text' => $text,
            'type' => $type,
            'timer' => $timer,
            'showConfirmButton' => $button
        ]);
    }
}
?>