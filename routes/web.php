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

use GuzzleHttp\Client as HttpClient;


Route::get('/', function () {

    //////////////////////////// Pruebas guzzle/////////////////


    //$client = new HttpClient(['base_uri' => 'https://beta-bitoo-back.azurewebsites.net/api/']);
    //$response = $client->request('POST',"proveedor/obtener/lista_estados");

    //$datos = $response->getBody()->getContents();
    //$datos = json_decode($datos,true);
    //var_dump($datos);
    //var_dump($datos->data->lst_estado_proveedor);exit;
    //var_dump($datos);exit;
    //return  $datos;
    //$datosvista['lst_estado_proveedor'] = $datos->data->lst_estado_proveedor;




    ///////////////////////////////////////////////////////////////////////////////////////////////////////////

    //$client = new HttpClient(['base_uri' => 'https://beta-bitoo-back.azurewebsites.net/api/']);
    //$response = $client->request('POST','https://fx.currencysystem.com/webservices/CurrencyServer5.asmx/AllCurrencies',[
    //    'form_params' => ['licenseKey'=>'']
    //]);
    //var_dump($response->getBody()->getContents());exit;
    //return explode(';',$response->getBody()->getContents());
    //return view('listadoEstado',$datosvista);
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /*$client = new HttpClient(['base_uri' => 'https://beta-bitoo-back.azurewebsites.net/api/']);
    $response = $client->request('POST',"proveedor/obtener/lista_estados");
    //$datos = $response->getBody()->getContents();
    //return json_decode($datos);
    //return $datos;
    $arrayOb = ((array)json_decode($response->getBody())->data)['lst_estado_proveedor'];
    var_dump($arrayOb);exit;*/
    ///////////////////////////////////////////////////////////////////////////////////////////////
    //$wsld = "https://fx.currencysystem.com/webservices/CurrencyServer5.asmx?wsdl";
    //$client = new \SoapClient($wsld,["licenseKey" => "", 'trace'=> true]);
    //$resultado = $client->AllCurrencies();
    //$resArray = explode(";",$resultado->AllCurrenciesResult);
    //return $resArray;exit;
    return view('welcome');


});



/////////////////////////////////////////////////////////////////
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//se agrega ruta para funciones de controlador EmpleadoController

Route::resource('empleado','EmpleadoController');

//Route::post('/api/catEstados','EmpleadoController@wdObtenerEstados')->name('catalogos.estado');
//Route::post('/api/catMoneda','EmpleadoController@wdObtenerMoneda')->name('catalogos.moneda');



