<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ArtikelModel;

class ItemController extends Controller
{
    public function index(){     
        $list_artikel = ArtikelModel::get_all();     
        return view ('artikel.index')->with('list_artikel', $list_artikel);
    }

    public function create(){
        return view ('artikel.create');
    }

    public function store(Request $request){
        $data = $request->all();
        $data['slug']= Str::slug($data['judul']);
        unset($data['_token']);
        $data ['tag'] = implode(" ",$request['tag']);
        ArtikelModel::save($data);
        return redirect('items');
    }

    public function show($id){
        $artikel = ArtikelModel::getArtikelById($id);
        return view('artikel.show')->with('artikel', $artikel);
    }

    public function edit($id){
        $artikel = ArtikelModel::getArtikelById($id);
        return view('artikel.edit')->with('artikel', $artikel);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $data['slug']= Str::slug($data['judul']);
        unset($data['_token']);
        $data ['tag'] = implode(" ",$request['tag']);
        ArtikelModel::updateArtikelById($data, $id);
        return redirect('items');
    }

    public function destroy($id){
        ArtikelModel::deleteArtikelById($id);
        return redirect('items');
    }
}
