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
    return view('auth.login');
});

Route::get('dashboard', function () {
    return view('dashboard.index');
});
// Route::get('logistiques', function (){
//     return view('logistiques.index');
// });

// Route::get('analyses', function (){
//     return view('analyses.index');
// });

// Route::get('logistique', function (){
//     return view('logistiques.faisabilite');
// });

Route::get('logout', 'LoginController@logout');

// Route::get('/reactifs/show/{reactif}', 'ReactifController@show');

Route::resource('analyses', 'AnalyseController');

Route::resource('fabricant', 'FabricantController');

Route::resource('demandes', 'DemandeController');

Route::resource('reactifs', 'ReactifController');

Route::resource('faisabilites', 'FaisabiliteController');

Route::resource('substances', 'SubsRefController');

Route::resource('objetEssai', 'objetEssaiController');

Route::resource('clients', 'ClientController');

Route::resource('materiels', 'MaterielController');

Route::resource('equipements', 'EquipementController');

Route::resource('tests', 'TestController');

// Route::get('substances', function (){
//     return view('substances.index');
// });
// Route::get('objetEssai', function (){
//     return view('objetEssai.index');
// });
Route::get('echantillons', function (){
    return view('echantillons.index');
});
Route::get('product-cart', function (){
    return view('ecommerce.product-cart');
});
Route::get('product-checkout', function (){
    return view('ecommerce.product-checkout');
});
Route::get('panels-wells', function (){
    return view('ui-elements.panels-wells');
});
Route::get('panel-ui-block', function (){
    return view('ui-elements.panel-ui-block');
});
Route::get('portlet-draggable', function (){
    return view('ui-elements.portlet-draggable');
});
Route::get('buttons', function (){
    return view('ui-elements.buttons');
});
Route::get('tabs', function (){
    return view('ui-elements.tabs');
});
Route::get('modals', function (){
    return view('ui-elements.modals');
});
Route::get('progressbars', function (){
    return view('ui-elements.progressbars');
});
Route::get('notification', function (){
    return view('ui-elements.notification');
});
Route::get('carousel', function (){
    return view('ui-elements.carousel');
});
Route::get('user-cards', function (){
    return view('ui-elements.user-cards');
});
Route::get('timeline', function (){
    return view('ui-elements.timeline');
});
Route::get('timeline-horizontal', function (){
    return view('ui-elements.timeline-horizontal');
});
Route::get('range-slider', function (){
    return view('ui-elements.range-slider');
});
Route::get('ribbons', function (){
    return view('ui-elements.ribbons');
});
Route::get('steps', function (){
    return view('ui-elements.steps');
});
Route::get('session-idle-timeout', function (){
    return view('ui-elements.session-idle-timeout');
});
Route::get('session-timeout', function (){
    return view('ui-elements.session-timeout');
});
Route::get('bootstrap-ui', function (){
    return view('ui-elements.bootstrap');
});
Route::get('starter-page', function (){
    return view('pages.starter-page');
});
Route::get('blank', function (){
    return view('pages.blank');
});
Route::get('blank', function (){
    return view('pages.blank');
});
Route::get('search-result', function (){
    return view('pages.search-result');
});
Route::get('custom-scroll', function (){
    return view('pages.custom-scroll');
});
Route::get('lock-screen', function (){
    return view('pages.lock-screen');
});
Route::get('recoverpw', function (){
    return view('pages.recoverpw');
});
Route::get('animation', function (){
    return view('pages.animation');
});
Route::get('profile', function (){
    return view('pages.profile');
});
Route::get('invoice', function (){
    return view('pages.invoice');
});
Route::get('gallery', function (){
    return view('pages.gallery');
});
Route::get('pricing', function (){
    return view('pages.pricing');
});
Route::get('400', function (){
    return view('pages.400');
});
Route::get('403', function (){
    return view('pages.403');
});
Route::get('404', function (){
    return view('pages.404');
});
Route::get('500', function (){
    return view('pages.500');
});
Route::get('503', function (){
    return view('pages.503');
});
Route::get('form-basic', function (){
    return view('forms.form-basic');
});
Route::get('form-layout', function (){
    return view('forms.form-layout');
});
Route::get('icheck-control', function (){
    return view('forms.icheck-control');
});
Route::get('form-advanced', function (){
    return view('forms.form-advanced');
});
Route::get('form-upload', function (){
    return view('forms.form-upload');
});
Route::get('form-dropzone', function (){
    return view('forms.form-dropzone');
});
Route::get('form-pickers', function (){
    return view('forms.form-pickers');
});
Route::get('basic-table', function (){
    return view('tables.basic-table');
});
Route::get('table-layouts', function (){
    return view('tables.table-layouts');
});
Route::get('data-table', function (){
    return view('tables.data-table');
});
Route::get('bootstrap-tables', function (){
    return view('tables.bootstrap-tables');
});
Route::get('responsive-tables', function (){
    return view('tables.responsive-tables');
});
Route::get('editable-tables', function (){
    return view('tables.editable-tables');
});
Route::get('inbox', function (){
    return view('inbox.inbox');
});
Route::get('inbox-detail', function (){
    return view('inbox.inbox-detail');
});
Route::get('compose', function (){
    return view('inbox.compose');
});
Route::get('contact', function (){
    return view('inbox.contact');
});
Route::get('contact-detail', function (){
    return view('inbox.contact-detail');
});
Route::get('calendar', function (){
    return view('extra.calendar');
});
Route::get('widgets', function (){
    return view('extra.widgets');
});
Route::get('morris-chart', function (){
    return view('charts.morris-chart');
});
Route::get('peity-chart', function (){
    return view('charts.peity-chart');
});
Route::get('knob-chart', function (){
    return view('charts.knob-chart');
});
Route::get('sparkline-chart', function (){
    return view('charts.sparkline-chart');
});
Route::get('simple-line', function (){
    return view('icons.simple-line');
});
Route::get('fontawesome', function (){
    return view('icons.fontawesome');
});
Route::get('map-google', function (){
    return view('maps.map-google');
});
Route::get('map-vector', function (){
    return view('maps.map-vector');
});

Auth::routes();

//Route::get('{page_name}', function($page_name)
//{
//    //
//    return \Illuminate\Support\Facades\View::make($page_name);
//});

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
