<?php


namespace App\Models;


use App\Http\Help\ConverteData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    protected $table = 'clientes';
    public $timestamps = false;
    protected $appends= ['links'];
    protected $hidden = ['deleted_at', 'cliente_senha'];
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

    public function getClienteDataNascimentoAttribute(string $data)
    {
        return ConverteData::formataData($data);
    }

    public function getLinksAttribute($links)
    {
        return ([
            'cliente' => "/". env('PREFIX_API') . "/clientes/$this->cliente_cpf",
            'chamados' => "/". env('PREFIX_API') . "/chamados/clientes/$this->cliente_cpf",
            'enderecos' => "/". env('PREFIX_API') . "/enderecos/clientes/$this->cliente_cpf",
            'pedidos' => "/". env('PREFIX_API') . "/pedidos/clientes/$this->cliente_cpf"
        ]);
    }
}
