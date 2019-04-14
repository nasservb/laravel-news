<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreatepictureRequest;
use App\Http\Requests\UpdatepictureRequest;
use App\Repositories\pictureRepository;
use App\Http\Controllers\Admin\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class pictureController extends AppBaseController
{
    /** @var  pictureRepository */
    private $pictureRepository;

    public function __construct(pictureRepository $pictureRepo)
    {
        $this->pictureRepository = $pictureRepo;
    }

    /**
     * Display a listing of the picture.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pictures = $this->pictureRepository->all();

        return view('pictures.index')
            ->with('pictures', $pictures);
    }

    /**
     * Show the form for creating a new picture.
     *
     * @return Response
     */
    public function create()
    {
        return view('pictures.create');
    }

    /**
     * Store a newly created picture in storage.
     *
     * @param CreatepictureRequest $request
     *
     * @return Response
     */
    public function store(CreatepictureRequest $request)
    {
        $input = $request->all();

        $picture = $this->pictureRepository->create($input);

        Flash::success('Picture saved successfully.');

        return redirect(route('pictures.index'));
    }

    /**
     * Display the specified picture.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $picture = $this->pictureRepository->find($id);

        if (empty($picture)) {
            Flash::error('Picture not found');

            return redirect(route('pictures.index'));
        }

        return view('pictures.show')->with('picture', $picture);
    }

    /**
     * Show the form for editing the specified picture.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $picture = $this->pictureRepository->find($id);

        if (empty($picture)) {
            Flash::error('Picture not found');

            return redirect(route('pictures.index'));
        }

        return view('pictures.edit')->with('picture', $picture);
    }

    /**
     * Update the specified picture in storage.
     *
     * @param int $id
     * @param UpdatepictureRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepictureRequest $request)
    {
        $picture = $this->pictureRepository->find($id);

        if (empty($picture)) {
            Flash::error('Picture not found');

            return redirect(route('pictures.index'));
        }

        $picture = $this->pictureRepository->update($request->all(), $id);

        Flash::success('Picture updated successfully.');

        return redirect(route('pictures.index'));
    }

    /**
     * Remove the specified picture from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $picture = $this->pictureRepository->find($id);

        if (empty($picture)) {
            Flash::error('Picture not found');

            return redirect(route('pictures.index'));
        }

        $this->pictureRepository->delete($id);

        Flash::success('Picture deleted successfully.');

        return redirect(route('pictures.index'));
    }
}
