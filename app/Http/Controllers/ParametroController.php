<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parametro;
use App\Events\NewParametro;

class ParametroController extends Controller
{
    public function saveParametros($temperature) {
        $temp = new Parametro;
        $temp->temperature = $temperature;
        $temp->save();

        broadcast(new NewParametro($temp));

        return response()->json($temp);
    }

    public function getParametros() {
        $parametros = Parametro::select('temperature')->orderBy('created_at', 'desc')->limit(2)->get();

        return response()->json($parametros);
    }

    public function saveParametro(Request $request) {
        $temp = new Parametro($request->all());
        $temp->save();

        broadcast(new NewParametro($temp));

    }
}
