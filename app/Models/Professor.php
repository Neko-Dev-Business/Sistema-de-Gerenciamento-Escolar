<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pessoa;

class Professor extends Model
{
    use HasFactory;

    protected $primaryKey = 'idProfessor';

   protected $fillable = [
        'descricaoServico', 'dtContratacaoProfessor', 'dtDesligamentoProfessor', 'idPessoa'
    ];

}
