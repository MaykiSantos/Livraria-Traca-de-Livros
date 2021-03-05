<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imagem extends Model
{
    use SoftDeletes;

    protected $table = 'imagens';
    public $timestamps = false;
    protected $hidden = ['deleted_at'];
    protected $fillable =[
        'imagem',
        'fk_produtos_id'
    ];

    public function getImagemAttribute($imagem)
    {
        return ($imagem);
    }

}
