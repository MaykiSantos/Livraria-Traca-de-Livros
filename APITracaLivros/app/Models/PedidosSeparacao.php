<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidosSeparacao extends Model
{
    use SoftDeletes;

    protected $table = 'pedidos_separacao';
    public $timestamps = false;
    protected $hidden = ['deleted_at'];
    protected $fillable =[
        'fk_funcionarios_almoxarifado_id',
        'fk_pedidos_compras_id'
    ];

    public function funcionarioAlmoxarifado()
    {
        return $this->belongsTo(FuncionarioAlmoxarifado::class, 'fk_funcionarios_almoxarifado_id');
    }

    public function pedidoCompra()
    {
        return $this->belongsTo(PedidoCompra::class, 'fk_pedidos_compras_id');
    }

}
