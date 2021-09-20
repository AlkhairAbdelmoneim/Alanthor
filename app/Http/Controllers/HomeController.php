<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\User;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Services;
use Hash;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $lan = getCurrentLocale();

        $BlogCount = Blog::count();
        $last_blogs = Blog::orderBy('created_at' , 'desc')->take(4)->get();
        
        $ServiceCount = Services::count();
        $last_ervices = Services::orderBy('created_at' , 'desc')->take(4)->get();

        $ContactCount = Contact::count();
        $last_contact = Contact::orderBy('created_at' , 'desc')->take(4)->get();

        $ProductCount = Product::count();
        $last_product = Product::where('translation_lang' ,$lan)->orderBy('created_at' , 'desc')->take(4)->get();

        

        return view('dashboard.welcome',compact('BlogCount','last_blogs','ServiceCount','last_ervices','ContactCount' ,'ProductCount','last_product','last_contact'));

    }

    public function change(Request $request)
    {

        $this->validate($request, [ 
            'new_password' => 'required|min:8',
            'old_password' => 'required',
        ]);
 
        $hashedPassword = Auth::user()->password;
        if (\Hash::check($request->old_password , $hashedPassword)) {
            if (\Hash::check($request->new_password , $hashedPassword)) {
 
                $users = User::find(Auth::user()->id);
                $users->password = bcrypt($request->new_password);
                $users->save();

                $noty = getMessage('تم تغيير كلمة المرور بنجاح' ,'success');
                return redirect()->route('home')->with($noty);
            }
            else{

                $noty = getMessage('لا يمكن أن تكون كلمة المرور الجديدة هي كلمة المرور القديمة!' ,'warning');
                return redirect()->route('home')->with($noty);
            } 
        }
        else{

            $noty = getMessage('كلمة المرور القديمة غير متطابقة' ,'warning');
            return redirect()->route('home')->with($noty);
        }
    }
}
