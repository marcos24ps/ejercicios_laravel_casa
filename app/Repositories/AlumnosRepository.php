<?php

namespace App\Repositories;

use App\Models\Alumnos;
use App\Repositories\BaseRepository;

class AlumnosRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nombre',
        'ciudad'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Alumnos::class;
    }
}
