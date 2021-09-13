<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreService;
use DB;


class ServicesController extends Controller
{

    public function index(Request $request)
    {

        try {
            
            $lan = getCurrentLocale();

            $services = Services::where('translation_lang' ,$lan)->when($request->search , function($query) use($request){
    
                return $query->where('name' , 'like' , '%' .$request->search . '%')
                ->orWhere('translation_lang' , 'like' , '%' .$request->search. '%');
    
            })->latest()->paginate(PAGINATION_COUNT);         
    
            $services = dataFilter($services);
            return view('dashboard.services.index', compact('services'));

        } catch (\Throwable $th) {
            
            $noty = getMessage(__('هنالك خطأ ما برجاي المحاوله لاحقا') ,'warning');
            return redirect()->route('services.index')->with($noty);

        }
    }


    public function create()
    {
        return view('dashboard.services.create');
    }


    public function store(StoreService $request)
    {
        // try {

             $request_data = $request->all();
            
            if ($request->image) {

                Image::make($request->image)->resize(800, 700)->save(public_path('uploads/img/' .$request->image->hashName()));
    
                $request_data['image'] = $request->image->hashName();

                $services =  collect($request->service);
    
                $filter = $services -> filter(function($value , $key){
                    return $value['translation_lang'] == getDefaultLang();
                });
        
                $service_data = array_values($filter->all())[0];
        
                DB::beginTransaction();
                $service_id = Services::insertGetId([
                    'translation_lang' => $service_data['translation_lang'],
                    'translation_of' => 0,
                    'name' => $service_data['name'],
                    'description' => $service_data['description'],
                    'image' => $request_data['image'],
                ]);
        
                $filter = $services -> filter(function($value , $key){
                    return $value['translation_lang'] != getDefaultLang();
                });
        
                if (isset($filter) && $filter->count() > 0) {
                    
                    $services_all = [];
                    foreach ($filter as $key => $value) {
                       
                        $services_all = [
                            'translation_lang' => $value['translation_lang'],
                            'translation_of' => $service_id,
                            'name' => $value['name'],
                            'description' => $value['description'],
                            'image' => $request_data['image'],
                        ];
                    }
        
                    Services::insert($services_all);
        
                    DB::commit();
        
                    $noty = getMessage(__('site.added_successfully') ,'success');
                    return redirect()->route('services.index')->with($noty);
                }

            }else {
                
                $services =  collect($request->service);
    
                $filter = $services -> filter(function($value , $key){
                    return $value['translation_lang'] == getDefaultLang();
                });
        
                $service_data = array_values($filter->all())[0];
        
                DB::beginTransaction();
                $service_id = Services::insertGetId([
                    'translation_lang' => $service_data['translation_lang'],
                    'translation_of' => 0,
                    'name' => $service_data['name'],
                    'description' => $service_data['description'],
                ]);
        
                $filter = $services -> filter(function($value , $key){
                    return $value['translation_lang'] != getDefaultLang();
                });
        
                if (isset($filter) && $filter->count() > 0) {
                    
                    $services_all = [];
                    foreach ($filter as $key => $value) {
                       
                        $services_all = [
                            'translation_lang' => $value['translation_lang'],
                            'translation_of' => $service_id,
                            'name' => $value['name'],
                            'description' => $value['description'],
                        ];
                    }
        
                    Services::insert($services_all);
        
                    DB::commit();
        
                    $noty = getMessage(__('site.added_successfully') ,'success');
                    return redirect()->route('services.index')->with($noty);
                }
            }
    


        // } catch (\Throwable $th) {
           
            $noty = getMessage(__('هنالك خطأ ما برجاي المحاوله لاحقا') ,'warning');
            return redirect()->route('services.index')->with($noty);

        // }
    }


    // public function show(Services $services)
    // {
    //     //
    // }

    public function edit(Services $services ,$id)
    {
        try {
            
            $service = Services::with('services')->selection()->find($id);
            
            if (isset($service) && $service->count() != 0) {
   
               return view('dashboard.services.edit',compact('service'));
   
            } else {
   
               $noty = getMessage(__('هنالك خطأ ما برجاي المحاوله لاحقا') ,'warning');
               return redirect()->route('services.index')->with($noty);
            }
        } catch (\Throwable $th) {

            $noty = getMessage(__('هنالك خطأ ما برجاي المحاوله لاحقا') ,'warning');
            return redirect()->route('services.index')->with($noty);
        }
        
    }


    public function update(Services $services,StoreService $request ,$id)
    {

        try {
            
            $service = $services->where('id' ,$id)->get()[0];

            if ($request->image) {
                
                if ($request->image != 'default.png') {
                    
                    Storage::disk('public_uploads')->delete('/img/' .$service->image);
    
                    Image::make($request->image)->resize(800, 700)->save(public_path('uploads/img/' .$request->image->hashName()));
    
                    $request_data = $request->image->hashName(); 
                    
                    $service->update([
                        'image' => $request_data
                    ]);
                    
                }
            }
    
            $service_data = array_values($request->service)[0];
    
            if (isset($service) && $service->count() != 0) {
    
                $service->update([
    
                    'name' => $service_data['name'],
                    'description' => $service_data['description'],
        
                ]);
    
                $noty = getMessage(__('site.updated_successfully') ,'success');
                return redirect()->route('services.index')->with($noty);
    
            } else {
    
                $noty = getMessage(__('هنالك خطأ ما برجاي المحاوله لاحقا') ,'warning');
                return redirect()->route('services.index')->with($noty);
            }
            
        } catch (\Throwable $th) {
            
            $noty = getMessage(__('هنالك خطأ ما برجاي المحاوله لاحقا') ,'warning');
            return redirect()->route('services.index')->with($noty);

        }
    }

    public function destroy(Services $services ,$id)
    {
        
        try {
            
            $data = $services->where('id' , $id)->get()[0];

            if ($data->image != 'default.png') {
                
                Storage::disk('public_uploads')->delete('/img/' .$data->image);
            }   
    
            if (!$data) {
    
                $noty = getMessage(__('هنالك خطأ ما برجاي المحاوله لاحقا') ,'warning');
                return redirect()->route('services.index')->with($noty);
    
            } else {
                
                $data->delete();
    
                $noty = getMessage(__('site.deleted_successfully') ,'success');
                return redirect()->route('services.index')->with($noty);
            }

        } catch (\Throwable $th) {
            
            $noty = getMessage(__('هنالك خطأ ما برجاي المحاوله لاحقا') ,'warning');
            return redirect()->route('services.index')->with($noty);
            
        }
        
    }
}
