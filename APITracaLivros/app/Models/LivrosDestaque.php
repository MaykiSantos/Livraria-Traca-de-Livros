<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LivrosDestaque extends Model
{
    use SoftDeletes;

    protected $table = 'livros_destaques';
    public $timestamps = false;
    protected $fillable =[
        'fk_produtos_id'
    ];

    public function produto()
    {
        return $this->hasOne(Produto::class, 'fk_produtos_id');
    }

}
