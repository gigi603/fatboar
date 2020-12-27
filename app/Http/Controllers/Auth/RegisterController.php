<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Newsletter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use DateTime;
use GuzzleHttp;
use App\Mail\NewsletterUser;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function register(RegisterRequest $request)
    {
        try {
            $newsletters = Newsletter::all();
            $user = new User;
            $user->nom = $request->nom;
            $user->prenom = $request->prenom;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->telephone = $request->telephone;
            $date = explode('/', $request->date_naissance);
            $user->date_naissance = $date[2].'-'.$date[1].'-'.$date[0];
            
            if($request->has('newsletter')) {
                $request->newsletter = 1;
                $user->newsletter = $request->newsletter;
                foreach($newsletters as $newsletter){
                    Mail::to('fatboar.contact@gmail.com')->send(new NewsletterUser($newsletter));
                }
            } else{
                $request->newsletter = 0;
                $user->newsletter = $request->newsletter;
            }
            $user->save();

            return redirect(route('login'))->with('success', 'Merci pour votre inscription, vous pouvez dès à présent vous connecter sur le site.');
        } catch (Exception $e) { 
            abort(404);
        }
        //    
    }
}
