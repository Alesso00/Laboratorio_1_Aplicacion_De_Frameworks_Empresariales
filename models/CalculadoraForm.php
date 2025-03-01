<?php

namespace app\models;  

use yii\base\Model;  

class CalculadoraForm extends Model
{
    public $numero1;
    public $numero2;
    public $operacion;

    public function rules()
    {
        return [
            [['numero1', 'numero2', 'operacion'], 'required'], 
            [['numero1', 'numero2'], 'number'], 
            ['operacion', 'in', 'range' => ['+', '-', '*', '/']],
            ['numero2', 'validateDivision', 'when' => fn() => $this->operacion === '/'], 
        ];
    }

    public function validateDivision($attribute)
    {
        if ($this->$attribute == 0) {
            $this->addError($attribute, 'No se puede dividir por cero.');
        }
    }

    public function calcular()
    {
        return match ($this->operacion) {
            '+' => $this->numero1 + $this->numero2,
            '-' => $this->numero1 - $this->numero2,
            '*' => $this->numero1 * $this->numero2,
            '/' => $this->numero2 != 0 ? $this->numero1 / $this->numero2 : null,
            default => null
        };
    }
}

