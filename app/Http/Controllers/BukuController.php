<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $buku = Buku::orderBy('id','asc')->paginate(3);
        return view('buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul_buku'    =>  'required',
            'penulis'    =>  'required',
            'penerbit'    =>  'required',
            'tahun_terbit'    =>  'required',
            'stok'    =>  'required',
            'harga_pokok'    =>  'required',
            'harga_jual'    =>  'required',
        ]);
        Buku::create([
            'judul_buku'    =>  $request->judul_buku,
            'penulis'    =>  $request->penulis,
            'penerbit'    =>  $request->penerbit,
            'tahun_terbit'    =>  $request->tahun_terbit,
            'stok'    =>  $request->stok,
            'harga_pokok'    =>  $request->harga_pokok,
            'harga_jual'    =>  $request->harga_jual
        ]);

        return redirect()->route('buku.index')->with(['success' => 'Data Buku berhasil disimpan']);
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $buku = Buku::where('judul_buku', 'like', "%" . $keyword . "%" )->paginate(3);
        return view('buku.index', compact('buku'))->with('i', (request()->input('page', 1) - 1) * 3);

    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        return view('buku.show',compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku) : View
    {
        return view('buku.edit',compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $this->validate($request, [
            'judul_buku'     => 'required',
            'penulis'   => 'required',
            'penerbit'   => 'required',
            'tahun_terbit'     => 'required',
            'stok'   => 'required',
            'harga_pokok'   => 'required',
            'harga_jual'   => 'required'
        ]);

            $buku->update([
                'judul_buku'    => $request->judul_buku,
                'penulis'       => $request->penulis,
                'penerbit'      => $request->penerbit,
                'tahun_terbit'  => $request->tahun_terbit,
                'stok'          => $request->stok,
                'harga_pokok'   => $request->harga_pokok,
                'harga_jual'    => $request->harga_jual
            ]);

        return redirect()->route('buku.index')->with(['success' => 'Data Buku berhasil diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('buku.index')->with('success','Buku has been deleted successfully');
    }
}
