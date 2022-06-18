<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Peca extends Model
{
    use HasFactory;

    protected $fillable = ['nm_peca', 'vl_peca', 'qt_estoque', 'foto', 'id_tipo_peca', 'id_marca', 'ds_peca', 'id_empresa'];

    public function filial() {
        return $this->hasOne(Empresa::class, 'id', 'id_empresa');
    }
    
    public function carros() {
        return $this->belongsToMany(Carro::class);
    }

    public function marca() {
        return $this->belongsTo(Marca::class, 'id_marca', 'id');
    }

    public function pedidos() {
        return $this->belongsToMany(Pedido::class, 'peca_pedidos', 'id_peca', 'id_pedido');
    }

    public function fotos(){
        return $this->hasOne(Foto_Peca::class, 'id_peca', 'id');
    }

    public function tipoPeca() {
        return $this->belongsTo(TipoPeca::class, 'id_tipo_peca', 'id');
    }

    public function retirarDoEstoque($id){
        DB::table('pecas')->where('id', '=', $id)->decrement('qt_estoque');
        return 'success';
    }
}
