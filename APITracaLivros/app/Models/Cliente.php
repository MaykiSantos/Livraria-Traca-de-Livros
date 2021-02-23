<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    protected $table = 'clientes';
    public $timestamps = false;
    protected $fillable =[
        'cliente_cpf',
        'cliente_nome',
        'cliente_telefone_01',
        'cliente_telefone_02',
        'cliente_data_nascimento',
        'cliente_email',
        'cliente_senha'
    ];

    public function chamados()
    {
        return $this->hasmany(Chamado::class, 'fk_clientes_id');
    }

    public function enderecos(){
        return $this->hasmany(Endereco::class, 'fk_clientes_id');
    }

    public function pedidosCompra()
    {
        return $this->hasMany(PedidoCompra::class, 'fk_clientes_id');
    }
}
