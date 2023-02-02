<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdmProgramController extends Controller
{
    public function listProgram()
    {
        $program = Program::all();

        $title = 'Daftar Program';
        return view('admin.program.index', compact('program', 'title'));
    }

    public function storeProgram(Request $request)
    {
        $validated = $request->validate(['name' => 'required']);
        if ($validated) {
            Program::insert(['name' => $request->name]);
        }

        return redirect('/admin/program/')->with('success', 'Program berhasil ditambahkan');
    }

    public function updateProgram(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
            'name' => 'required'
        ]);
        if ($validated) {
            $program = Program::find($request->id);
            $program->timestamps = false;
            $program->update([
                'name' => $request->name
            ]);
        }

        return redirect('/admin/program/')->with('success', 'Program berhasil diubah');
    }

    public function updateProgramState(Request $request)
    {
        $id = $request->get('id');
        $state = $request->get('state');
        if ($state == 0) {
            $state = 1;
        } else {
            $state = 0;
        }
        $column = $request->get('program');
        $data = [$id, $state, $column];
        DB::table('program')->where('id', $id)->update([$column => $state]);

        return $data;
    }

    public function destroyProgram($id)
    {
        /*
        if ($id != 1) {
            $post = Post::where('id', $id)->get();
            if ($post == true) {
                for ($i = 0; $i < count($post); $i++) {
                    $post[$i]->update(['id' => 1]);
                }
            }
            Program::destroy($id);
            return redirect('/admin/program/')->with('success', 'Program berhasil dihapus');
        }
        */
        return redirect('/admin/program/')->with('danger', 'Program ini tidak boleh dihapus');
    }
}
