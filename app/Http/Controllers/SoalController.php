<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Http\Requests\StoreSoalRequest;
use App\Http\Requests\UpdateSoalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Http\Request;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        // $soals = Soal::paginate(10);
        $soals = DB::table('soals')->when($request->input('search'), function ($query, $pertanyaan) {
            $find =  $query->where('pertanyaan', 'like', '%' . $pertanyaan . '%');
            return $find;
        })->paginate(10);
        // dd($soals);
        return view('pages.soal.index', compact('soals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.soal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSoalRequest $request)
    {
        //
        $soals = $request->all();
        Soal::create($soals);
        return redirect()->route('soals.index')->with('success', 'Soal successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Soal $soal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //

        $soal = Soal::findOrFail($id);
        return view('pages.soal.edit', compact('soal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSoalRequest $updateSoalRequest, Soal $soal)
    {
        $data = $updateSoalRequest->validated();
        $soal->update($data);
        return redirect()->route('soals.index')->with('success', 'Soals successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Soal $soal)
    {
        //
        $soal->delete();
        return redirect()->route('soals.index')->with('success', 'Soals successfully deleted');
    }
}
