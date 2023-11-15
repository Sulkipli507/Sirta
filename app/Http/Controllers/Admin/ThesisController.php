<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Concentration;
use App\Models\Thesis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ThesisController extends Controller
{
    public function create(){
        $concentration = Concentration::all();
        $dosen = User::where('role', 'Dosen')->get();
        return view('admin.thesis.create',compact('concentration','dosen'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => ['required'],
            'nim' => ['required','unique:theses'],
            'year' => ['required'],
            'concentration_id' => ['required'],
            'file' => ['required', 'file', 'mimes:pdf'],
            'title' => ['required'],
            'abstract' => ['required'],
            'mentor1' => ['required'],
            'mentor2' => ['required'],
            'examiner1' => ['required'],
            'examiner2' => ['required'],
            'examiner3' => ['required'],
        ]);

        $thesis = new Thesis;
        $thesis->name = $request->get('name');
        $thesis->nim = $request->get('nim');
        $thesis->year = $request->get('year');
        $thesis->concentration_id = $request->get('concentration_id');
        $thesis->title = $request->get('title');
        $thesis->abstract = $request->get('abstract');
        $thesis->mentor1 = $request->get('mentor1');
        $thesis->mentor2 = $request->get('mentor2');
        $thesis->examiner1 = $request->get('examiner1');
        $thesis->examiner2 = $request->get('examiner2');
        $thesis->examiner3 = $request->get('examiner3');
        if($request->file('file')){
 
            $file = $request->file('file')
            ->store('thesis-files', 'public');
            
            $thesis->file = $file;
            }         
        $thesis->save();
        return redirect()->back();
    }

    public function index(){
        $thesis = Thesis::all();
        return view('admin.thesis.index', compact('thesis'));
    }
    
    public function edit($id){
        $thesis = Thesis::find($id);
        $concentration = Concentration::all();
        $dosen = User::where('role','Dosen')->get();
        return view('admin.thesis.edit', compact('thesis','concentration','dosen'));
    }

    public function update(Request $request, $id){      
        $thesis = Thesis::find($id);
        $thesis->name = $request->get('name');
        $thesis->nim = $request->get('nim');
        $thesis->concentration_id = $request->get('concentration_id');
        $thesis->title = $request->get('title');
        $thesis->abstract = $request->get('abstract');
        $thesis->year = $request->get('year');
        $new_file = $request->file('file');
        if($new_file){
            if($thesis->file && file_exists(storage_path('app/public/'. $thesis->file))){
                Storage::delete('public/'. $thesis->file);
            }
            $new_file_path = $new_file->store('thesis-files', 'public');
            $thesis->file = $new_file_path;
        }
        $thesis->mentor1 = $request->get('mentor1');
        $thesis->mentor2 = $request->get('mentor2');
        $thesis->examiner1 = $request->get('examiner1');
        $thesis->examiner2 = $request->get('examiner2');
        $thesis->examiner3 = $request->get('examiner3');
        $thesis->save();
        return redirect()->back();
    }

    public function destroy($id){
        $thesis = Thesis::find($id);
        $thesis->delete();
        return redirect()->back();
    }

    public function mentor(){
        $user = auth()->id();
        $thesis = Thesis::where('mentor1', $user)
        ->orWhere('mentor2', $user)
        ->paginate(3);
        return view('admin.thesis.mentor', compact('thesis'));
    }

    public function examiner(){
        $user = auth()->id();
        $thesis = Thesis::where('examiner1', $user)
        ->orWhere('examiner2', $user)
        ->orWhere('examiner3', $user)
        ->paginate(3);
        return view('admin.thesis.examiner', compact('thesis'));
    }
}