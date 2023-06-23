<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Merk;

class MerkController extends Controller
{
    function index()
    {
        $merkData = Merk::get();
        return view('pages.merk.index', ['merkData' => $merkData]);
    }
    
    function create()
    {
        return view('pages.merk.create');
    }

    function store(Request $request)
    {
        $merkData = new merk;
        $merkData->merk = $request->merk;
        $merkData->save();
        
        return redirect()->to('/merk')->with('success', 'Data Merk sukses disimpan');
    }

    function edit($id)
    {
        $merkData = Merk::find($id); //SELECT *FORM merks WHERE id = $id
        return view('pages.merk.edit', ['merkData' => $merkData]);
    }

    function update($id, request $request)
    {
        $merkData = Merk::find($id);
        $merkData->merk = $request->merk; //$request seperti $_SPOT
        $merkData->save();

        return redirect()->to('/merk')->with('success', 'data berhasil di update');
    }

    function delete($id)
    {
        $merkData = Merk::find($id);
        $merkData->delete();
        
        return redirect()->to('/merk')->with('succuess', 'data berhasil dihapus');
    }
}