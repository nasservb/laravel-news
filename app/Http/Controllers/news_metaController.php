<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createnews_metaRequest;
use App\Http\Requests\Updatenews_metaRequest;
use App\Repositories\news_metaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class news_metaController extends AppBaseController
{
    /** @var  news_metaRepository */
    private $newsMetaRepository;

    public function __construct(news_metaRepository $newsMetaRepo)
    {
        $this->newsMetaRepository = $newsMetaRepo;
    }

    /**
     * Display a listing of the news_meta.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $newsMetas = $this->newsMetaRepository->all();

        return view('news_metas.index')
            ->with('newsMetas', $newsMetas);
    }

    /**
     * Show the form for creating a new news_meta.
     *
     * @return Response
     */
    public function create()
    {
        return view('news_metas.create');
    }

    /**
     * Store a newly created news_meta in storage.
     *
     * @param Createnews_metaRequest $request
     *
     * @return Response
     */
    public function store(Createnews_metaRequest $request)
    {
        $input = $request->all();

        $newsMeta = $this->newsMetaRepository->create($input);

        Flash::success('News Meta saved successfully.');

        return redirect(route('newsMetas.index'));
    }

    /**
     * Display the specified news_meta.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $newsMeta = $this->newsMetaRepository->find($id);

        if (empty($newsMeta)) {
            Flash::error('News Meta not found');

            return redirect(route('newsMetas.index'));
        }

        return view('news_metas.show')->with('newsMeta', $newsMeta);
    }

    /**
     * Show the form for editing the specified news_meta.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $newsMeta = $this->newsMetaRepository->find($id);

        if (empty($newsMeta)) {
            Flash::error('News Meta not found');

            return redirect(route('newsMetas.index'));
        }

        return view('news_metas.edit')->with('newsMeta', $newsMeta);
    }

    /**
     * Update the specified news_meta in storage.
     *
     * @param int $id
     * @param Updatenews_metaRequest $request
     *
     * @return Response
     */
    public function update($id, Updatenews_metaRequest $request)
    {
        $newsMeta = $this->newsMetaRepository->find($id);

        if (empty($newsMeta)) {
            Flash::error('News Meta not found');

            return redirect(route('newsMetas.index'));
        }

        $newsMeta = $this->newsMetaRepository->update($request->all(), $id);

        Flash::success('News Meta updated successfully.');

        return redirect(route('newsMetas.index'));
    }

    /**
     * Remove the specified news_meta from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $newsMeta = $this->newsMetaRepository->find($id);

        if (empty($newsMeta)) {
            Flash::error('News Meta not found');

            return redirect(route('newsMetas.index'));
        }

        $this->newsMetaRepository->delete($id);

        Flash::success('News Meta deleted successfully.');

        return redirect(route('newsMetas.index'));
    }
}
