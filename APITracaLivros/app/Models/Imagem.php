<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imagem extends Model
{
    use SoftDeletes;

    protected $table = 'imagens';
    public $timestamps = false;
    protected $fillable =[
        'imagem_1',
        'imagem_2',
        'imagem_3'
    ];

}
