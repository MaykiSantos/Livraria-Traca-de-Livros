<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use SoftDeletes;

    protected $table = 'produtos';
    public $timestamps = false;
    protected $fillable =[
        'produto_titulo',
        'produto_tipo',
        'produto_porcentagem_desconto',
        'produto_valor',
        'produto_descricao',
        'produto_largura',
        'produto_altura',
        'produto_peso',
        'produto_ano',
        'produto_tipo_acabamento',
        'produto_idioma',
        'produto_profundidade',
        'produto_autor',
        'produto_editora',
        'fk_imagens_id',
        'fk_categorias_livros_id',
        'fk_categorias_papelaria_id',
        'fk_fornecedores_id',
        'fk_funcionarios_administrativo_id',
        ];

    public function categoriaLivro(){
        return $this->belongsTo(CategoriaLivro::class, 'fk_categorias_livros_id');
    }

    public function categoriaPapelaria()
    {
        return $this->belongsTo(CategoriaLivro::class, 'fk_categorias_papelaria_id');
    }

    public function estoque(){
        return $this->belongsTo(Estoque::class, 'fk_produtos_id');
    }

    public function itemPedidoContem()
    {
        return $this->belongsTo(ItemPedidoContem::class, 'fk_produtos_id');
    }
}
