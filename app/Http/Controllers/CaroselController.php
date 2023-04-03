<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Profil;
use App\Models\Carosel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CaroselController extends Controller
{
    public function edit(Carosel $carosel){
        return view('carosel',[
            'title' => 'Carosel',
            'profil' => Profil::all(),
            'categories' => Category::all(),
            'carosel' => $carosel
        ]);
    }

    public function update(Request $request, Carosel $carosel)
    {
        $rules = [];

        $validatedData = $request->validate($rules);

        if ($request->file('cover1')) {
            if($carosel->cover1){
                Storage::delete($carosel->cover1);
            }
            $validatedData['cover1'] = $request->file('cover1')->store('carosel-covers');
        }

        if ($request->file('cover2')) {
            if($carosel->cover2){
                Storage::delete($carosel->cover2);
            }
            $validatedData['cover2'] = $request->file('cover2')->store('carosel-covers');
        }

        if ($request->file('cover3')) {
            if($carosel->cover3){
                Storage::delete($carosel->cover3);
            }
            $validatedData['cover3'] = $request->file('cover3')->store('carosel-covers');
        }

        Carosel::where('id', $carosel->id)
            ->update($validatedData);

        return redirect('/dashboard')->with('success', 'Carosel berhasil diubah!');
    }
}
