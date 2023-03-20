<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
        $this->middleware("admin")->except("index","show");
    }


    public function index()
    {
        $marks = Mark::orderBy("id")->paginate(10);
        return view("marks.index", compact("marks"));

    }

    public function create()
    {
        return view("marks.create");
    }


    public function store(Request $request)
    {
        $request->validate([
            'mark' => 'required',
        ]);

        Mark::create($request->post());

        return redirect()->route('marks.index')->with('success', 'Mark has been created successfully.');
    }

    public function show($id)
    {

        $mark = Mark::find($id);
        $cars =  $mark->models()->get();
//        dd($cars);
//
//        $all = $mark->_car_models->attach(5);
//        dd($all);
    return view("marks.show", compact("cars"));

    }

    public function destroy(Mark $mark)
    {
        $mark->delete();

        return redirect()->route("marks.index")->with('success', 'Car Mark has been deleted  successfully.');
    }
}
