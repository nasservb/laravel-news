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
use App\Models\news; 

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
       $data['news'] = $this->newsRepository->paginate(10);
		
       $data['categories']=$this->ToIndexedArray((new category())->all()->toArray());
		
       $data['statuses']=$this->ToIndexedArray((new status())->all()->toArray());
		
		

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

        $data['categories']=$this->ToIndexedArray((new category())->all()->toArray());
		
        $data['statuses']=$this->ToIndexedArray((new status())->all()->toArray());

        $data['tags']=$this->ToIndexedArray((new tags())->all()->toArray());


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
        
        $validator = Validator::make($request->all(),[
            'title'=>'string|required',
            'content'=>'string|nullable', 
        ]);
       
 
        if($validator->fails())
        {  
            if($validator->fails()){
                return back()->withErrors(['err'=>'عنوان مطلب وارد نشده است.'])->withInput();
            }
        }


        $input['user_id']=Auth::user()->id;




        $tags = $input['tag']; 

        $input['tag'] = ''; 

 
        $news = $this->newsRepository->create($input);


        if (isset($input['categories']) ) 
        {
            $inputCats = tags::find($input['categories']);
         
            $news->categories()->attach($inputCats); 
 
        }
        
         
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
 
        $lastTags = $this->ToIndexedArray( (new tags())->all()->toArray());
     
 
        $newKey = array_values($tags);

        if (count($tags)> 0)
        {
            foreach ($tags as $key => $value) {

                if (!array_key_exists($value,$lastTags))
                { 

                    $insertingTag = new tags(); 

                    $insertingTag->tag = $value;

                    $insertingTag->save();                     
                    
                    $newKey[] = $insertingTag->id; 

                }               

            } 
        }

        $inputTags = tags::find($newKey);
        $news->tags()->attach($inputTags);

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
        
        $data=array(); 
        
        $data['imageKey']=time();

        $data['categories']=$this->ToIndexedArray((new category())->all()->toArray());
		
        $data['statuses']=$this->ToIndexedArray((new status())->all()->toArray());

        $data['tags']=$this->ToIndexedArray((new tags())->all()->toArray());

        $data['news']=$news;

        return view('news.edit', $data);

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


        $validator = Validator::make($request->all(),[
            'title'=>'string|required',
            'content'=>'string|nullable', 
        ]);
       
 
        if($validator->fails())
        {  
            if($validator->fails()){
                return back()->withErrors(['err'=>'عنوان مطلب وارد نشده است.'])->withInput();
            }
        }

        $input = $request->all();

        $newTags = $input['tag']; 


        $lastTags = $this->ToIndexedArray( (new tags())->all()->toArray());

    
        $newKey = array_values($newTags);
        //calculate new tag and insert that, when it exsist in db
        if (count($newTags)> 0)
        {
            foreach ($newTags as $key => $value) {

                if (!array_key_exists($value,$lastTags))
                { 
                    $insertingTag = new tags(); 

                    $insertingTag->tag = $value;
                    $insertingTag->save();  

                    $newKey[] = $insertingTag->id ; 
                } 

            }
        }

        $news->tags()->sync($newKey ); 

          
        $news->categories()->sync($input['categories']); 
 
        $news = $this->newsRepository->update($input, $id);


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


}
