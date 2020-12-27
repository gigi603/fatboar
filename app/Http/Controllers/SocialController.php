<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SocialConsentRequest;
use Validator, Redirect, Response, File;
use Socialite;
use App\Models\User;

class SocialController extends Controller
{
    //
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    // Get social login answer
    public function callback($provider, Request $request)
    {
        session()->put('state', $request->input('state'));
        $getInfo = Socialite::driver($provider)->user();
        $user = $this->findOrCreate($getInfo, $provider);
        $consent = $this->checkConsent($getInfo);

        if ($consent == 1) {
            auth()->login($user);
            return redirect()->to('/');
            // return $consent;
            // return var_dump(highlight_string("<?\n" . var_export($consent, true)));
        }
        // return view('auth.consent');
        return view('auth.consent')->with('user', $user);
        // return var_dump(highlight_string("<?\n" . var_export($consent, true)));
    }

    // Find or create user
    function findOrCreate($getInfo, $provider)
    {
        $user = User::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            $user = User::create([
                'name'     => $getInfo->name,
                'email'    => $getInfo->email,
                'provider' => $provider,
                'provider_id' => $getInfo->id
            ]);
        }
        return $user;
    }

    // Check user consent
    function checkConsent($getInfo)
    {
        $consent = 0;
        $user = User::where('email', $getInfo->email)->first();
        if ($user->majeur == 1 && $user->newsletter == 1 && $user->cgu == 1) {
            $consent = 1;
            return $consent;
        }
        return $consent;
    }

    // Get user consent
    public function storeConsent(SocialConsentRequest $request)
    {
        $findUser = $request->get('email');
        $user = User::where('email', $findUser)->first();
        try {
            $user->cgu = $request->get('cgu');
            $user->majeur = $request->get('majeur');
            $user->newsletter = $request->get('newsletter');
            $user->save();

            auth()->login($user);
            return redirect()->to('/');
        } catch (Exception $e) {
            Bugsnag::notifyException($e);
            return redirect()->back();
        }
        return redirect()->back()->with('user', $user);
    }
}
