<?php

namespace App\Helpers;

use App\Models\Setting;
use App\Models\StudentRecord;
use App\Models\Subject;
use Hashids\Hashids;
use Illuminate\Support\Facades\Auth;


class Qs
{
    public static function getAllUserTypes($remove=[])
        {
            $data =  ['super_admin', 'admin', 'professor', 'visitante', 'funcionario', 'aluno', 'familiar'];
            return $remove ? array_values(array_diff($data, $remove)) : $data;
        }

    public static function getDefaultUserImage()
    {
        return asset('images/usuarios/perfil.png');
    }

}