<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use SoftDeletes;

    protected $table = 'fornecedores';
    public $timestamps = false;
    protected $hidden = ['deleted_at'];
    protected $fillable =[
        'fornecedor_CNPJ',
        'fornecedor_nome',
        'fornecedor_email',
        'fornecedor_telefone_1',
        'fornecedor_telefone_2',
        'fornecedor_cep',
        'fornecedor_cidade',
        'fornecedor_bairro',
        'fornecedor_rua',
        'fornecedor_numero'
    ];

    public function pedidosFornecedor()
    {
        return $this->hasMany(PedidoFornecedor::class, 'fk_fornecedores_id');
    }

}
