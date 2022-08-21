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

class Pendataan extends BaseController
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
        $this->barang->where('active', 1);
        $data['jd_barang'] = count($this->barang->findAll());
        $data['jd_pengecekan'] = count($this->pengecekan->findAll());
        $data['jd_pengguna'] = count($this->pengguna->findAll());
        $data['jd_pengadaan'] = count($this->pengadaan->findAll());

        $data["pengguna"] = $this->pengguna->find(session()->get('id_pengguna'));

        return view('pendataan/index', $data);
    }


    // ===========================================================================
	// BARANG
	// ===========================================================================	

	public function barang($id = null)
	{
		$data['tgl_rekap_filter'] = "";
        $data['tgl_perolehan_filter'] = "";
        $data["pengguna"] = $this->pengguna->find(session()->get('id_pengguna'));	
		
		if (!isset($id)) { 	
            $this->pengecekan->query("SET lc_time_names = 'id_ID';");
            $this->barang->select('
                *,
                DATE_FORMAT(tgl_rekap, "%W, %d %M %Y") AS _tgl_rekap, 
                DATE_FORMAT(tgl_perolehan, "%W, %d %M %Y") AS _tgl_perolehan, 
            ');				
            $this->barang->where('active', 1);

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

			return view('pendataan/barang', $data);
		} else {
            $this->barang->where('active', 1);
            $data["barang"] = $this->barang->find($id);

			if ($data["barang"]) {
				return view('pendataan/barang_edit', $data);
			} else {
				return view('pendataan/error404', $data);
			}
		}
	}

	public function barang_tambah()
	{
        $data["pengguna"] = $this->pengguna->find(session()->get('id_pengguna'));		

		return view('pendataan/barang_tambah', $data);
	}

    public function barang_hapus()
	{
		$data["pengguna"] = $this->pengguna->find(session()->get('id_pengguna'));	
		
        $this->pengecekan->query("SET lc_time_names = 'id_ID';");
        $this->barang->select('
            *,
            DATE_FORMAT(tgl_rekap, "%W, %d %M %Y") AS _tgl_rekap, 
            DATE_FORMAT(tgl_perolehan, "%W, %d %M %Y") AS _tgl_perolehan, 
            DATE_FORMAT(modified, "%W, %d %M %Y - %H:%i:%s WIB") AS _modified, 
        ');				
        $this->barang->where('active', 0);
        $data['barang_es'] = $this->barang->findAll();

        return view('pendataan/barang_hapus', $data);
	}

	// CRUD
	public function tambah_barang()
	{
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'kode_barang' => 'required',
            'nup' => 'required',
            'nama_barang' => 'required',
            'merk' => 'required',
            'tgl_rekap' => 'required',
            'tgl_perolehan' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            
            $this->barang->where('kode_barang', $this->request->getPost('kode_barang'));
            $pengecekan_kode_barang = $this->barang->find();

            if ($pengecekan_kode_barang) {
                echo 'kode_barang_sudah_terdaftar';
            } else {
                $this->barang->where('nup', $this->request->getPost('nup'));
                $pengecekan = $this->barang->find();

                if ($pengecekan) {
                    echo 'nup_sudah_terdaftar';
                } else {
                    $this->barang->insert([
                        "kode_barang" => $this->request->getPost('kode_barang'),
                        "nup" => $this->request->getPost('nup'),
                        "nama_barang" => $this->request->getPost('nama_barang'),
                        "merk" => $this->request->getPost('merk'),
                        "tgl_rekap" => $this->request->getPost('tgl_rekap'),
                        "tgl_perolehan" => $this->request->getPost('tgl_perolehan'),
                        "pemegang" => $this->request->getPost('pemegang'),
                        "asal_perolehan" => $this->request->getPost('asal_perolehan'),
                    ]);
                    
                    echo 'sukses';
                }
            }
        } else {
            echo 'gagal';
        }
	}

    public function tambah_barang_excel()
	{
        $file = $this->request->getFile('excel');
    
        if ($file) {
            $extension = $file->getClientExtension();
            
            if ('xls' == $extension){
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            
            $spreadsheet = $reader->load($file);
            $data = $spreadsheet->getActiveSheet()->toArray();
    
            echo 'sukses';

            foreach($data as $idx => $row) {
                if ($idx < 7) {
                    continue;
                } else {
                    $kode_barang    = $row[1];
                    $nup            = $row[2];
                    $nama_barang    = $row[3];
                    $merk           = $row[4];
                    $tgl_rekap      = $row[5];
                    $tgl_perolehan  = $row[6];
                    $pemegang       = $row[7];
                    $asal_perolehan = $row[8];
        
                    $status = $this->barang->insert([
                        "kode_barang"       => $kode_barang,
                        "nup"               => $nup,
                        "nama_barang"       => $nama_barang,
                        "merk"              => $merk,
                        "tgl_rekap"         => date('Y-m-d', strtotime($tgl_rekap)),
                        "tgl_perolehan"     => date('Y-m-d', strtotime($tgl_perolehan)),
                        "pemegang"          => $pemegang,
                        "asal_perolehan"    => $asal_perolehan,
                    ]);
                }
            }
        } else {
            echo "gagal";
        }
	}

	public function edit_barang()
	{
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'kode_barang' => 'required',
            'nup' => 'required',
            'nama_barang' => 'required',
            'merk' => 'required',
            'tgl_rekap' => 'required',
            'tgl_perolehan' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        if ($isDataValid) {
            $this->barang->where('kode_barang', $this->request->getPost('kode_barang'));
            $this->barang->where('id_barang !=', $this->request->getPost('id_barang'));
            $pengecekan_kode_produk = $this->barang->find();

            if ($pengecekan_kode_produk) {
                echo 'kode_produk_sudah_terdaftar';
            } else {
                $this->barang->where('nup', $this->request->getPost('nup'));
                $this->barang->where('id_barang !=', $this->request->getPost('id_barang'));
                $pengecekan = $this->barang->find();

                if ($pengecekan) {
                    echo 'nup_sudah_terdaftar';
                } else {
                    $this->barang->update($this->request->getPost('id_barang'), [
                        "kode_barang" => $this->request->getPost('kode_barang'),
                        "nup" => $this->request->getPost('nup'),
                        "nama_barang" => $this->request->getPost('nama_barang'),
                        "merk" => $this->request->getPost('merk'),
                        "tgl_rekap" => $this->request->getPost('tgl_rekap'),
                        "tgl_perolehan" => $this->request->getPost('tgl_perolehan'),
                        "pemegang" => $this->request->getPost('pemegang'),
                        "asal_perolehan" => $this->request->getPost('asal_perolehan'),
                    ]);

                    echo 'sukses';
                }
            }
        } else {
            echo 'gagal';
        }
	}

	public function hapus_barang()
	{
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id_barang' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        if ($isDataValid) {
            $this->barang->update($this->request->getPost('id_barang'), [
                "active" => 0,
            ]);

            echo 'sukses';
        } else {
            echo 'gagal';
        }
	}


    // ===========================================================================
	// PENGADAAN
	// ===========================================================================

	public function pengadaan($id = null)
	{
		$data["pengguna"] = $this->pengguna->find(session()->get('id_pengguna'));	
		
		if (!isset($id)) { 	
            $data['status_es'] = $this->status->findAll();

			return view('pendataan/pengadaan', $data);
		} else {
            return redirect()->to('/pendataan/pengadaan');
		}
	}


    // ===========================================================================
	// PENGECEKAN
	// ===========================================================================	

	public function pengecekan($id = null)
	{
		$data["pengguna"] = $this->pengguna->find(session()->get('id_pengguna'));	
		
		if (!isset($id)) { 	
            $validation =  \Config\Services::validation();
            $validation->setRules([
                'id_pengecekan' => 'required',
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();
            
            $jumlah = array();

            if ($isDataValid) {
                $this->pengecekan_detail->where('pengecekan', $this->request->getPost('id_pengecekan'));
                $this->pengecekan_detail->where('kondisi', 0);
                $jumlah[0] = count($this->pengecekan_detail->findAll());
                
                $this->pengecekan_detail->where('pengecekan', $this->request->getPost('id_pengecekan'));
                $this->pengecekan_detail->where('kondisi', 1);
                $jumlah[1] = count($this->pengecekan_detail->findAll());
                
                $this->pengecekan_detail->where('pengecekan', $this->request->getPost('id_pengecekan'));
                $this->pengecekan_detail->where('kondisi', 2);
                $jumlah[2] = count($this->pengecekan_detail->findAll());

                $this->pengecekan_detail->where('pengecekan', $this->request->getPost('id_pengecekan'));
                $this->pengecekan_detail->where('kondisi', 3);
                $jumlah[3] = count($this->pengecekan_detail->findAll());

                $id_pengecekan = $this->request->getPost('id_pengecekan');
            } else {
                $id_pengecekan = "";
                $jumlah[0] = 0;
                $jumlah[1] = 0;
                $jumlah[2] = 0;
                $jumlah[3] = 0;
            }

            $this->pengecekan->query("SET lc_time_names = 'id_ID';");
            $this->pengecekan->select('
                *,
                DATE_FORMAT(periode, "%W, %d %M %Y") AS _periode, 
            ');		
		    $this->pengecekan->orderBy('periode', 'DESC');
		    $data['pengecekan_es'] = $this->pengecekan->findAll();

            $data['kriteria_es'] = $this->kriteria->findAll();

            $data['jumlah'] = $jumlah;

            $data['id_pengecekan'] = $id_pengecekan;

			return view('pendataan/pengecekan', $data);
		} else {
            return redirect()->to('/pendataan/pengecekan');
		}
	}


    // ===========================================================================
	// PEMBELIAN
	// ===========================================================================	

	public function pembelian($id = null)
	{
		$data['tgl_pembelian_filter'] = "";
        $data["pengguna"] = $this->pengguna->find(session()->get('id_pengguna'));	
		
		if (!isset($id)) { 	
            $this->pengecekan->query("SET lc_time_names = 'id_ID';");
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

                $this->pembelian->where('DAY(tgl_pembelian)', $exp[2]);
                $this->pembelian->where('MONTH(tgl_pembelian)', $exp[1]);
                $this->pembelian->where('YEAR(tgl_pembelian)', $exp[0]);
            }

		    $data['pembelian_es'] = $this->pembelian->findAll();

			return view('pendataan/pembelian', $data);
		} else {
            return view('pendataan/error404', $data);
		}
	}


    // ===========================================================================
	// PENGGUNA
	// ===========================================================================	

	public function pengguna($id = null)
	{
		$data["pengguna"] = $this->pengguna->find(session()->get('id_pengguna'));	
		
		if (!isset($id)) { 			
		    $this->pengguna->join('role', 'role.id_role = pengguna.role');
            $data['pengguna_es'] = $this->pengguna->findAll();

			return view('pendataan/pengguna', $data);
		} else {
            $data["pengguna"] = $this->pengguna->find($id);
            $data['role_es'] = $this->role->findAll();	

			if ($data["pengguna"]) {
				return view('pendataan/pengguna_edit', $data);
			} else {
				return view('pendataan/error404', $data);
			}
		}
	}
    
    public function pengguna_tambah()
	{
        $data["pengguna"] = $this->pengguna->find(session()->get('id_pengguna'));	
        $data['role_es'] = $this->role->findAll();	

		return view('pendataan/pengguna_tambah', $data);
	}

	// CRUD
	public function tambah_pengguna()
	{
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'username' => 'required',
            'nama_pengguna' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $this->pengguna->insert([
                "username" => $this->request->getPost('username'),
                "nama_pengguna" => $this->request->getPost('nama_pengguna'),
                "email" => $this->request->getPost('email'),
                "role" => $this->request->getPost('role'),
                "password" => md5($this->request->getPost('password')),
            ]);
            
            echo 'sukses';
        } else {
            echo 'gagal';
        }
	}

	public function edit_pengguna()
	{
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id_pengguna' => 'required',
            'username' => 'required',
            'nama_pengguna' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        if ($isDataValid) {
            $this->pengguna->update($this->request->getPost('id_pengguna'), [
                "username" => $this->request->getPost('username'),
                "nama_pengguna" => $this->request->getPost('nama_pengguna'),
                "email" => $this->request->getPost('email'),
                "role" => $this->request->getPost('role'),
            ]);

            echo 'sukses';
        } else {
            echo 'gagal';
        }
	}

	public function hapus_pengguna()
	{
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id_pengguna' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        if ($isDataValid) {
            $this->pengguna->delete($this->request->getPost('id_pengguna'));

            echo 'sukses';
        } else {
            echo 'gagal';
        }
	}

    public function reset_password()
	{
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id_pengguna' => 'required',
            'password' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        if ($isDataValid) {
            $this->pengguna->update($this->request->getPost('id_pengguna'), [
                "password" => md5($this->request->getPost('password')),
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

        return view('pendataan/profile', $data);
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
	// DATATABLE
	// ===========================================================================

    public function get_detail_pengadaan()
	{
        $this->pengadaan->query("SET lc_time_names = 'id_ID';");
        $this->pengadaan->select('
            *,
            DATE_FORMAT(modified, "%W, %d %M %Y - %H:%i:%s WIB") AS tanggal_konfirmasi, 
        ');	
        $this->pengadaan->join('status', 'status.id_status = pengadaan.status');
        $this->pengadaan->orderBy('created', 'DESC');
        $pengadaan = $this->pengadaan->find($this->request->getPost('id_pengadaan'));

        $output = array(
            'id_pengadaan'              => $pengadaan['id_pengadaan'],
            'nama_barang_pengadaan'     => $pengadaan['nama_barang_pengadaan'],
            'merk_pengadaan'            => $pengadaan['merk_pengadaan'],
            'jumlah_pengadaan'          => $pengadaan['jumlah_pengadaan'],
            'harga_satuan'              => "Rp " . number_format($pengadaan['harga_satuan'], 2, ',', '.'),
            'total_harga'               => "Rp " . number_format($pengadaan['total_harga'], 2, ',', '.'),
            'status'                    => $pengadaan['deskripsi_status'],
            'keterangan'                => $pengadaan['keterangan'],
            'tanggal_konfirmasi'        => $pengadaan['tanggal_konfirmasi'],
        );

        echo json_encode($output);
	}


    // ===========================================================================
	// DLL
	// ===========================================================================	

	function download_template()
	{
		return $this->response->download('_berkas/template/barang.xlsx', null);
	}
}
