<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidoCompra extends Model
{
    use SoftDeletes;

    protected $table = 'pedidos_compras';
    public $timestamps = false;
    protected $fillable =[
        'pedido_data',
        'pedido_valor',
        'fk_clientes_id',
        'fk_status_pedidos_id',
        'fk_enderecos_id'
    ];


    public function itemPedidoContem()
    {
        return $this->hasMany(ItemPedidoContem::class, 'fk_pedidos_compras_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'fk_clientes_id');
    }

    public function statusPedido()
    {
        return $this->belongsTo(StatusPedido::class, 'fk_status_pedidos_id');
    }

    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'fk_enderecos_id');
    }

    public function pedidoSeparacao()
    {
        return $this->hasMany(PedidosSeparacao::class, 'fk_pedidos_compras_id');
    }
}
