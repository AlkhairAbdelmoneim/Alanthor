<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Blog;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class WelcomeController extends Controller
{
    public function index()
    {
        $lan = getCurrentLocale();
        
        $services = Services::where('translation_lang' ,getDefaultLang())->paginate(PAGINATION_COUNT);

        dataFilter($services);
        return view('home' ,compact('services'));
        
    }


    public function blog()
    {
        $services = Services::where('translation_lang' ,getDefaultLang())->paginate(PAGINATION_COUNT);

        dataFilter($services);
        $blogs = Blog::where('translation_lang' ,getDefaultLang())->paginate(PAGINATION_COUNT);
        return view('blog' ,compact('blogs' ,'services'));
    }

    public function single($id)
    {
        $services = Services::where('translation_lang' ,getDefaultLang())->paginate(PAGINATION_COUNT);

        dataFilter($services);
        $single = Blog::find($id);

        if (!$single) {

            return view('404');

        } else {
            
            return view('single' ,compact('single' ,'services'));

        }
        
        
    }


    public function store(ContactRequest $request)
    {

        $request_data = $request->except(['_token']);
    
        if ($request_data == null) {
            
            return response()->json(['ErrorMessage' => 'هنالك مشكلة ما رجاء حاول مرة اخري']);

        }else {
            
            $request_data = Contact::create($request_data);

            return response()->json(['SuccessMessage' => 'تم إرسال الرسالة بنجاح']);

        }

    }
}
