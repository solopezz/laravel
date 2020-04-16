<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortafolioController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $portafolio = [
            ['title' => 'Proyecto1'],
            ['title' => 'Proyecto2'],
            ['title' => 'Proyecto3'],
            ['title' => 'Proyecto4']
        ];

        return view('portafolio', compact('portafolio'));
    }
}
