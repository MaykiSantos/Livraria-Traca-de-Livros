<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FuncionarioAlmoxarifado extends Model
{
    use SoftDeletes;

    protected $table = 'funcionarios_almoxarifado';
    public $timestamps = false;
    protected $hidden = ['funcionario_senha'];
    protected $fillable =[
        'funcionario_cpf',
        'funcionario_nome',
        'funcionario_senha'
    ];

    public function pedidoSeparacao()
    {
        return $this->hasMany(PedidosSeparacao::class, 'fk_funcionarios_almoxarifado_id');
    }

}
