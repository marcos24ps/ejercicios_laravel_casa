<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlumnosRequest;
use App\Http\Requests\UpdateAlumnosRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\AlumnosRepository;
use Illuminate\Http\Request;
use Flash;

class AlumnosController extends AppBaseController
{
    /** @var AlumnosRepository $alumnosRepository*/
    private $alumnosRepository;

    public function __construct(AlumnosRepository $alumnosRepo)
    {
        $this->alumnosRepository = $alumnosRepo;
    }

    /**
     * Display a listing of the Alumnos.
     */
    public function index(Request $request)
    {
        $alumnos = $this->alumnosRepository->paginate(10);

        return view('alumnos.index')
            ->with('alumnos', $alumnos);
    }

    /**
     * Show the form for creating a new Alumnos.
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created Alumnos in storage.
     */
    public function store(CreateAlumnosRequest $request)
    {
        $input = $request->all();

        $alumnos = $this->alumnosRepository->create($input);

        Flash::success('Alumnos saved successfully.');

        return redirect(route('alumnos.index'));
    }

    /**
     * Display the specified Alumnos.
     */
    public function show($id)
    {
        $alumnos = $this->alumnosRepository->find($id);

        if (empty($alumnos)) {
            Flash::error('Alumnos not found');

            return redirect(route('alumnos.index'));
        }

        return view('alumnos.show')->with('alumnos', $alumnos);
    }

    /**
     * Show the form for editing the specified Alumnos.
     */
    public function edit($id)
    {
        $alumnos = $this->alumnosRepository->find($id);

        if (empty($alumnos)) {
            Flash::error('Alumnos not found');

            return redirect(route('alumnos.index'));
        }

        return view('alumnos.edit')->with('alumnos', $alumnos);
    }

    /**
     * Update the specified Alumnos in storage.
     */
    public function update($id, UpdateAlumnosRequest $request)
    {
        $alumnos = $this->alumnosRepository->find($id);

        if (empty($alumnos)) {
            Flash::error('Alumnos not found');

            return redirect(route('alumnos.index'));
        }

        $alumnos = $this->alumnosRepository->update($request->all(), $id);

        Flash::success('Alumnos updated successfully.');

        return redirect(route('alumnos.index'));
    }

    /**
     * Remove the specified Alumnos from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $alumnos = $this->alumnosRepository->find($id);

        if (empty($alumnos)) {
            Flash::error('Alumnos not found');

            return redirect(route('alumnos.index'));
        }

        $this->alumnosRepository->delete($id);

        Flash::success('Alumnos deleted successfully.');

        return redirect(route('alumnos.index'));
    }
}
