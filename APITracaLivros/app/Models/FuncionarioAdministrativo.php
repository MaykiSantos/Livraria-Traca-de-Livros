<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FuncionarioAdministrativo extends Model
{
    use SoftDeletes;

    protected $table = 'funcionarios_administrativo';
    public $timestamps = false;
    protected $hidden= ['administrativo_senha'];
    protected $fillable =[
        'administrativo_cpf',
        'administrativo_nome',
        'administrativo_senha'
    ];

    public function pedidosFornecedores()
    {
        return $this->hasMany(PedidoFornecedor::class, 'fk_funcionarios_administrativo_id';)
    }


}
