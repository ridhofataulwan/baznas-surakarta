<?php

namespace App\Http\Controllers;

class ProgramController extends Controller
{
    public function programKemanusiaan()
    {
        return view('program.program-kemanusiaan');
    }
    public function programPendidikan()
    {
        return view('program.program-pendidikan');
    }
    public function programKesehatan()
    {
        return view('program.program-kesehatan');
    }
    public function programAdvokasiDakwah()
    {
        return view('program.program-advokasi-dakwah');
    }
    public function programEkonomiProduktif()
    {
        return view('program.program-ekonomi-produktif');
    }
}
