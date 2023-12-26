<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SoalResource;
use App\Models\Soal;
use App\Models\Ujian;
use App\Models\UjianSoalList;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // Create Ujian
    public function createUjian(Request $request)
    {

        $soalAngka = Soal::where('kategori', 'Numeric')->inRandomOrder()->limit(20)->get();
        $soalVerbal = Soal::where('kategori', 'Verbal')->inRandomOrder()->limit(20)->get();
        $soalLogika = Soal::where('kategori', 'Logika')->inRandomOrder()->limit(20)->get();
        // Create Ujian
        $ujian = Ujian::create([
            'user_id' => $request->user()->id,
            // 'nilai_angka' => 0,
            // 'nilai_verbal' => 0,
            // 'nilai_logika' => 0,
            // 'hasil' => 'Belum selesai'
        ]);

        foreach ($soalAngka as $soal) {
            # code...
            UjianSoalList::create([
                'ujian_id' => $ujian->id,
                'soal_id' => $soal->id
            ]);
        }

        foreach ($soalVerbal as $soal) {
            # code...
            UjianSoalList::create([
                'ujian_id' => $ujian->id,
                'soal_id' => $soal->id
            ]);
        }

        foreach ($soalLogika as $soal) {
            # code...
            UjianSoalList::create([
                'ujian_id' => $ujian->id,
                'soal_id' => $soal->id
            ]);
        }

        return response()->json(['message' => 'Ujian berhasil di buat', 'data' => $ujian]);
    }

    // GET LIST SOAL UJIAN BY KATEGORI

    public function getListSoalByKategori(Request $request)
    {
        //
        $ujian = Ujian::where('user_id', $request->user()->id)->first();
        $ujianSoalList = UjianSoalList::where('ujian_id', $ujian->id)->get();
        // OLD
        // $ujianSoalListId = [];

        // foreach ($ujianSoalList as $soal) {
        //     # code...
        //     array_push($ujianSoalListId, $soal->soal_id);
        // }

        $soalId = $ujianSoalList->pluck('soal_id');

        $soal = Soal::whereIn('id', $soalId)->where('kategori', $request->kategori)->get();
        return response()->json(['messge' => 'Berhsail mendapatkan soal', 'data' => SoalResource::collection($soal)]);
        // $soal = Soal::where('kategori', $kategori)->whereNotIn('id', $ujianSoalListId)->inRandomOrder()->first();

    }


    // ANSWER SOAL

    public function jawabSoal(Request $request)
    {

        $validateData = $request->validate(['soal_id' => 'required',  'jawaban' => 'required']);
        $ujian = Ujian::where('user_id', $request->user()->id)->first();

        $ujianSoalList = UjianSoalList::where('ujian_id', $ujian->id)->where('soal_id', $validateData['soal_id'])->first();

        $soal = Soal::where('id', $validateData['soal_id'])->first();


        // check jawaban
        if ($soal->kunci == $validateData['jawaban']) {
            # code...
            // $ujianSoalList->kebenaran = true;
            $ujianSoalList->update(['kebenaran' => true]);
            // $ujianSoalList->save();
        } else {
            // $ujianSoalList->kebenaran = false;
            $ujianSoalList->update([
                'kebenaran' => false
            ]);

            // $ujianSoalList->save();
        }

        return response()->json(
            ['message' => 'Berhasi simpan jawaban', 'jawaban' => $ujianSoalList->kebenaran]
        );
    }
}
