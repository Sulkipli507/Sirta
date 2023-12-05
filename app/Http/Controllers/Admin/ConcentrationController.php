<?php

namespace App\Http\Controllers\Admin;

use App\Models\Concentration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConcentrationController extends Controller
{
    public function create(){
        return view('admin.concentration.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
        ]);

        $user = new Concentration;
        $user->name = $request->get('name');
        $user->save();
        return redirect()->route('concentration-index')->with('status', 'Tambah data konsentrasi');
    }

    public function index(){
        $concentration = Concentration::all();
        return view('admin.concentration.index', compact('concentration'));
    }

    public function edit($id){
        $concentration = Concentration::find($id);
        return view('admin.concentration.edit', compact('concentration'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
        ]);
        $concentration = Concentration::find($id);
        $concentration->update($request->all());
        return redirect()->route('concentration-index')->with('status', 'Update data konsentrasi');
    }

    public function destroy($id){
        $concentration = Concentration::find($id);
        $concentration->delete();
        return redirect()->route('concentration-index')->with('status', 'Hapus data konsentrasi');
    }
}
