<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Menu;
use App\Models\User;
use  Auth;
use Storage; 
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id_user = \Auth::user()->id;
        return view('dashboard');
    }

    public function view_profile()
    {
        return view('profile.view');
    }

    public function update_profile(Request $request)
    {
        $data = $request->all();
        if(Validator::make($data, ['name' => ['required', 'string', 'max:255']]))
        {
            $id = \Auth::user()->id;
            User::find($id)->update(['name' => $request->name]);
        }
    }

    public function update_profile_avatar(Request $request)
    {
        $data = $request->all();
        if(Validator::make($data, ['avatar' => ['required']]))
        {
            $id = \Auth::user()->id;
                    // dd($requestData);

            $id_user = \Auth::user()->id;
            $name = str_replace(' ','_', strtolower(trim(\Auth::user()->name)));
            $file_name = $name."-".time().".png"; 
            Storage::disk('public')->put('images/user/'.$file_name, file_get_contents($data['avatar']));
            unset($data['avatar']);
            $path = '/images/user/'.$file_name;
            $data['avatar'] = $path;
            $id_user = \Auth::user()->id;
            $user = User::findOrFail($id_user);
            $exists = Storage::disk('public')->exists($user->avatar);
            if($exists)
            {
                Storage::disk('local')->delete($user->avatar);
                Storage::disk('public')->delete($user->avatar);
            }
            $user->update($data);
            // User::find($id)->update(['name' => $request->name]);
        }
    }

    public function validate_password($id,$password)
    {
        $hash = Hash::make($password);
        $pass -> User::find($id)->first()->password;
        if (strcmp($hash, $pass) == 0) 
        {
            return true;
        }else
        {
            return f;
        }
        
    }

    public function setLocale($locale='cr'){
        if (!in_array($locale, ['cr', 'en'])){
            $locale = 'cr';
        }
        \Session::put('locale', $locale);
        return redirect(url(\URL::previous()));
        
    }
}
