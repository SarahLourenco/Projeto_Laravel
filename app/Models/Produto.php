<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 
class Produto extends Model
{     
        protected $fillable = ['nome', 'descricao', 'qtd', 'custo', 'valor'];

    public function materias (){ // EXIBE O PRODUTO E A MATERIA PRIMA Q CONTEM
        return $this->belongsToMany(Materiaprima::class);
    }
}
