<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KelasController extends Controller
{

    function kelas() {
        $kelas = DB::table('t_kelas')->get();
        return view('kelas', compact('kelas'));
    }

    function create() {
        return view('kelas/form1');
    }

    function store(Request $request){

        $request->validate([
            'nama_kelas' => 'required|string',
            'jurusan' => 'required|string',
            'lokasi_ruangan' => 'required|string',
            'nama_wali_kelas' => 'required|string',
        ]);

        $input = $request->all();
        unset($input['_token']);
        $status = DB::table('t_kelas')->insert($input);
        if ($status) {
            return redirect('/kelas')->with('success','Data berhasil ditambahkan :D');
        } else {
            return redirect('kelas/create')->with('error', 'Data gagal ditambahkan');
        }
    }

        function edit(Request $request, $id)
        {
            $kelas = DB::table('t_kelas')->find($id);
            return view('kelas.form1', compact('kelas'));
        }

        function update(Request $request, $id)
        {
            $request->validate([
                'nama_kelas' => 'required|string',
                'jurusan' => 'required|string',
                'lokasi_ruangan' => 'required|string',
                'nama_wali_kelas' => 'required|string',
            ]);

            $input = $request->all();
            unset($input['_token']);
            unset($input['_method']);
            $status = DB::table('t_kelas')->where('id', $id)->update($input);
            if ($status){
                return redirect('/kelas')->with('succes', 'Data berhasil diubah');
            } else{
                return redirect('/kelas/edit/'.$id)->with('error', 'Data gagal diubah');
            }
        }

        function destroy($id)
        {
            $status = DB::table('t_kelas')->where('id', $id)->delete();
            if ($status) {
                return redirect('/kelas')->with('success', 'Data berhasil dihapus');
            } else {
                return redirect('/kelas')->with('error', 'Data gagal dihapus');
            }
        }
//          $tkelas = DB::table('t_kelas')->where('jurusan', 'LIKE', 'R%')->get();
//          return view('kelas', compact('tkelas'));
//      }

//       function index() {
//           $tkelas = DB::table('t_kelas')->orderBy('jurusan', 'ASC')->orderBy('nama_kelas', 'ASC')->get();
//           return view('kelas', compact('tkelas'));
//       }

//       function index() {
//           $tkelas = DB::table('t_kelas')->orderBy('lokasi_ruangan', 'ASC')->get();
//           return view('kelas', compact('tkelas'));
//       }

//       function index() {
//           $tkelas = DB::table('t_kelas')->where('nama_wali_kelas', 'LIKE', 'A%')->get();
//           return view('kelas', compact('tkelas'));
//       }
}
