<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Person;

class BackendController extends Controller
{
    public function getIndex(){
      $persons = Person::paginate(10);
      return view('backend.index', ['persons' => $persons]);
    }

    public function getAdd(){
      return view('backend.add');
    }

    public function postCreate(Request $request){
      $validation = $request->validate([
        'email' => 'required|unique:persons,email|email',
        'telepon' => 'required',
        'nama' => 'required',
        'tgl_lahir' => 'required|date|date_format:Y-m-d'
      ],[
        'email.required' => 'Email harus diisi',
        'email.unique'  => 'Email Sudah Terdaftar',
        'email.email' => 'Format email tidak sesuai',
        'telepon.required' => 'No Telepon harus diisi',
        'telepon.unique' => 'No Telepon Sudah terdaftar',
        'tgl_lahir.required' => 'Tanggal lahir harus diisi',
        'nama.required' => 'Nama harus diisi'
      ]);

      if($validation){
        $person = new Person;
        $person->email = $request->email;
        $person->no_telepon = $request->telepon;
        $person->nama_lengkap = $request->nama;
        $person->jenis_kelamin = $request->jenis_kelamin;
        $person->tanggal_lahir = $request->tgl_lahir;
        $person->alamat = $request->alamat;
        $response = $person->save();
        if($response){
          return redirect()->route('backend.index')->with('status', 'Data berhasil disimpan');
        }
      }

      return redirect()->route('backend.add')->with('status', 'Data gagal disimpan');
    }
}
