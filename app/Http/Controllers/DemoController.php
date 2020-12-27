<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DemoController extends Controller
{
    //
    // 'start_date'  => 'date_format:Y-m-d|after:today'
    // 'start_date'  =>  'required|date',
    // 'birth_date' => 'date'
    // 'birth_date' => 'date_format:m/d/Y'
    /* $rules = ['start_date'        => 'date_format:d/m/Y|after:3/13/2014'];*/
    // 'to' => ['required', 'date_format:Y-m-d']
    // 'publish_at' => 'nullable|date',

    // Show consent page
    public function consent()
    {
        return view('demo.auth.demo-consent');
    }
    //
    public function home()
    {
        return view('demo.demo-welcome');
    }
    //
    public function login()
    {
        return view('demo.auth.demo-login');
    }
    //
    public function register()
    {
        return view('demo.auth.demo-register');
    }
    //
    public function findTicket()
    {
        return view('demo.demo-search');
    }
    //
    public function contact()
    {
        return view('demo.demo-contact');
    }
    //
    public function changePassword()
    {
        return view('demo.passwords.email');
    }
    //
    public function userHome()
    {
        return view('demo.user.demo-user-home');
    }
    //
    public function userPrize()
    {
        return view('demo.user.demo-user-prize');
    }
    //
    public function userTickets()
    {
        return view('demo.user.demo-user-tickets');
    }
    //
    public function cashierHome()
    {
        return view('demo.cashier.demo-cashier-home');
    }
    //
    public function adminTicketList()
    {
        return view('demo.admin.demo-admin-list');
    }
    //
    public function cashierTicketList()
    {
        return view('demo.cashier.demo-cashier-list');
    }
    //
    public function adminHome()
    {
        return view('demo.admin.demo-admin-home');
    }
    //
    public function findChamp()
    {
        return view('demo.admin.demo-admin-champ');
    }
    //
    public function showProfile()
    {
        return view('demo.demo-profile');
    }
    //
    public function managerHome()
    {
        return view('demo.manager.demo-manager-home');
    }
    //
    public function managerStats()
    {
        return view('demo.manager.demo-manager-stats');
    }
}
