<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma_Disciplina extends Model
{
    use HasFactory;

    protected $primaryKey = 'idTurma';
    
    protected $fillable = [
        'idTurma',
        'idDisciplina',
    ];

    public function turma()
    {
        return $this->belongsTo(Turma::class, 'idTurma');
    }

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class, 'idDisciplina');
    }
}
