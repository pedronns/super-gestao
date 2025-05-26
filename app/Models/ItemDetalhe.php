<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    protected $table = 'produto_detalhes';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function item() {
        return $this->belongsTo('App\Models\Item', 'produto_id', 'id');
    }
}
