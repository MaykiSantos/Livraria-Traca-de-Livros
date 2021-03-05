<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemPedidoContem extends Model
{
    use SoftDeletes;

    protected $table = 'item_pedido_contem';
    public $timestamps = false;
    protected $hidden = ['deleted_at'];
    protected $fillable =[
        'item_pedido_valor',
        'item_pedido_quantidade',
        'fk_pedidos_compras_id',
        'fk_produtos_id'
    ];

    public function pedidoCompra()
    {
        return $this->belongsTo(PedidoCompra::class, 'fk_pedidos_compras_id');
    }

    public function produto()
    {
        return $this->hasMany(Produto::class, 'fk_produtos_id');
    }

}
