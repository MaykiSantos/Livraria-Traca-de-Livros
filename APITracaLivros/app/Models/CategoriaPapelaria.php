<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaPapelaria extends Model
{
    use SoftDeletes;

    protected $table = 'categorias_papelaria';
    public $timestamps = false;
    protected $hidden = ['deleted_at'];
    protected $appends = ['links'];
    protected $fillable =['categoria_descricao'];

    public function produtos()
    {
        return $this->hasMany(Produto::class, 'fk_categorias_papelaria_id');
    }

    public function getLinksAttribute($links) : array
    {
        return([
            'papelaria' => "/". env('PREFIX_API') ."/produtos-papelaria/cat$this->id"
        ]);
    }

}
