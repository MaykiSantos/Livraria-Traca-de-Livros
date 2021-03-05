<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaLivro extends Model
{
    use SoftDeletes;

    protected $table = 'categorias_livros';
    public $timestamps = false;
    protected $hidden = ['deleted_at'];
    protected $appends = ['links'];
    protected $fillable =['categoria_descricao'];

    public function produtos()
    {
        return $this->hasMany(Produto::class, 'fk_categorias_livros_id');
    }

    public function getLinksAttribute($links) : array
    {

        return([
            'livros' => "/". env('PREFIX_API') ."/produtos-livro/cat$this->id"
        ]);
    }
}
