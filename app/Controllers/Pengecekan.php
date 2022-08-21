<?php

namespace App\Controllers;

use App\Models\PenggunaModel;
use App\Models\RoleModel;
use App\Models\BarangModel;
use App\Models\PengecekanModel;
use App\Models\Pengecekan_DetailModel;
use App\Models\KriteriaModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Controller;

class Pengecekan extends BaseController
{
    public function __construct() {
        $this->pengguna = new PenggunaModel();
        $this->role = new RoleModel();
        $this->barang = new BarangModel();
        $this->pengecekan = new PengecekanModel();
        $this->pengecekan_detail = new Pengecekan_DetailModel();
        $this->kriteria = new KriteriaModel();
    }
    
    
    // ===========================================================================
	// INDEX
	// ===========================================================================

	public function index()
    {
        $data['jd_barang'] = count($this->barang->findAll());
        $data['jd_pengecekan'] = count($this->pengecekan->findAll());
        
        $data["pengguna"] = $this->pengguna->find(session()->get('id_pengguna'));

        return view('pengecekan/index', $data);
    }


    // ===========================================================================
	// BARANG
	// ===========================================================================	

	public function barang($id = null)
	{
		$data["pengguna"] = $this->pengguna->find(session()->get('id_pengguna'));	
		
		if (!isset($id)) { 			
		    $data['tgl_rekap_filter'] = "";
            $data['tgl_perolehan_filter'] = "";
            
            $this->pengecekan->query("SET lc_time_names = 'id_ID';");
            $this->barang->select('
                *,
                DATE_FORMAT(tgl_rekap, "%W, %d %M %Y") AS _tgl_rekap, 
                DATE_FORMAT(tgl_perolehan, "%W, %d %M %Y") AS _tgl_perolehan, 
            ');		

            $validation =  \Config\Services::validation();
            $validation->setRules([
                'tgl_rekap' => 'required',
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();

            if ($isDataValid) {
                $tgl_rekap = $this->request->getPost('tgl_rekap');
                $exp = explode('-', $tgl_rekap);
                $data['tgl_rekap_filter'] = $tgl_rekap;

                $this->barang->where('DAY(tgl_rekap)', $exp[2]);
                $this->barang->where('MONTH(tgl_rekap)', $exp[1]);
                $this->barang->where('YEAR(tgl_rekap)', $exp[0]);
            }

            $validation =  \Config\Services::validation();
            $validation->setRules([
                'tgl_perolehan' => 'required',
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();

            if ($isDataValid) {
                $tgl_perolehan = $this->request->getPost('tgl_perolehan');
                $exp = explode('-', $tgl_perolehan);
                $data['tgl_perolehan_filter'] = $tgl_perolehan;

                $this->barang->where('DAY(tgl_perolehan)', $exp[2]);
                $this->barang->where('MONTH(tgl_perolehan)', $exp[1]);
                $this->barang->where('YEAR(tgl_perolehan)', $exp[0]);
            }
            
            $data['barang_es'] = $this->barang->findAll();

			return view('pengecekan/barang', $data);
		} else {
            return redirect()->to('/pengecekan/barang');
		}
	}


    // ===========================================================================
	// PENGECEKAN
	// ===========================================================================	

	public function pengecekan($id = null)
	{
		$data["pengguna"] = $this->pengguna->find(session()->get('id_pengguna'));	
		
		if (!isset($id)) { 			
            $this->pengecekan->query("SET lc_time_names = 'id_ID';");
            $this->pengecekan->select('
                *,
                DATE_FORMAT(periode, "%W, %d %M %Y") AS _periode, 
            ');
            $this->pengecekan->orderBy('periode', 'DESC');
		    $data['pengecekan_es'] = $this->pengecekan->findAll();

			return view('pengecekan/pengecekan', $data);
		} else {
            return redirect()->to('/pengecekan/pengecekan');
		}
	}

	// CRUD
	public function tambah_pengecekan()
	{
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'periode' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $this->pengecekan->insert([
                "periode" => $this->request->getPost('periode'),
            ]);
            
            echo 'sukses';
        } else {
            echo 'gagal';
        }
	}

	public function hapus_pengecekan()
	{
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id_pengecekan' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        if ($isDataValid) {
            $this->pengecekan->delete($this->request->getPost('id_pengecekan'));

            echo 'sukses';
        } else {
            echo 'gagal';
        }
	}


    // ===========================================================================
	// DETAIL PENGECEKAN
	// ===========================================================================	

	public function pengecekan_detail($id = null)
	{
		$data["pengguna"] = $this->pengguna->find(session()->get('id_pengguna'));	
		
		if (!isset($id)) { 			
		    return redirect()->to('/pengecekan/pengecekan');
		} else {
            $data['id'] = $id;

            $data['kriteria_es'] = $this->kriteria->findAll();

            $this->pengecekan_detail->where('pengecekan', $id);
            $this->pengecekan_detail->where('kondisi', 0);
            $jumlah[0] = count($this->pengecekan_detail->findAll());

            $this->pengecekan_detail->where('pengecekan', $id);
            $this->pengecekan_detail->where('kondisi', 1);
            $jumlah[1] = count($this->pengecekan_detail->findAll());

            $this->pengecekan_detail->where('pengecekan', $id);
            $this->pengecekan_detail->where('kondisi', 2);
            $jumlah[2] = count($this->pengecekan_detail->findAll());

            $this->pengecekan_detail->where('pengecekan', $id);
            $this->pengecekan_detail->where('kondisi', 3);
            $jumlah[3] = count($this->pengecekan_detail->findAll());

			$data["jumlah"] = $jumlah;

            $this->pengecekan_detail->join('barang', 'barang.id_barang = pengecekan_detail.barang');
            $data["pengecekan_detail_es"] = $this->pengecekan_detail->where([
                'pengecekan' => $id
            ])->findAll();

			if ($data["pengecekan_detail_es"]) {
				return view('pengecekan/pengecekan_detail', $data);
			} else {
				return view('pengecekan/error404', $data);
			}
		}
	}

	// CRUD
	public function edit_pengecekan_detail()
	{
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id_pengecekan_detail' => 'required',
            'kondisi' => 'required',
            'foto' => [
				'rules' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,4096]',
				'errors' => [
					'uploaded' => 'Harus Ada File yang diupload',
					'mime_in' => 'File Extention Harus Berupa jpg, jpeg, png',
					'max_size' => 'Ukuran File Maksimal 4 MB'
				]
 
			]
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        if ($isDataValid) {
            $foto = $this->request->getFile('foto');
            $fileName = $foto->getRandomName();

            $this->pengecekan_detail->update($this->request->getPost('id_pengecekan_detail'), [
                "kondisi" => $this->request->getPost('kondisi'),
                "catatan" => $this->request->getPost('catatan'),
                "foto"    => $fileName,
            ]);

            $foto->move('_img/pengecekan/', $fileName);

            echo 'sukses';
        } else {
            echo 'gagal';
        }
	}


    // ===========================================================================
	// PROFILE
	// ===========================================================================

    public function profile()
    {
        $this->pengguna->join('role', 'role.id_role = pengguna.role');
        $data["pengguna"] = $this->pengguna->find(session()->get('id_pengguna'));

        return view('pengecekan/profile', $data);
    }

    // CRUD
    public function edit_profile()
	{
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'username' => 'required',
            'email' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        if ($isDataValid) {
            $this->pengguna->update(session()->get('id_pengguna'), [
                "username" => $this->request->getPost('username'),
                "email" => $this->request->getPost('email')
            ]);

            echo 'sukses';
        } else {
            echo 'gagal';
        }
	}

    public function edit_password_pengguna()
	{
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'password' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        if ($isDataValid) {
            $this->pengguna->update(session()->get('id_pengguna'), [
                "password" => md5($this->request->getPost('password')),
            ]);

            echo 'sukses';
        } else {
            echo 'gagal';
        }
	}

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }


    // ===========================================================================
	// DLL
	// ===========================================================================

    public function get_jumlah_pengecekan()
	{
		$validation =  \Config\Services::validation();
        $validation->setRules([
            'id_pengecekan' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        if ($isDataValid) {
            $this->pengecekan_detail->where('pengecekan', $this->request->getPost('id_pengecekan'));
            $this->pengecekan_detail->where('kondisi', 0);
            $jumlah_0 = count($this->pengecekan_detail->findAll());

            $this->pengecekan_detail->where('pengecekan', $this->request->getPost('id_pengecekan'));
            $this->pengecekan_detail->where('kondisi', 1);
            $jumlah_1 = count($this->pengecekan_detail->findAll());

            $this->pengecekan_detail->where('pengecekan', $this->request->getPost('id_pengecekan'));
            $this->pengecekan_detail->where('kondisi', 2);
            $jumlah_2 = count($this->pengecekan_detail->findAll());

            $this->pengecekan_detail->where('pengecekan', $this->request->getPost('id_pengecekan'));
            $this->pengecekan_detail->where('kondisi', 3);
            $jumlah_3 = count($this->pengecekan_detail->findAll());

			$output = array(
				'kondisi_0'     => $jumlah_0,
				'kondisi_1'     => $jumlah_1,
				'kondisi_2'     => $jumlah_2,
				'kondisi_3'     => $jumlah_3,
			);

			echo json_encode($output);
		} 
	}
    
}
