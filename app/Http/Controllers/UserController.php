<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;

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
        $kelas = $this->kelasModel->getKelas();
        $data = [
            'title' => 'Create User', 
            'kelas' => $kelas,
        ];
        return view('create_user', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoPath = $foto->move('upload/img', $foto->getClientOriginalName());
        } else {
            $fotoPath = null;
        }

        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
            'foto' => $fotoPath,
        ]);

        return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = UserModel::findOrFail($id); 
        $kelasModel = new Kelas();          
        $kelas = $kelasModel->getKelas();   
        $title = 'Edit User';               
        return view('edit_user', compact('user', 'kelas', 'title'));
    }

    public function update(Request $request, $id) 
    {
        $user = UserModel::findOrFail($id);
        
        $user->nama = $request->nama;
        $user->npm = $request->npm;
        $user->kelas_id = $request->kelas_id;

        if ($request->hasFile('foto')) {
            if ($user->foto) {
                @unlink(public_path('upload/img/' . $user->foto)); 
            }
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('upload/img'), $fileName);
            $user->foto = 'upload/img/' . $fileName; 
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
            'npm' => $user->npm,
            'user' => $user
        ];
    
        return view('profile', $data);
    }
}