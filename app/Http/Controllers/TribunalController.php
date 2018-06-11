<?php

namespace sistemaE\Http\Controllers;

use Illuminate\Http\Request;

use sistemaE\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sistemaE\Http\Requests\TribunalFormRequest;
use sistemaE\Tribunal;
use DB;


use Response;
use Illuminate\Support\Collection;

use Fpdf;


class TribunalController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $tribunals=DB::table('tribunal as tr')
            ->join('tema_perfil as te','tr.idtema_perfil','=','te.idtema_perfil')
            ->join('postulante as p','tr.idpostulante','=','p.idpostulante')
            ->join('docente as d','tr.iddocente','=','d.iddocente')
            ->select('tr.idtribunal','p.nombresapellidos as postulante','te.titulo_tema as tema_perfil','d.nombre as docente','tr.nombre_tri1','tr.nombre_tri2','tr.estad')
            ->where('tr.nombre_tri1','LIKE','%'.$query.'%')
            ->orderBy('tr.idtribunal','desc')
            ->get();
            return view('uno.tribunal.index',["tribunals"=>$tribunals,"searchText"=>$query]);
        }
    }
    public function create()
    {
       
        $tema_perfils=DB::table('tema_perfil')->where('estados','=','vigente')->get();
        $postulantes=DB::table('postulante')->where('estado','=','Activo')->get();
        $docentes=DB::table('docente')->where('condicion','=','1')->get();
        return view("uno.tribunal.create",["tema_perfils"=>$tema_perfils,"postulantes"=>$postulantes,"docentes"=>$docentes]);
       
    }
    public function store (TribunalFormRequest $request)
    {
      	$tribunal=new Tribunal;
    	$tribunal->idpostulante=$request->get('idpostulante');
    	$tribunal->idtema_perfil=$request->get('idtema_perfil');
         $tribunal->iddocente=$request->get('iddocente');
    	$tribunal->nombre_tri1=$request->get('nombre_tri1');
    	$tribunal->nombre_tri2=$request->get('nombre_tri2');
        $tribunal->estad='V';
    
    	$tribunal->save();
    	return Redirect::to('uno/tribunal');

    }
    public function show($id)
    {
        return view("uno.tribunal.show",["tribunal"=>Tribunal::findOrFail($id)]);
    }
    public function edit($id)
    {
      
        $tribunal=Tribunal::findOrFail($id);
       $tema_perfils=DB::table('tema_perfil')->where('estados','=','vigente')->get();
        $postulantes=DB::table('postulante')->where('estado','=','Activo')->get();
         $docentes=DB::table('docente')->where('condicion','=','1')->get();
        return view("uno.tribunal.edit",["tribunal"=>$tribunal,"tema_perfils"=>$tema_perfils,"postulantes"=>$postulantes,"docentes"=>$docentes]);
    }
    
    
    public function update(TribunalFormRequest $request,$id)
    {
        $tribunal=Tribunal::findOrFail($id);

    	$tribunal->idpostulante=$request->get('idpostulante');
    	$tribunal->idtema_perfil=$request->get('idtema_perfil');
         $tribunal->iddocente=$request->get('iddocente');
    	$tribunal->nombre_tri1=$request->get('nombre_tri1');
    	$tribunal->nombre_tri2=$request->get('nombre_tri2');
        $tribunal->estad='V';
    	$tribunal->save();
    	return Redirect::to('uno/tribunal');
        
    }
    public function destroy($id)
    {
        $tribunal=Tribunal::findOrFail($id);
        $tribunal->estad='I';
        $tribunal->update();
        return Redirect::to('uno/tribunal');
    }

     public function reporte()
    {
        $registros=DB::table('tribunal as tr')
            ->join('tema_perfil as te','tr.idtema_perfil','=','te.idtema_perfil')
            ->join('postulante as p','tr.idpostulante','=','p.idpostulante')
             ->join('docente as d','tr.iddocente','=','d.iddocente')
            ->select('tr.idtribunal','p.nombresapellidos as postulante','te.titulo_tema as tema_perfil','d.nombre as docente','tr.nombre_tri1','tr.nombre_tri2','tr.estad')
             ->where ('estad','=','V')
            ->orderBy('tr.nombre_tri1','asc')
        ->get();

        $vistareporte="uno.tribunal.reporte_tribunal";
        $data=$registros;
        $date = date('Y-m-d');
        $view = \View::make($vistareporte, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper([0, 0,612, 935.433071]);
        //$filename = "reporte_comensal_carrera_".$date.'.pdf';
        //file_put_contents($filename, $pdf);
        return $pdf->stream("reporte.pdf"); 
        /*$pdf = new Fpdf();
         $pdf::AddPage();
         $pdf::SetTextColor(35,56,113);
         $pdf::SetFont('Arial','B',11);
         $pdf::Cell(0,10,utf8_decode("Listado Temas de Perfiles"),0,"","C");
         $pdf::Ln();
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(206, 246, 245); // establece el color del fondo de la celda 
         $pdf::SetFont('Arial','B',10); 
         //El ancho de las columnas debe de sumar promedio 190  
         $pdf::cell(32,8,utf8_decode("Postulante"),1,"","L",true);
         $pdf::cell(70,8,utf8_decode("Titulo Tema"),1,"","L",true);
         $pdf::cell(32,8,utf8_decode("Tribunal 1"),1,"","L",true);
         $pdf::cell(32,8,utf8_decode("Tribunal 2"),1,"","L",true); 
         $pdf::cell(30,8,utf8_decode("Tribunal 3"),1,"","L",true);
         
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(255, 255, 255); // establece el color del fondo de la celda
         $pdf::SetFont("Arial","",8);
         
         foreach ($registros as $reg)
         {

            $pdf::cell(32,6,utf8_decode($reg->postulante),1,"","L",true);
            $pdf::cell(70,6,utf8_decode($reg->tema_perfil),1,"","L",true);
            $pdf::cell(32,6,utf8_decode($reg->nombre_tri1),1,"","L",true);
            $pdf::cell(32,6,utf8_decode($reg->nombre_tri2),1,"","L",true); 
            $pdf::cell(30,6,utf8_decode($reg->nombre_tri3),1,"","L",true); 
            $pdf::Ln(); 
         }

         $pdf::Output();
         exit;*/
    }

}
