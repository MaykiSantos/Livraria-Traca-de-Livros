<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estoque extends Model
{
    use SoftDeletes;

    protected $table = 'estoques';
    public $timestamps = false;
    protected $hidden = ['deleted_at'];
    protected $fillable =[
        'estoque_quantidade',
        'estoque_quantidade-minima',
        'fk_localizacao_id',
        'fk_produtos_id'
    ];

    public function localizacao()
    {
        return $this->hasMany(Localizacao::class, 'fk_localizacao_id');
    }

    public function produto()
    {
        return $this->hasOne(Produto::class, 'fk_produtos_id');
    }

}
