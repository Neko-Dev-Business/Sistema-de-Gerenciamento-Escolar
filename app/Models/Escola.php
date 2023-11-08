<?php

// app/Models/Escola.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomeEscola',
        'secretariaEscola',
        'diretoraEscola',
        'enderecoEscola',
        'emailEscola',
        'telefoneEscola',
        'assinaturaDiretoraEscola',
        'cnpjEscola',
    ];

    // Outros campos e relacionamentos podem ser adicionados conforme necessário
}
