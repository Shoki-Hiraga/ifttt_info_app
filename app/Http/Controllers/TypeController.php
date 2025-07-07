<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function create()
    {
        return view('types.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'key' => 'required|string|alpha_dash|unique:types,key',
            'label' => 'required|string|max:255',
        ]);

        Type::create($validated);

        return redirect()->route('types.create')->with('success', 'カテゴリを登録しました');
    }
    public function index()
    {
        $types = Type::all();
        return view('types.index', compact('types'));
    }

    public function destroy($key)
    {
        $type = Type::findOrFail($key);
        $type->delete();

        return redirect()->route('types.index')->with('success', '削除しました');
    }

}
