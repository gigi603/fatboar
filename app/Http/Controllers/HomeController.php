<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CodeRequest;
use App\Services\UsersService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $users_service;

    public function __construct(UsersService $users_service)
    {
        $this->users_service = $users_service;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $gagnant = $this->users_service->getGagnant();
        return view('welcome')->with('gagnant', $gagnant);
    }

    public function cgu()
    {
        return view('cgu');
    }

    public function faq()
    {
        return view('faq');
    }

    public function politique()
    {
        return view('politique');
    }

    public function mentions_legales()
    {
        return view('mentions_legales');
    }
}
