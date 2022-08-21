<?php

namespace App\Controllers;

use App\Models\PenggunaModel;
use App\Models\RoleModel;
use App\Models\BarangModel;
use App\Models\PengecekanModel;
use App\Models\Pengecekan_DetailModel;
use App\Models\KriteriaModel;
use App\Models\PengadaanModel;
use App\Models\StatusModel;
use App\Models\PembelianModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Controller;

class Umum extends BaseController
{
    public function __construct() {
        $this->pengguna = new PenggunaModel();
        $this->role = new RoleModel();
        $this->barang = new BarangModel();
        $this->pengecekan = new PengecekanModel();
        $this->pengecekan_detail = new Pengecekan_DetailModel();
        $this->kriteria = new KriteriaModel();
        $this->pengadaan = new PengadaanModel();
        $this->status = new StatusModel();
        $this->pembelian = new PembelianModel();
    }
    

    // ===========================================================================
	// INDEX
	// ===========================================================================

	public function index()
    {
        $data['jd_barang'] = count($this->barang->findAll());
        $data['jd_pengecekan'] = count($this->pengecekan->findAll());
        $data['jd_pengadaan'] = count($this->pengadaan->findAll());
        
        $data["pengguna"] = $this->pengguna->find(session()->get('id_pengguna'));

        return view('umum/index', $data);
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

                $this->barang->where('MONTH(tgl_perolehan)', $exp[1]);
                $this->barang->where('YEAR(tgl_perolehan)', $exp[0]);
            }

		    $data['barang_es'] = $this->barang->findAll();

			return view('umum/barang', $data);
		} else {
            return redirect()->to('/pengadaan/barang');
		}
	}


    // ===========================================================================
	// PENGECEKAN
	// ===========================================================================	

	public function pengecekan($id = null)
	{
		$data["pengguna"] = $this->pengguna->find(session()->get('id_pengguna'));	
		
		if (!isset($id)) { 	
            // PENGECEKAN
            $this->pengecekan->query("SET lc_time_names = 'id_ID';");
            $this->pengecekan->select('
                *,
                DATE_FORMAT(periode, "%W, %d %M %Y") AS _periode, 
            ');		
            $this->pengecekan->orderBy('periode', 'DESC');
            $data['pengecekan_es'] = $this->pengecekan->findAll();

            // KRITERIA
            $this->kriteria->where('id_kriteria !=', 0);
            $data['kriteria_es'] = $this->kriteria->findAll();

            // PENGECEKAN_DETAIL
            $data['id_kriteria_filter'] = "";
            $data['id_pengecekan_filter'] = "";
            $this->pengecekan_detail->join('kriteria', 'kriteria.id_kriteria = pengecekan_detail.kondisi');
            $this->pengecekan_detail->join('barang', 'barang.id_barang = pengecekan_detail.barang');

            $validation =  \Config\Services::validation();
            $validation->setRules([
                'id_pengecekan' => 'required',
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();

            if ($isDataValid) {
                $id_pengecekan = $this->request->getPost('id_pengecekan');
                $data['id_pengecekan_filter'] = $id_pengecekan;

                $this->pengecekan_detail->where('pengecekan', $id_pengecekan);
            }

            $validation =  \Config\Services::validation();
            $validation->setRules([
                'id_kriteria' => 'required',
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();

            if ($isDataValid) {
                $id_kriteria = $this->request->getPost('id_kriteria');
                $data['id_kriteria_filter'] = $id_kriteria;

                $this->pengecekan_detail->where('kondisi', $id_kriteria);
            }		    
            
            $data['pengecekan_detail_es'] = $this->pengecekan_detail->findAll();

			return view('umum/pengecekan', $data);
		} else {
            return redirect()->to('/umum/pengecekan');
		}
	}


    // ===========================================================================
	// PENGADAAN
	// ===========================================================================	

	public function pengadaan($id = null)
	{
		$data["pengguna"] = $this->pengguna->find(session()->get('id_pengguna'));	
		
		if (!isset($id)) { 		
            $data['periode_filter'] = "";

            $this->pengadaan->join('status', 'status.id_status = pengadaan.status');

            $validation =  \Config\Services::validation();
            $validation->setRules([
                'periode' => 'required',
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();

            if ($isDataValid) {
                $periode = $this->request->getPost('periode');
                $exp = explode('-', $periode);
                $data['periode_filter'] = $periode;

                $this->pengadaan->where('MONTH(created)', $exp[1]);
                $this->pengadaan->where('YEAR(created)', $exp[0]);
            }

		    $data['pengadaan_es'] = $this->pengadaan->findAll();

			return view('umum/pengadaan', $data);
		} else {
            return redirect()->to('/pengadaan/pengadaan');
		}
	}


    // ===========================================================================
	// PEMBELIAN
	// ===========================================================================	

	public function pembelian($id = null)
	{
		$data["pengguna"] = $this->pengguna->find(session()->get('id_pengguna'));	
		
		if (!isset($id)) { 		
            $data['tgl_pembelian_filter'] = "";

            $this->pembelian->query("SET lc_time_names = 'id_ID';");
            $this->pembelian->select('
                *,
                DATE_FORMAT(tgl_pembelian, "%W, %d %M %Y") AS _tgl_pembelian, 
            ');		

            $validation =  \Config\Services::validation();
            $validation->setRules([
                'tgl_pembelian' => 'required',
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();

            if ($isDataValid) {
                $tgl_pembelian = $this->request->getPost('tgl_pembelian');
                $exp = explode('-', $tgl_pembelian);
                $data['tgl_pembelian_filter'] = $tgl_pembelian;

                $this->pembelian->where('MONTH(tgl_pembelian)', $exp[1]);
                $this->pembelian->where('YEAR(tgl_pembelian)', $exp[0]);
            }

		    $data['pembelian_es'] = $this->pembelian->findAll();

			return view('umum/pembelian', $data);
		} else {
            return redirect()->to('/pengadaan/pembelian');
		}
	}


    // ===========================================================================
	// PENGAJUAN
	// ===========================================================================

	public function pengajuan($id = null)
	{
		$data["pengguna"] = $this->pengguna->find(session()->get('id_pengguna'));	
		
		if (!isset($id)) { 	
            $data['status_es'] = $this->status->findAll();

			return view('umum/pengajuan', $data);
		} else {
            return redirect()->to('/umum/pengajuan');
		}
	}

	// CRUD
    public function tambah_keterangan()
	{
		$validation =  \Config\Services::validation();
        $validation->setRules([
            'id_pengadaan' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        if ($isDataValid) {
            $this->pengadaan->update($this->request->getPost('id_pengadaan'), [
                "keterangan" => $this->request->getPost('keterangan'),
            ]);

            echo 'sukses';
        } else {
            echo 'gagal';
        }
    }

    public function terima_pengajuan()
	{
		$validation =  \Config\Services::validation();
        $validation->setRules([
            'id_pengadaan' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        if ($isDataValid) {
            $this->pengadaan->update($this->request->getPost('id_pengadaan'), [
                "status" => 1,
            ]);

            echo 'sukses';
        } else {
            echo 'gagal';
        }
    }

	public function tolak_pengajuan()
	{
		$validation =  \Config\Services::validation();
        $validation->setRules([
            'id_pengadaan' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        if ($isDataValid) {
            $this->pengadaan->update($this->request->getPost('id_pengadaan'), [
                "status" => 2,
            ]);

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

        return view('umum/profile', $data);
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

}
