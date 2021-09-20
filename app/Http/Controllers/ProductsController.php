<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreService;
use DB;

class ProductsController extends Controller
{

    public function index(Request $request)
    {

        try {
            
            $lan = getCurrentLocale();

            $products = Product::where('translation_lang' ,$lan)->when($request->search , function($query) use($request){
    
                return $query->where('name' , 'like' , '%' .$request->search . '%')
                ->orWhere('translation_lang' , 'like' , '%' .$request->search. '%');
    
            })->latest()->paginate(PAGINATION_COUNT);         
    
            $products = dataFilter($products);
            return view('dashboard.product.index', compact('products'));

        } catch (\Throwable $th) {
            
            $noty = getMessage(__('هنالك خطأ ما برجاي المحاوله لاحقا') ,'warning');
            return redirect()->route('products.index')->with($noty);
            
        }
    }


    public function create()
    {
        return view('dashboard.product.create');
    }


    public function store(StoreService $request)
    {
        try {

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
                 $service_id = Product::insertGetId([
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
        
                    Product::insert($services_all);
        
                    DB::commit();
        
                    $noty = getMessage(__('site.added_successfully') ,'success');
                    return redirect()->route('products.index')->with($noty);
                }

            }else {
                
                $services =  collect($request->service);
    
                $filter = $services -> filter(function($value , $key){
                    return $value['translation_lang'] == getDefaultLang();
                });
        
                $service_data = array_values($filter->all())[0];
        
                 DB::beginTransaction();
                 $service_id = Product::insertGetId([
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
        
                    Product::insert($services_all);
        
                    DB::commit();
        
                    $noty = getMessage(__('site.added_successfully') ,'success');
                    return redirect()->route('products.index')->with($noty);
                }
            }
    
        } catch (\Throwable $th) {
           
            $noty = getMessage(__('هنالك خطأ ما برجاي المحاوله لاحقا') ,'warning');
            return redirect()->route('products.index')->with($noty);

        }

    } // end of store


    // public function show(Product $product)
    // {
    //     //
    // }


    public function edit($id)
    {
        // try {

            $service = Product::with('products')->selection()->find($id);

            if (isset($service) && $service->count() != 0) {
   
               return view('dashboard.product.edit',compact('service'));
   
            } else {
   
               $noty = getMessage(__('هنالك خطأ ما برجاي المحاوله لاحقا') ,'warning');
               return redirect()->route('services.index')->with($noty);
            }
        // } catch (\Throwable $th) {

            $noty = getMessage(__('هنالك خطأ ما برجاي المحاوله لاحقا') ,'warning');
            return redirect()->route('products.index')->with($noty);
        // }
    }


    public function update(StoreService $request ,$id)
    {
        // try {
            
            $service = Product::where('id' ,$id)->get()[0];

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
                return redirect()->route('products.index')->with($noty);
    
            } else {
    
                $noty = getMessage(__('هنالك خطأ ما برجاي المحاوله لاحقا') ,'warning');
                return redirect()->route('products.index')->with($noty);
            }
            
        // } catch (\Throwable $th) {
            
            $noty = getMessage(__('هنالك خطأ ما برجاي المحاوله لاحقا') ,'warning');
            return redirect()->route('products.index')->with($noty);
            
        // }
    }


    public function destroy(Product $product)
    {
        try {
            
            $data = $product->where('id' , $product->id)->get()[0];

            if ($data->image != 'default.png') {
                
                Storage::disk('public_uploads')->delete('/img/' .$data->image);
            }   
    
            if (!$data) {
    
                $noty = getMessage(__('هنالك خطأ ما برجاي المحاوله لاحقا') ,'warning');
                return redirect()->route('products.index')->with($noty);
    
            } else {
                
                $data->delete();
    
                $noty = getMessage(__('site.deleted_successfully') ,'success');
                return redirect()->route('products.index')->with($noty);
            }

        } catch (\Throwable $th) {
            
            $noty = getMessage(__('هنالك خطأ ما برجاي المحاوله لاحقا') ,'warning');
            return redirect()->route('products.index')->with($noty);
            
        }
    }
}
