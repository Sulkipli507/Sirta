<?php

namespace App\Http\Controllers\Landingpage;

use App\Http\Controllers\Controller;
use App\Models\Thesis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class PageController extends Controller
{
    public function index(){
        return view('page.index');
    }

    public function showAbout(){
        return view('page.about');
    }

    public function show($id){
        $thesis = Thesis::find($id);
        $thesis->count = $thesis->count + 1;
        $thesis->save();
        if(!$thesis) {
            abort(404);
        }
        return view('page.show', compact('thesis'));
    }

    public function showThesis(Request $request){
        $thesis = Thesis::paginate(12);

        $filterKeyword = $request->get('keyword');
        if($filterKeyword){
            $thesis = Thesis::where(function($query) use ($filterKeyword) {
                $query->where('name', 'LIKE', "%$filterKeyword%")
                    ->orWhere('title', 'LIKE', "%$filterKeyword%")
                    ->orWhere('year', 'LIKE', "%$filterKeyword%");
            })->paginate(12);
        }
        return view('page.thesis', compact('thesis'));
    }

    public function showThesisFile($id){
        $thesis = Thesis::find($id);
        if (Auth::check()) {
            $fileResponse = response()->file(storage_path('app/public/'.$thesis->file));
            $fileResponse->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
            return $fileResponse;
        } else {
            return redirect()->route('login');
        }
    }
}
