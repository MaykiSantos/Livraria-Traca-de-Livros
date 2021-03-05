<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusPedido extends Model
{
    use SoftDeletes;

    protected $table = 'status_pedidos';
    public $timestamps = false;
    protected $hidden = ['deleted_at'];
    protected $fillable =['descricao_status'];


    public function pedidosCompras()
    {
        return $this->hasMany(PedidoCompra::class, 'fk_status_pedidos_id');
    }
}
