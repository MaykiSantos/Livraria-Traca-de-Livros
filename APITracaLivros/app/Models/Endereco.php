<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends Model
{
    use SoftDeletes;

    protected $table = 'enderecos';
    public $timestamps = false;
    protected $fillable =[
        'cep',
        'cidade',
        'bairro',
        'rua',
        'numero',
        'fk_clientes_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'fk_clientes_id');
    }

    public function pedodosCompras()
    {
        return $this->hasMany(PedidoCompra::class, 'fk_enderecos_id');
    }

}
