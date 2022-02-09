<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Fornecedor extends Model
{
    use HasFactory;
    use SoftDeletes;

    //sobrepõe a nomeação automática do laravel
    protected $table = 'fornecedores';

    //configura quais colunas podem ser alteradas pelo método fill
    protected $fillable = ['nome', 'site', 'uf', 'email'];

    public function produtos() {
        return $this->hasMany('App\Models\Item', 'fornecedor_id', 'id');
    }
}
