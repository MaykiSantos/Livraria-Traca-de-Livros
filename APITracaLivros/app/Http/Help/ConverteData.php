<?php


namespace App\Http\Help;


class ConverteData
{
    public static function formataData(string $data)
    {
        if (strpbrk($data, '/')){
            $dataNormal = explode('/', $data);
        }else{
            $dataNormal = explode('-', $data);
        }

        $dataInverso = implode('/', array_reverse($dataNormal));

        return $dataInverso;
    }
}
