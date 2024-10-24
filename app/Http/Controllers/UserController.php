<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;
use App\Models\Fakultas;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;
    
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index()
    {
        $data = [
            'title' => 'Create User',
            'users' => $this->userModel->getUser(),
        ];
        return view('list_user', $data);
    }

    public function profile($nama = "Naura Salsabila", $kelas = "B", $npm = "2217051079")
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
        ];
        return view('profile', $data);
    }

    public function create()
    {
        $kelas = $this->kelasModel->getKelas(); // Mengambil data kelas
        $fakultas = Fakultas::all(); // Mengambil semua data fakultas
    
        $data = [
            'title' => 'Create User', 
            'kelas' => $kelas,
            'fakultas' => $fakultas, // Menambahkan data fakultas ke array
        ];
    
        return view('create_user', $data); // Mengirim data ke tampilan
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jurusan' => 'required|in:fisika,kimia,biologi,matematika,ilmu komputer',
            'semester' => 'required|integer|between:1,14',
            'fakultas_id' => 'required|integer|exists:fakultas,id',
            'kelas_id' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $filename);
        } else {
            $filename = null;
        }

        $this->userModel->create([
            'nama' => $request->input('nama'),
            'jurusan' => $request->input('jurusan'),
            'semester' => $request->input('semester'),
            'fakultas_id' => $request->input('fakultas_id'),
            'kelas_id' => $request->input('kelas_id'),
            'foto' => $filename,
        ]);

        return redirect()->to('/')->with('success', 'User Berhasil dibuat');
    }

    public function edit($id)
    {
        $user = UserModel::findOrFail($id);
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();
        $fakultas = Fakultas::all(); 
        $title = 'Edit User';
    
        return view('edit_user', compact('user', 'kelas', 'fakultas', 'title')); // Menambahkan fakultas ke view
    }
    

    public function update(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);
        
        $request->validate([
            'nama' => 'required|string|max:255',
            'jurusan' => 'required|in:fisika,kimia,biologi,matematika,ilmu komputer',
            'semester' => 'required|integer|between:1,14',
            'fakultas_id' => 'required|integer|exists:fakultas,id',
            'kelas_id' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user->nama = $request->nama;
        $user->jurusan = $request->jurusan;
        $user->semester = $request->semester;
        $user->fakultas_id = $request->fakultas_id;
        $user->kelas_id = $request->kelas_id;

        if ($request->hasFile('foto')) {
            if ($user->foto) {
                @unlink(storage_path('app/public/uploads/' . $user->foto));
            }

            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $filename);
            $user->foto = $filename;
        }

        $user->save();

        return redirect()->route('user.list')->with('success', 'User berhasil diperbarui');
    }

    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);

        if ($user->foto) {
            @unlink(public_path($user->foto));
        }

        $user->delete();

        return redirect()->to('/user')->with('success', 'User berhasil dihapus.');
    }

    public function show($id)
    {
        $user = $this->userModel->getUser($id);

        if (!$user) {
            return redirect()->route('user.list')->with('error', 'User not found');
        }

        $data = [
            'title' => 'Profile',
            'nama' => $user->nama,
            'jurusan' => $user->jurusan,
            'semester' => $user->semester,
            'fakultas' => $user->fakultas->nama_fakultas,
            'kelas' => $user->kelas->nama_kelas,
            'foto' => $user->foto,
            'user' => $user
        ];

        return view('profile', $data);
    }
}
