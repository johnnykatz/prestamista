<?php

namespace App\Http\Controllers;

use App\Models\Admin\Agente;
use App\Models\Admin\PuestoTrabajo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home');
    }

    public function pruebas()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }

    public function view_script()
    {
        return view('script');
    }

    public function script(Request $request)
    {
        $tipos_puestos = array(
            'A/CARGO' => 7,
            'ASESOR' => 9,
            'AUX.' => 2,
            'AUX. DE PERS.' => 2,
            'AUX. PAT.' => 2,
            'AUXILIAR' => 2,
            'CHOFER' => 12,
            'COORD.' => 13,
            'DIREC' => 3,
            'DIREC. GRAL.' => 4,
            'DIRECTOR' => 3,
            'DIRECTORA' => 3,
            'ENC. PATRIM' => 7,
            'ENC. PERS' => 7,
            'ENCARGADO' => 7,
            'JEFA' => 5,
            'JEFE' => 5,
            'JUB. TRAMITE' => 1,
            'MAESTRAN' => 14,
            'MINISTRO' => 8,
            'OPERADOR' => 11,
            'OPERADORA' => 11,
            'PLAYERO' => 15,
            'PROF' => 16,
            'PROFES.' => 16,
            'PROFESIONAL' => 16,
            'PROMOT.' => 10,
            'RESP.' => 6,
            'RESP. ADM.' => 6,
            'RESPONS.' => 6,
            'S/ INST. L.' => 1,
            'SEC. PRIV.' => 17,
            'SUBSECRET' => 19,
            'SUBSECRETARIO' => 19,
            'TECNICA' => 20,
            'TECNICO' => 20,
        );

        $unidad = array(
            '01' => 1,
            '02' => 2,
            '03' => 3,
            '04' => 4,
            '06' => 5,
        );

        $agrupamientos = array(
            'A' => 1,
            'A.S.' => 2,
            'AS' => 2,
            'P' => 3,
            'T' => 4,
            'M' => 5
        );
        if (($fichero = fopen($request->file('archivo'), "r")) !== FALSE) {
            $clientes_no_encontrados = array();
            while (($datos = fgetcsv($fichero, 1000, ";")) !== FALSE) {
                DB::beginTransaction();
                if ($datos[0] != "") {
                    $agente = Agente::where('dni', trim($datos[6]))->first();
                    if (!$agente) {
                        $datos[6] = str_replace(".", "", $datos[6]);
                        $datos[6] = str_replace(",", "", $datos[6]);
                        if (trim($datos[6]) == '32798157') {
                            $ff = 0;
                        }
                        $agente = new Agente();
                        $agente->tipo_agente_id = 1;
                        if ($datos[1] != "") {
                            $agente->fecha_nacimiento = date("Y-m-d", strtotime($this->getFecha($datos[1])));
                        } else {
                            $agente->fecha_nacimiento = null;
                        }
                        $agente->legajo = trim($datos[2]);
                        if (trim(strtoupper($datos[3])) == "F") {
                            $agente->genero_id = 1;
                        } elseif (trim(strtoupper($datos[3])) == "M") {
                            $agente->genero_id = 2;
                        } else {
                            $agente->genero_id = null;
                        }
                        $nombre = explode(" ", $datos[4]);
                        $agente->apellido = $nombre[0];
                        unset($nombre[0]);
                        $agente->nombre = implode(" ", $nombre);
                        $agente->categoria = $datos[5];
                        $agente->dni = $datos[6];
                        $agente->fecha_ingreso = ($datos[7]) ? date("Y-m-d", strtotime($datos[7])) : null;

                        if (trim(strtoupper($datos[10])) == "P") {
                            $agente->estado_relacion_id = 1;
                        } elseif (trim(strtoupper($datos[10])) == "T") {
                            $agente->estado_relacion_id = 2;
                        }
                        $agente->titulo = trim(strtoupper($datos['11']));
                        $agente->save();

                        $puestoTrabajo = new PuestoTrabajo();
                        $puestoTrabajo->agente_id = $agente->id;
                        $puestoTrabajo->situacion_laboral_id = 1;
                        $puestoTrabajo->estructura_id = 1;
                        $puestoTrabajo->situacion_laboral_id = ($this->esAdscripto($datos[12])) ? 2 : 1;
                        $puestoTrabajo->agrupamiento_id = ($datos[8] != "") ? $agrupamientos[trim($datos[8])] : null;
                        $puestoTrabajo->unidad_organizacion_id = ($datos[9] != "") ? $unidad[trim($datos[9])] : null;
                        $puestoTrabajo->tipo_puesto_trabajo_id = (isset($tipos_puestos[$datos[14]])) ? $tipos_puestos[$datos[14]] : null;
                        $instrumento = $this->getInstrumento($datos[15]);
                        if ($instrumento) {
                            $puestoTrabajo->tipo_instrumento_id = $instrumento['tipo'];
                            $puestoTrabajo->numero_instrumento = $instrumento['numero'];
                        }
                        $puestoTrabajo->fecha_instrumento = ($datos[16] != "") ? date("Y-m-d", strtotime($datos[16])) : null;
                        $puestoTrabajo->save();
                    }
                }

                DB::commit();

            }


        }

        Flash::success('datos importados.');

        return redirect(route('view_script'));
    }

    private function esAdscripto($campo)
    {
        if ($campo != "") {
            $campo = substr(trim($campo), 0, 2);
            if (strtoupper($campo) == "AD") {
                return true;
            }
        }
        return false;

    }

    private function getInstrumento($campo)
    {
        $result = array();
        if ($campo != "" and $campo != null) {
            $campo = trim($campo);
            $tipo = substr($campo, 0, 2);

            if (strtoupper($tipo) == "RE") {
                $result['tipo'] = 3;
            } elseif (strtoupper($tipo) == "DE" or strtoupper($tipo) == "DC") {
                $result['tipo'] = 2;
            } elseif (strtoupper($tipo) == "DI") {
                $result['tipo'] = 4;
            } else {
                $result['tipo'] = 1;
                $result['numero'] = null;
                return $result;
            }

            $conservar = '0-9/'; // juego de caracteres a conservar
            $regex = sprintf('~[^%s]++~i', $conservar); // case insensitive
            $numero = preg_replace($regex, '', $campo);
            $numero = explode("/", $numero);
            $result['numero'] = $numero[0];
            return $result;
        } else {
            return false;
        }

    }


    private function getFecha($fecha)
    {
        $fecha = str_replace("/", "-", $fecha);
        list($a, $m, $d) = explode("-", $fecha);
        return "$a-$m-$d";
    }
}
