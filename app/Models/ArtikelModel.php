<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class ArtikelModel{
    public static function get_all(){
        $list_artikel = DB::table('artikel')->get();
        return ($list_artikel);
    }

    public static function save($data){
        DB::table('artikel')->insert($data);
    }

    public static function getArtikelById($id){
        $data = DB::table('artikel')->where('artikelId', $id)->first();
        return $data;
    }

    public static function updateArtikelById($data, $id){
        DB::table('artikel')->where('artikelId', $id)->update(array('judul'=>$data['judul'],
            'isi' => $data['isi'],
            'slug' => $data['slug'],
            'tag' => $data['tag']
        ));
    }

    public static function deleteArtikelById($id){
        DB::table('artikel')->where('artikelId', $id)->delete();
    }
}
 