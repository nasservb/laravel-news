<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreatenewsRequest;
use App\Http\Requests\UpdatenewsRequest;

use App\Repositories\newsRepository;
use App\Repositories\categoryRepository;
use App\Repositories\statusRepository;

use App\Http\Controllers\Admin\AppBaseController;

use App\Models\category;
use App\Models\status;
use App\Models\tags;

use App\Models\news_tag;

use App\Models\picture ;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use Flash;
use Response;

use Auth;

class newsController extends AppBaseController
{
    /** @var  newsRepository */
    private $newsRepository;

    public function __construct(newsRepository $newsRepo)
    {
        $this->newsRepository = $newsRepo;
    }

    /**
     * Display a listing of the news.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
       $data['news'] = $this->newsRepository->all();
		
       $data['categories']=$this->toIndexedArray((new category())->all()->toArray());
		
       $data['statuses']=$this->toIndexedArray((new status())->all()->toArray());
		
		

        return view('news.index',$data);
    }

    /**
     * Show the form for creating a new news.
     *
     * @return Response
     */
    public function create()
    {
        
        $data=array(); 
        
        $data['imageKey']=time();

        $data['categories']=$this->toIndexedArray((new category())->all()->toArray());
		
        $data['statuses']=$this->toIndexedArray((new status())->all()->toArray());

        $data['tags']=$this->toIndexedArray((new tags())->all()->toArray());


        return view('news.create',$data);

    }

    /**
     * Store a newly created news in storage.
     *
     * @param CreatenewsRequest $request
     *
     * @return Response
     */
    public function store(CreatenewsRequest $request)
    {
        $input = $request->all();
        
        $input['user_id']=Auth::user()->id;

        $input['categories']= implode($input['categories'], ',');

        $tags = $input['tag']; 

        $input['tag'] = ''; 

       /*
        $validator = Validator::make($request->all(),[
            'title'=>'string|required',
            'content'=>'string|nullable',
            'under_title'=>'string|nullable',
            'mobile'=>'required|regex:/^09[0-3][0-9]{8}$/u'
        ]);
       

        if($validator->fails())
        {

        }

 */
        $news = $this->newsRepository->create($input);


         
        $pictures = picture::where('user_id','=',Auth::user()->id)
                            ->where('item_type','=',$input['key'])
                            ->get(); 
        $pics= ''; 
        
        foreach($pictures as $picture)
        {
            $pics .= $picture->id . ','; 
            $picture->item_id = $news->id; 
            $picture->item_type = 'news'; 
            $picture->save(); 
        }       
        
        
        $news->pictures = $pics; 

        $news->save(); 

        news_tag::where('news_id','=',$news->id)
                        ->delete(); 
                

        $lastTags = $this->toIndexedArray( (new tags())->all()->toArray());

     

        $inputTag = ''; 

        
        foreach ($tags as $key => $value) {
            $inputTag .= $value .',';
        }
    
        if (count($tags)> 0)
        {
            foreach ($tags as $key => $value) {

                if (!in_array($value, array_values($lastTags)))
                { 
                    $insertingTag = new tags(); 

                    $insertingTag->tag = $value;
                    $insertingTag->save();
                     

                    $key = $insertingTag->id ; 
                }
                else 
                {
                    $key = array_search ( $value, $lastTags);
                }
                
                            
                news_tag::insert( array(
                                        'news_id' => $news->id,
                                        'tag_id' => $key,
                                        ));

            }

            $news->tag = $inputTag;

            $news->save(); 


        }

        Flash::success('News saved successfully.');  

        return redirect(route('news.index'));
    }

    /**
     * Display the specified news.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $news = $this->newsRepository->find($id);

        if (empty($news)) {
            Flash::error('News not found');

            return redirect(route('news.index'));
        }

        return view('news.show')->with('news', $news);
    }

    /**
     * Show the form for editing the specified news.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $news = $this->newsRepository->find($id);

        if (empty($news)) {
            Flash::error('News not found');

            return redirect(route('news.index'));
        }

        return view('news.edit')->with('news', $news);
    }

    /**
     * Update the specified news in storage.
     *
     * @param int $id
     * @param UpdatenewsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatenewsRequest $request)
    {
        $news = $this->newsRepository->find($id);

        if (empty($news)) {
            Flash::error('News not found');

            return redirect(route('news.index'));
        }

        $news = $this->newsRepository->update($request->all(), $id);

        Flash::success('News updated successfully.');

        return redirect(route('news.index'));
    }

    /**
     * Remove the specified news from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $news = $this->newsRepository->find($id);

        if (empty($news)) {
            Flash::error('News not found');

            return redirect(route('news.index'));
        }

        $this->newsRepository->delete($id);

        Flash::success('News deleted successfully.');

        return redirect(route('news.index'));
    }


    private function toIndexedArray($inArray  ) 
    {
        $result = array() ;
        
        foreach($inArray as $item )
        { 
            if (isset( $item['title'] )) 
            {
                $result[$item['id']  ] = $item['title']  ;
            }
            elseif (isset( $item['name'] )) 
            {
                $result[$item['id']  ] = $item['name']  ;
            }
            else 
            {
                $result[$item['id']  ] = $item['tag']  ;
            }
             
        }
        return $result;
    }
}
