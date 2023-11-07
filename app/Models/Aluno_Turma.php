<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno_Turma extends Model
{
    use HasFactory;

    // Defina o nome da tabela explicitamente
    protected $table = 'alunos_turmas';

    protected $primaryKey = 'idPessoa';

    protected $fillable = [
        'idPessoa',
        'idTurma',
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'idPessoa');
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class, 'idTurma');
    }
}
