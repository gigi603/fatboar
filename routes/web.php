<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//Visiteur routes

/*
|--------------------------------------------------------------------------
| Demo Routes
|--------------------------------------------------------------------------
*/

Route::get('demo', 'DemoController@home');
Route::get('demo/login', 'DemoController@login');
Route::get('demo/profile', 'DemoController@showProfile'); // todo
Route::get('demo/consent', 'DemoController@consent');
Route::get('demo/contact', 'DemoController@contact');
Route::get('demo/register', 'DemoController@register');
Route::get('demo/email', 'DemoController@changePassword');
Route::get('demo/user/home', 'DemoController@userHome');
Route::get('demo/user/prize', 'DemoController@userPrize');
Route::get('demo/user/tickets', 'DemoController@userTickets');
Route::get('demo/admin/home', 'DemoController@adminHome');
Route::get('demo/admin/champ', 'DemoController@findChamp');
Route::get('demo/admin/list', 'DemoController@adminTicketList');
Route::get('demo/manager/home', 'DemoController@managerHome');
Route::get('demo/manager/stats', 'DemoController@managerStats');
Route::get('demo/ticket/search', 'DemoController@findTicket');
Route::get('demo/cashier/home', 'DemoController@cashierHome');
Route::get('demo/cashier/list', 'DemoController@cashierTicketList');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Page d'accueil

Route::get('/', 'HomeController@index')->name('home');

Route::get('/cgu', 'HomeController@cgu')->name('cgu');

Route::get('/faq', 'HomeController@faq')->name('faq');

Route::get('/politique', 'HomeController@politique')->name('politique');
Route::get('/mentions_legales', 'HomeController@mentions_legales')->name('mentions_legales');

//Page de formulaire de contact
Route::get('/contact', 'ContactController@contactPage')->name('contact');

// Envoie du message aux admins
Route::post('/contacter', 'ContactController@contactAdminByGuest')->name('contactAdminByGuest.envoyer');

// Connexion avec les réseaux sociaux
Route::get('auth/{provider}', 'SocialController@redirect');
Route::get('auth/{provider}/callback', 'SocialController@callback');
Route::post('auth/social/consent', 'SocialController@storeConsent')->name('get.consent');

Route::middleware(['auth'])->group(function () {

    //Utilisateur
    //Page pour participer en activant son numero gagnant
    Route::get('/participer', 'UsersController@participer')->name('user.participer');

    //Activation du ticket si elle figure dans la bdd et si elle n'a pas été activé avant
    Route::post('/gagner', 'UsersController@gagner')->name('user.gagner');

    //Page de confirmation du gain(récompense) lié au ticket à venir chercher en magasin
    Route::get('/recompense', 'UsersController@recompense')->name('user.recompense');

    //Profile de l'utilisateur/caissiere/manager/admin
    Route::get('/profile/{id}', 'UsersController@profile')->name('profile');

    //Contenu du message
    Route::get('/message/{id}', 'UsersController@message')->name('communs.message');

    //Liste des tickets ainsi que leurs états
    Route::get('/gains', 'UsersController@gains')->name('user.gains');

    Route::post('/user/edit/{id}', 'UsersController@edit')->name('user.edit');

    // Formulaire de contact, message à envoyer aux admins
    Route::get('/utilisateur/contact/', 'ContactController@contactPageUtilisateur')->name('communs.contact');
    Route::post('/utilisateur/contacter', 'ContactController@contacterAdmin')->name('contacterAdmin.envoyer');

    //Caissiere
    Route::get('/dashboard/caissiere', 'UsersController@dashboardCaissiere')->name('caissiere.dashboard');
    Route::get('/caissiere/searchtickets', 'UsersController@searchTickets')->name('caissiere.getSearchTickets');
    Route::get('/caissiere/generate/ticket', 'UsersController@generateTicketCaisse')->name('caissiere.generateTicketCaisse');
    Route::get('/listMessages/caissiere', 'UsersController@listMessagesCaissiere')->name('caissiere.listMessages');
    Route::get('/tickets/caissiere/{id}', 'UsersController@gainsUser')->name('caissiere.gainsUser');
    Route::get('/utilisateurs/caissiere', 'UsersController@listeUtilisateursCaissiere')->name('caissiere.utilisateurs');
    Route::post('/recompense/recuperer/{id}', 'UsersController@recompenseRecupererCaissiere')->name('caissiere.recompense_recuperer');

    //Manager
    Route::get('/dashboard/manager', 'UsersController@dashboardManager')->name('manager.dashboard');
    Route::get('/statistiquesRecompensesInitiales/manager', 'UsersController@statistiqueRecompensesInitiales')->name('manager.statistiqueRecompensesInitiales');
    Route::get('/statistiqueParticipants/manager', 'UsersController@statistiqueParticipants')->name('manager.participants');
    Route::get('/statistique/manager', 'UsersController@statistiqueLineManager')->name('manager.statistiques');
    Route::get('/listMessages/manager', 'UsersController@listMessagesManager')->name('manager.listMessages');

    //Admin
    Route::get('/dashboard/admin', 'UsersController@dashboardAdmin')->name('admin.dashboard');
    Route::post('/groslot', 'UsersController@grosLot')->name('groslot');
    Route::get('/listRestaurants/admin', 'UsersController@listRestaurants')->name('admin.listRestaurants');
    Route::get('/listPersonnels/admin', 'UsersController@listPersonnels')->name('admin.listPersonnels');
    Route::get('/utilisateurs/admin', 'UsersController@listeUtilisateursAdmin')->name('admin.utilisateurs');
    Route::get('/listMessagesClients/admin', 'UsersController@listMessagesClients')->name('admin.messagesClients');
    Route::get('/messageClient/admin/{id}', 'UsersController@message')->name('admin.messageClient');
    Route::get('/listMessages/admin', 'UsersController@listMessagesAdmin')->name('admin.listMessages');
    Route::get('/messagePersonnel/admin/{id}', 'UsersController@messagePersonnel')->name('admin.messages');
    Route::get('/contact/admin', 'ContactController@contactPageAdmin')->name('admin.contact');
    Route::get('/contactPersonnel/admin', 'ContactController@contactPagePersonnelAdmin')->name('admin.contactPagePersonnel');
    Route::post('/contacterPersonnel/admin', 'ContactController@contacterPersonnel')->name('admin.contacterPersonnel');
    Route::post('/contacterUtilisateur/admin', 'ContactController@contacterUtilisateur')->name('admin.contacterUtilisateur');
    Route::get('/exportUtilisateursNewsletters/admin', 'UsersController@exportsUtilisateursNewsletters')->name('export.users_newsletters');
    Route::get('/gagnant', 'UsersController@voirGagnant')->name('voir.gagnant');




    //Personnel

    // Admin et caissière ont accès à la liste des utilisateurs
    Route::get('/utilisateurs/client', 'UsersController@listeUtilisateurs')->name('personnel.utilisateurs');
    Route::get('/nouveauMessage/personnel', 'UsersController@nouveauMessagePersonnel')->name('personnel.nouveauMessage');
});
