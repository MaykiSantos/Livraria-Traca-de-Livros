<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Localizacao extends Model
{
    use SoftDeletes;

    protected $table = 'localizacao';
    public $timestamps = false;
    protected $fillable =[
        'localizacao_corredor',
        'localizacao_estante',
        'localizacao_nivel'
    ];

}
