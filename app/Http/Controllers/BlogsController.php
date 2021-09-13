<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\BlogStore;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreService;
use DB;
use Str;

class BlogsController extends Controller
{

    public function index(Request $request)
    {

        $lan = getCurrentLocale();

        $blogs = Blog::where('translation_lang' ,$lan)->when($request->search , function($query) use($request){

            return $query->where('title' , 'like' , '%' .$request->search . '%')
            ->orWhere('translation_lang' , 'like' , '%' .$request->search. '%');

        })->latest()->paginate(PAGINATION_COUNT);        

        $blogs->filter(function($value, $key){

            return $value->content = Str::limit($value->content , 30);
            
        }); 
        
        return view('dashboard.blog.index' ,compact('blogs'));  
    }


    public function create()
    {
        return view('dashboard.blog.create');
    }

 
    public function store(BlogStore $request)
    {
        
        try {
            
            $request_data = $request->all();
            
            if ($request->image) {
    
                Image::make($request->image)->resize(800, 700)->save(public_path('uploads/img/' .$request->image->hashName()));
    
                $request_data['image'] = $request->image->hashName();
    
                $blogs =  collect($request->blog);
        
                $filter = $blogs -> filter(function($value , $key){
                    return $value['translation_lang'] == getDefaultLang();
                });
        
                $blog_data = array_values($filter->all())[0];
        
                DB::beginTransaction();
                $blog_id = Blog::insertGetId([
                    'translation_lang' => $blog_data['translation_lang'],
                    'translation_of' => 0,
                    'title' => $blog_data['title'],
                    'content' => $blog_data['content'],
                    'image' => $request_data['image'],
                ]);
    
                $filter = $blogs -> filter(function($value , $key){
                    return $value['translation_lang'] != getDefaultLang();
                });
        
                if (isset($filter) && $filter->count() > 0) {
                    
                    $blogs_all = [];
                    foreach ($filter as $key => $value) {
                       
                        $blogs_all = [
                            'translation_lang' => $value['translation_lang'],
                            'translation_of' => $blog_id,
                            'title' => $value['title'],
                            'content' => $value['content'],
                            'image' => $request_data['image'],
                        ];
                    }
        
                    Blog::insert($blogs_all);
        
                    DB::commit();
        
                    $noty = getMessage(__('site.added_successfully') ,'success');
                    return redirect()->route('blog.index')->with($noty);
                }
                
            }else {
                
                $blogs =  collect($request->blog);
        
                $filter = $blogs -> filter(function($value , $key){
                    return $value['translation_lang'] == getDefaultLang();
                });
        
                $blog_data = array_values($filter->all())[0];
        
                DB::beginTransaction();
                $blog_id = Blog::insertGetId([
                    'translation_lang' => $blog_data['translation_lang'],
                    'translation_of' => 0,
                    'title' => $blog_data['title'],
                    'content' => $blog_data['content'],
                ]);
    
                $filter = $blogs -> filter(function($value , $key){
                    return $value['translation_lang'] != getDefaultLang();
                });
        
                if (isset($filter) && $filter->count() > 0) {
                    
                    $blogs_all = [];
                    foreach ($filter as $key => $value) {
                       
                        $blogs_all = [
                            'translation_lang' => $value['translation_lang'],
                            'translation_of' => $blog_id,
                            'title' => $value['title'],
                            'content' => $value['content'],
                        ];
                    }
        
                    Blog::insert($blogs_all);
        
                    DB::commit();
        
                    $noty = getMessage(__('site.added_successfully') ,'success');
                    return redirect()->route('blog.index')->with($noty);
                }
            }

        } catch (\Throwable $th) {
            
            $noty = getMessage(__('هنالك خطأ ما برجاي المحاوله لاحقا') ,'warning');
            return redirect()->route('blog.index')->with($noty);
        }
    }

    // public function show(Blog $blog)
    // {
    //     //
    // }

    public function edit($id)
    {

        try {

           $blog = Blog::with('blogs')->selection()->find($id);

            if (isset($blog) && $blog->count() != 0) {
   
               return view('dashboard.blog.edit',compact('blog'));
   
            } else {
   
               $noty = getMessage(__('هنالك خطأ ما برجاي المحاوله لاحقا') ,'warning');
               return redirect()->route('blog.index')->with($noty);
            }
        } catch (\Throwable $th) {

            $noty = getMessage(__('هنالك خطأ ما برجاي المحاوله لاحقا') ,'warning');
            return redirect()->route('blog.index')->with($noty);
        }
        
    }


    public function update(BlogStore $request, Blog $blogs ,$id)
    {

        // try {
            
            $blog = $blogs->find($id);

            if ($request->image) {
                
                if ($request->image != 'default.png') {
                    
                    Storage::disk('public_uploads')->delete('/img/' .$blog->image);
    
                    Image::make($request->image)->resize(800, 700)->save(public_path('uploads/img/' .$request->image->hashName()));
    
                    $request_data = $request->image->hashName(); 
                    
                    $blog->update([
                        'image' => $request_data
                    ]);
                    
                }
            }
    
            $blog_data = array_values($request->blog)[0];
        
            if (isset($blog) && $blog->count() != 0) {
    
                $blog->update([
    
                    'title' => $blog_data['title'],
                    'content' => $blog_data['content'],
        
                ]);
    
                $noty = getMessage(__('site.updated_successfully') ,'success');
                return redirect()->route('blog.index')->with($noty);
    
            } else {
    
                $noty = getMessage(__('هنالك خطأ ما برجاي المحاوله لاحقا') ,'warning');
                return redirect()->route('blog.index')->with($noty);
            }

        // } catch (\Throwable $th) {
            
            $noty = getMessage(__('هنالك خطأ ما برجاي المحاوله لاحقا') ,'warning');
            return redirect()->route('blog.index')->with($noty);
        // }
        
    }


    public function destroy(Blog $blogs ,$id)
    {
        try {
            
            $data = $blogs->where('id' , $id)->get()[0];

            if ($data->image != 'default.png') {
                
                Storage::disk('public_uploads')->delete('/img/' .$data->image);
            }   
    
            if (!$data) {
    
                $noty = getMessage(__('هنالك خطأ ما برجاي المحاوله لاحقا') ,'warning');
                return redirect()->route('blog.index')->with($noty);
    
            } else {
                
                $data->delete();
    
                $noty = getMessage(__('site.deleted_successfully') ,'success');
                return redirect()->route('blog.index')->with($noty);
            }

        } catch (\Throwable $th) {
            
            $noty = getMessage(__('هنالك خطأ ما برجاي المحاوله لاحقا') ,'warning');
            return redirect()->route('blog.index')->with($noty);
            
        }
    }
}
