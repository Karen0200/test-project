<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Mark;
use App\Http\Controllers\MarkController;

class ModelController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
        $this->middleware("admin")->except("index", "show");
    }


    public function index()
    {
        $models = CarModel::query()->orderBy("id")->paginate(10);

        return view("models.index", compact("models"));

    }

    public function create()
    {
        $allMarks = Mark::all();
        return view("models.create", compact("allMarks"));
    }


    public function store(Request $request)
    {

        $request->validate([
            "model_name" => 'required',
            "image" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "description" => 'required',
        ]);
        $id = $request->mark_id;


        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $imageName);

        $data = [
            "model_name" => $request->model_name,
            "image" => $imageName,
            "description" => $request->description,
        ];

        $d = CarModel::create($data);
        $d->marks()->attach($id);

        return redirect('/models')->with(['message' => 'Model a
        ed successfully!', 'status' => 'success']);
    }


    public function show(CarModel $carModel, $id)
    {
        $car = CarModel::query()->find($id);
        return view("models.show", compact("car"));
    }


    public function edit(CarModel $carModel, $id)
    {
        $car = CarModel::query()->find($id);
        return view("models.edit", compact("car"));
    }


    public function update(Request $request, CarModel $carModel, $id)
    {

        $car = CarModel::query()->find($id);
        $imageName = '';
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $imageName);
            if ($car->image) {
                Storage::delete('public/images/' . $car->image);
            }
        } else {
            $imageName = $car->image;
        }

        $data = ["model_name" => $request->model_name, 'image' => $imageName, "description" => $request->description];

        $car->update($data);
        return redirect('/models')->with(['message' => 'Model updated successfully!', 'status' => 'success']);
    }

    public function destroy(CarModel $carModel, $id)
    {
        $car = CarModel::query()->find($id);
        Storage::delete("public/images/" . $car->image);
        $car->delete();
        return redirect('/models')->with('success', 'Model has been deleted successfully');


    }
}

