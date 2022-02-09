<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id'];

    public function produtos() {
        //return $this->belongsToMany('App\Models\Produto', 'pedidos_produtos');

        return $this->belongsToMany('App\Models\Item', 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot('id', 'created_at', 'updated_at');
        
        /*
            1º Parâmetro: modelo do relacionamento NxN
            2º Parâmetro: tabela auxiliar que armazena os registros de relacionamento
            3º Parâmetro: FK da tabela mapeada
            4º Parâmetro: nome da FK da tabela mapeada pelo model no relacionamento que esta sendo implementado
        */
    }
}
