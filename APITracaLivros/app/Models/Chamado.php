<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chamado extends Model
{
    use SoftDeletes;

    protected $table = 'chamados';
    public $timestamps = false;
    protected $appends= ['links'];
    protected $hidden = ['deleted_at'];
    protected $fillable =[
        'chamado_titulo',
        'chamado_descricao',
        'fk_clientes_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'fk_clientes_id');
    }

    public function getLinksAttribute()
    {
        return ([
            'cliente' => "/" . env('PREFIX_API') . "/clientes/{$this->cliente_cpf}"
        ]);
    }

}
