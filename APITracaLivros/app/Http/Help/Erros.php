<?php


namespace App\Http\Help;


class Erros
{

    public static function mensagens()
    {
        return [
            'required' => 'Atributo :attribute obrigatorio',
            'alpha_num' => 'O atributo :attribute deve conter apenas caracteres alfanuméricos',
            'email' => ':attribute invalido',
            'size' => 'o atributo :attribute não possui a quantidade de caracteres esperado'
        ];
    }

}
