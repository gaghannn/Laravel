<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{

    function index() {
        $siswa = DB::table('t_siswa')->get();
        return view('belajar', compact('siswa'));
    }

    function create() {
        return view('siswa/form');
    }

    function store(Request $request) 
    {

        $request->validate([
            'nis' => 'required|numeric',
            'nama_lengkap' => 'required|string',
            'jk' => 'required',
            'golongan_darah' => 'required',
        ]);

        $input = $request->all();
        unset($input['_token']);
        $status = DB::table('t_siswa')->insert($input);
        if ($status) {
            return redirect('siswa')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect('siswa/create')->with('error', "Data gagal ditambahkan");
        }
    }

        function edit(Request $request, $id)
        {
            $siswa = DB::table('t_siswa')->find($id);
            return view('siswa.form', compact('siswa'));
        }

        function update(Request $request, $id)
        {
            $request->validate([
                'nis' => 'required|numeric',
                'nama_lengkap' => 'required|string',
                'jk' => 'required',
                'golongan_darah' => 'required',
            ]);

            $input = $request->all();
            unset($input['_token']);
            unset($input['_method']);
            $status = DB::table('t_siswa')->where('id', $id)->update($input);
            if ($status){
                return redirect('/siswa')->with('succes', 'Data berhasil diubah');
            } else{
                return redirect('/siswa/edit/'.$id)->with('error', 'Data gagal diubah');
            }
        }   

        function destroy($id)
        {
            $status = DB::table('t_siswa')->where('id', $id)->delete();
            if ($status) {
                return redirect('/siswa')->with('success', 'Data berhasil dihapus');
            } else {
                return redirect('/siswa')->with('error', 'Data gagal dihapus');
            }
        }
    }

    // function index() {
    //     $siswa = DB::table('t_siswa')->orderBy('nama_lengkap', 'ASC')->where('golongan_darah', '=', 'O')->get();
    //     return view('belajar', compact('siswa'));
    // }
    // function index1() {
    //     $nama = "Ghani";
    //     $jk   = "Laki-laki";
    //     return view('belajar', compact('nama', 'jk'));
    // }

    // function index2() {
    //     $nama = "Kim Mingyu";
    //     $jk   = "Laki-laki";
    //     return view('belajar', compact('nama', 'jk'));
    // }

    // function inde3() {
    //     $nama = "Jake Shim";
    //     $jk   = "Laki-laki";
    //     return view('belajar', compact('nama', 'jk'));
    // }