<?php


namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use SoftDeletes;

    protected $table = 'produtos';
    public $timestamps = false;
    protected $appends= ['links'];
    protected $hidden = ['deleted_at'];
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
        'fk_categorias_livros_id',
        'fk_categorias_papelaria_id',
        'fk_fornecedores_id',
        'fk_funcionarios_administrativo_id',
        'disponibilidade'
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

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'fk_fornecedores_id');
    }

    public function funcionarioAdministrativo()
    {
        return $this->belongsTo(FuncionarioAdministrativo::class, 'fk_funcionarios_administrativo_id');
    }

    public function getLinksAttribute($link) : array
    {
        //monta links das imagens do produto
        $imagensList = Imagem::query()->where('fk_produtos_id', '=', "$this->id")->get()->map(function($item){
            return "/". env('PREFIX_API') ."/imagens/{$item->id}";
        });
        //define variaveis dos links de cada produto
        $tipoProduto = mb_strtolower($this->produto_tipo);
        $idCatProduto = ($this->id_categoria ? $this->id_categoria : ($this->fk_categorias_livros_id ? $this->fk_categorias_livros_id : $this->fk_categorias_papelaria_id));
        $cnpjFornecedor = $this->fornecedor_cnpj ? $this->fornecedor_cnpj : Fornecedor::query()->find("$this->fk_fornecedores_id")->select('fornecedor_CNPJ')->get()[0]->fornecedor_CNPJ;
        $cpfFuncionario = $this->administrativo_cpf ? $this->administrativo_cpf : FuncionarioAdministrativo::query()->find("$this->fk_funcionarios_administrativo_id")->select('administrativo_cpf')->get()[0]->administrativo_cpf;


        return ([
            'produto' => "/". env('PREFIX_API') ."/produtos-{$tipoProduto}/cat{$idCatProduto}/{$tipoProduto}/{$this->id}",
            'fornecedor' =>"/". env('PREFIX_API') ."/fornecedores/{$cnpjFornecedor}",
            'funcionario' => "/". env('PREFIX_API') ."/funcionarios-administrativo/{$cpfFuncionario}",
            'categoria-produto' => "/". env('PREFIX_API') ."/produtos-{$tipoProduto}/cat{$idCatProduto}",
            'imagens' => $imagensList
        ]);
    }

    public function getProdutoValorAttribute($produtoValor) : string
    {
        return number_format($produtoValor, 2, ',', '');
    }

    public function getDisponibilidadeAttribute($disponibilidade): bool
    {
        return boolval($disponibilidade);
    }

}
