<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;
//se agrega libreria Guzzle
//se agrega en donde se vaya a ocupar
use GuzzleHttp\Client as HttpClient;
use function Symfony\Component\VarDumper\Dumper\esc;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = $this->wdObtenerEstados();
        //creando la funcionalidad index
        $empleados = Empleado::orderBy('id','DESC')->paginate(3);
        return view('empleado.index',compact('empleados','estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $estados = $this->wdObtenerEstados();
        $monedas = $this->wdObtenerMoneda();
        return view('empleado.create',compact('estados','monedas'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request);
        if($this->validate($request,['nombre'=>'required','edad'=>'required','puesto'=>'required','activo'=>'required','estado_residencia'=>'required','sueldo'=>'required','tipo_moneda'=>'required']))
            Empleado::create(
                ['nombre'=>$request->get('nombre'),
                    'edad'=>$request->get('edad'),
                    'puesto'=>$request->get('puesto'),
                    'activo'=>$request->get('activo'),
                    'estado_residencia'=>$request->get('estado_residencia'),
                    'sueldo'=>$request->get('sueldo'),
                    'tipo_moneda'=>$request->get('tipo_moneda')
                ]
            );
        return redirect()->route('empleado.index')->with('success','Registro creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $estados = $this->wdObtenerEstados();
        //$monedas = $this->wdObtenerMoneda();
        $empleado = Empleado::find($id);
        return view('empleado.show',compact('empleado','estados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $estados = $this->wdObtenerEstados();
        $monedas = $this->wdObtenerMoneda();
        $empleado = Empleado::find($id);
        return view('empleado.edit',compact('empleado','estados','monedas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,['nombre'=>'required','edad'=>'required','puesto'=>'required','activo'=>'required','estado_residencia'=>'required','sueldo'=>'required','tipo_moneda'=>'required']);
        Empleado::find($id)->update($request->all());
        return redirect()->route('empleado.index')->with('success','Registro Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Empleado::find($id)->delete();
        return redirect()->route('empleado.index')->with('success','Registro Eliminado Correctamente');
    }

    private function wdObtenerEstados(){
        $client = new HttpClient(['base_uri' => 'https://beta-bitoo-back.azurewebsites.net/api/']);
        $response = $client->request('POST',"proveedor/obtener/lista_estados");
        //$datos = $response->getBody()->getContents();
        //return json_decode($datos);
        //return $datos;
        $arrayObEstados = ((array)json_decode($response->getBody())->data)['lst_estado_proveedor'];
        //var_dump($arrayOb);exit;
        return $arrayObEstados;

    }


    private function wdObtenerMoneda(){
        //$client = new HttpClient(['base_uri' => 'https://fx.currencysystem.com/webservices/CurrencyServer5.asmx/wsdl']);
        //$response = $client->request('POST',"proveedor/obtener/lista_estados");
        //return $response;
        //nueva forma usando SoapClient incluida en php
        $wsld = "https://fx.currencysystem.com/webservices/CurrencyServer5.asmx?wsdl";
        $client = new \SoapClient($wsld,["licenseKey" => "", 'trace'=> true]);
        $resultado = $client->AllCurrencies();
        $arrayObMonedas = explode(";",$resultado->AllCurrenciesResult);
        return $arrayObMonedas;

    }


}
