<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAlumnosAPIRequest;
use App\Http\Requests\API\UpdateAlumnosAPIRequest;
use App\Models\Alumnos;
use App\Repositories\AlumnosRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class AlumnosAPIController
 */
class AlumnosAPIController extends AppBaseController
{
    private AlumnosRepository $alumnosRepository;

    public function __construct(AlumnosRepository $alumnosRepo)
    {
        $this->alumnosRepository = $alumnosRepo;
    }

    /**
     * Display a listing of the Alumnos.
     * GET|HEAD /alumnos
     */
    public function index(Request $request): JsonResponse
    {
        $alumnos = $this->alumnosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($alumnos->toArray(), 'Alumnos retrieved successfully');
    }

    /**
     * Store a newly created Alumnos in storage.
     * POST /alumnos
     */
    public function store(CreateAlumnosAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $alumnos = $this->alumnosRepository->create($input);

        return $this->sendResponse($alumnos->toArray(), 'Alumnos saved successfully');
    }

    /**
     * Display the specified Alumnos.
     * GET|HEAD /alumnos/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Alumnos $alumnos */
        $alumnos = $this->alumnosRepository->find($id);

        if (empty($alumnos)) {
            return $this->sendError('Alumnos not found');
        }

        return $this->sendResponse($alumnos->toArray(), 'Alumnos retrieved successfully');
    }

    /**
     * Update the specified Alumnos in storage.
     * PUT/PATCH /alumnos/{id}
     */
    public function update($id, UpdateAlumnosAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Alumnos $alumnos */
        $alumnos = $this->alumnosRepository->find($id);

        if (empty($alumnos)) {
            return $this->sendError('Alumnos not found');
        }

        $alumnos = $this->alumnosRepository->update($input, $id);

        return $this->sendResponse($alumnos->toArray(), 'Alumnos updated successfully');
    }

    /**
     * Remove the specified Alumnos from storage.
     * DELETE /alumnos/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Alumnos $alumnos */
        $alumnos = $this->alumnosRepository->find($id);

        if (empty($alumnos)) {
            return $this->sendError('Alumnos not found');
        }

        $alumnos->delete();

        return $this->sendSuccess('Alumnos deleted successfully');
    }
}
