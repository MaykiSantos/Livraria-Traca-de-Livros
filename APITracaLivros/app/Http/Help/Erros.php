<?php


namespace App\Http\Help;


class Erros
{

    public static function mensagens() : array
    {
        return [
            'required' => 'atributo :attribute obrigatorio',
            'integer' => 'o atributo :attribute deve conter apenas caracteres numericos',
            'email' => ':attribute invalido',
            'size' => 'o atributo :attribute não possui a quantidade de caracteres esperado',
            'unique' => 'o atributo :attribute não pode ser registrado por duplicidade',
            'min' => 'o atributo :attribute não possui a quantidade minima de caracteres exigidos',
            'regex' => 'atributo :attribute não possui formato valido',
            'alpha' => 'o atributo :attribute deve conter apenas caracteres alfabeticos',
            'numeric' => 'o atributo :attribute deve conter apenas caracteres numericos',
            'required_without' => 'O atributo :attribute é obrigatório quando :values não está presente',
            'date' => 'o atributo :attribute deve ter um formato de data valido',
            'starts_with' => 'O :attribute aceita apenas os valores :values'
        ];
    }

    public static function naoEncontado()
    {
        return response()->json('recurso nâo encontrado', 404);
    }

    public static function tipoInvalido()
    {
        return response()->json('Tipo do recurso inesperado', 415);
    }

    public static function naoEspecificado()
    {
        return response()->json('chave do atributo não especificada', 406);
    }

    public static function erroArquivo()
    {
        return response()->json('erro carregamento do arquivo', 412);
    }

    public static function erroBanco(\Exception $e)
    {
        $mensagem = [
            "Mensagem" => "Erro durante transação com banco de dados",
            "erro" => $e->getPrevious()
        ];
        return response()->json($mensagem, 409);
    }

}
