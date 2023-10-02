<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Color\StoreColorRequest;
use App\Http\Resources\ColorResource;
use App\Http\Resources\SubcategoryResource;
use App\Models\Color;
use App\Models\Subcategory;

class ColorController extends Controller
{
    public function index()
    {
        return view('Pages.Color.index', [
            'colors' => ColorResource::collection(Color::query()
                ->orderBy('created_at', 'desc')
                ->get())
        ]);
    }

    public function create()
    {
        return view('Pages.Color.create');
    }

    public function store(StoreColorRequest $request)
    {
        Color::create($request->all());

        return redirect()->route('admin.color.index');
    }

    public function delete(Color $color)
    {
        $color->delete();

        return redirect()->route('admin.color.index');
    }
}
