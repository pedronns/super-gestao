<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Pedido;

class Cliente extends Model
{
    protected $fillable = ['nome'];

    public function pedidos() {
        return $this->hasMany('App\Models\Pedido');
    }
}
