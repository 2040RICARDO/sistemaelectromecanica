<?php

namespace sistemaE\Http\Controllers;

use Illuminate\Http\Request;
use sistemaE\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sistemaE\Http\Requests\PostulanteFormRequest;
use sistemaE\Postulante;
use DB;

use Fpdf;

use Illuminate\Support\Collection;

class PostulanteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
    	if($request)
    	{
    		$query=trim($request->get('searchText'));
    		$postulantes=DB::table('postulante as p')
    		->join('docente as d','p.iddocente','=','d.iddocente')
    		->select('p.idpostulante','p.ci','p.nombresapellidos','d.nombre as docente','p.direccion','p.email','p.estado')

    		->where('p.nombresapellidos','LIKE','%'.$query.'%')
            ->orwhere('p.ci','LIKE','%'.$query.'%')
    		->orderBy('p.idpostulante','desc')
    		->get();
    		return view('uno.postulante.index',["postulantes"=>$postulantes,"searchText"=>$query]);

    		

    	}
    }
    public function create()
    {
    	$docentes=DB::table('docente')->where('condicion','=','1')->get();
    	return view("uno.postulante.create",["docentes"=>$docentes]);
    }
    public function store(PostulanteFormRequest $request)
    {
    	$postulante=new Postulante;
    	$postulante->iddocente=$request->get('iddocente');
    	$postulante->ci=$request->get('ci');
    	$postulante->nombresapellidos=$request->get('nombresapellidos');
    	$postulante->direccion=$request->get('direccion');
    	$postulante->email=$request->get('email');
    	$postulante->estado='Activo';
    	$postulante->save();
    	return Redirect::to('uno/postulante');

    }
    public function show($id)
    {
    	return view("uno.postulante.show",["postulante"=>Postulante::findOrFail($id)]);
    }
    public function edit($id)
    {
    	$postulante=Postulante::findOrFail($id);
    	$docentes=DB::table('docente')->where('condicion','=','1')->get();
    	return view("uno.postulante.edit",["postulante"=>$postulante,"docentes"=>$docentes]);
    }
    public function update(PostulanteFormRequest $request,$id)
    {
    	$postulante=Postulante::findOrFail($id);

    	$postulante->iddocente=$request->get('iddocente');
    	$postulante->ci=$request->get('ci');
    	$postulante->nombresapellidos=$request->get('nombresapellidos');
    	$postulante->direccion=$request->get('direccion');
    	$postulante->email=$request->get('email');
        $postulante->estado='Activo';

    	$postulante->update();
    	return Redirect::to('uno/postulante');
    }
    public function destroy($id)
    {
    	$postulante=Postulante::findOrFail($id);
         $postulante->Estado='Inactivo';
    	$postulante->update();
    	return Redirect::to('uno/postulante');
    }
    public function reporte()
    {
        $registros=DB::table('postulante as p')
        ->join('docente as d','p.iddocente','=','d.iddocente')
        ->select('p.idpostulante','p.ci','p.nombresapellidos','d.nombre as docente','p.direccion','p.email','p.estado')
        ->where ('estado','=','Activo')
        ->orderBy('p.ci','asc')
        ->get();


        $vistareporte="uno.postulante.reporte_postulantes";
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
         $pdf::Cell(0,10,utf8_decode("Listado Postulantes"),0,"","C");
         $pdf::Ln();
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(206, 246, 245); // establece el color del fondo de la celda 
         $pdf::SetFont('Arial','B',10); 
         //El ancho de las columnas debe de sumar promedio 190        
         $pdf::cell(30,8,utf8_decode("Ci"),1,"","L",true);
         $pdf::cell(80,8,utf8_decode("Nombres/Apellidos"),1,"","L",true);
         $pdf::cell(70,8,utf8_decode("Docente/Tutor"),1,"","L",true);
         
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(255, 255, 255); // establece el color del fondo de la celda
         $pdf::SetFont("Arial","",9);
         
         foreach ($registros as $reg)
         {
            $pdf::cell(30,6,utf8_decode($reg->ci),1,"","L",true);
            $pdf::cell(80,6,utf8_decode($reg->nombresapellidos),1,"","L",true);
            $pdf::cell(70,6,utf8_decode($reg->docente),1,"","L",true);
            $pdf::Ln(); 
         }

         $pdf::Output();
         exit;*/
    }


}
