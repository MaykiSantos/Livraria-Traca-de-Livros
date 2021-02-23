<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidoFornecedor extends Model
{
    use SoftDeletes;

    protected $table = 'pedidos_fornecedores';
    public $timestamps = false;
    protected $fillable =[
        'pedidos_fornecedor_descricao',
        'pedidos_fornecedor_data',
        'pedidos_fornecedor_data_entrega',
        'pedidos_fornecedor_observacoes',
        'fk_funcionarios_administrativo_id',
        'fk_fornecedores_id'
    ];

    public function funcionarioAdministrativo()
    {
        return $this->belongsTo(FuncionarioAdministrativo::class, 'fk_funcionarios_administrativo_id');
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'fk_fornecedores_id');
    }

}
