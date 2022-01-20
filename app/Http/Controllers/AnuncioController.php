<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncios;

class AnuncioController extends Controller
{
    /**                 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $anuncios = Anuncios::orderBy('created_at', 'desc')->get();        
        return view('anuncios.ver', compact('anuncios'));
    }
    public function mostrar($tipo_publicacion,$tipo_mascota)
    {   
        $consulta = ['tipo' => $tipo_publicacion, 'tipo_mascota' => $tipo_mascota];
        $anuncios = Anuncios::where($consulta)->orderBy('created_at', 'desc')->get();        
        return view('anuncios.ver', compact('anuncios'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'nombre' => 'required|max: 20',
            'color' => 'required|max: 20',
            'fecha' => 'required|date|before:tomorrow',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,svg|max:5048',
            'descripcion' => 'required',
            'nombre_contacto' => 'required|max: 20',
            'numero_contacto' => 'required|digits:9'
        ]);

        if($request->hasFile('imagen')){
            $caracteres_permitidos = '0123456789abcdefghijklmnopqrstuvwxyz';
            $anuncio = new Anuncios();
            $anuncio->tipo = $request->input('tipo');
            $anuncio->nombre = $request->input('nombre');
            $anuncio->color = $request->input('color');
            $anuncio->tipo_mascota = $request->input('tipo_mascota');
            $anuncio->fecha = $request->input('fecha');
            $respuesta_imgbb= $this->guardar_imagen($request->file('imagen'));
            $anuncio->imagen = $respuesta_imgbb['data']['url'];
            $anuncio->descripcion = $request->input('descripcion');
            $anuncio->nombre_contacto = $request->input('nombre_contacto');
            $anuncio->numero_contacto = $request->input('numero_contacto');
            $anuncio->codigo_publicacion = substr(str_shuffle($caracteres_permitidos), 0, 5);
            $anuncio->save();
            return redirect()->back()->with(['tipo_mensaje' => 'exito', 'codigo_publicacion' => $anuncio->codigo_publicacion]);
        }
        return redirect()->back()->with(['tipo_mensaje' => 'error', 'mensaje' => 'Ocurrio un error al publicar el anuncio, intentelo nuevamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {   

        $anuncio = Anuncios::where('codigo_publicacion', $request->input('codigo_publicacion'))->first();        
        if($anuncio){
            return view('anuncios/anuncio')->with('anuncio',$anuncio);
        }else{
            return redirect()->back()->with(['tipo_mensaje' => 'error', 'mensaje' => 'No se encontro algun anuncio con el codigo introducido']);
        }
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
        $validacion = $request->validate([
            'nombre' => 'required|max: 20',
            'color' => 'required|max: 20',
            'fecha' => 'required|date|before:tomorrow',
            'imagen' => 'image|mimes:jpeg,png,jpg,svg|max:5048',
            'descripcion' => 'required',
            'nombre_contacto' => 'required|max: 20',
            'numero_contacto' => 'required|digits:9'
        ]);
        $anuncio = Anuncios::where('id', $id)->first();
        if($anuncio){
            $anuncio->fill($request->except('imagen'));
            if($request->hasFile('imagen')){
                $respuesta_imgbb= $this->guardar_imagen($request->file('imagen'));
                $anuncio->imagen = $respuesta_imgbb['data']['url'];
            }
            $anuncio->save();
            return redirect()->back()->with(['tipo_mensaje' => 'error', 'mensaje' => 'Actualizado con exito']);
        }
        return redirect()->back()->with(['tipo_mensaje' => 'error', 'mensaje' => 'No se puedo actualizar el anuncio']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anuncio = Anuncios::where('id', $id)->first();
        if($anuncio){
            $anuncio->delete();
            return redirect()->back()->with(['tipo_mensaje' => 'error', 'mensaje' => 'Eliminado con exito']);
        }
        return redirect()->back()->with(['tipo_mensaje' => 'error', 'mensaje' => 'No se puedo eliminar anuncio']);
    }

    function guardar_imagen($image){
        $API_KEY = '0e75ffe97d8f82d1db75bf3d8acc3161';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key='.$API_KEY);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        $name = time();
        $extension = pathinfo($image->getClientOriginalName(),PATHINFO_EXTENSION);
        $data = array('image' => base64_encode(file_get_contents($image->getPathName())), 'name' => $name);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            return 'Error:' . curl_error($ch);
        }else{
            return json_decode($result, true);
        }
        curl_close($ch);
    }
}
