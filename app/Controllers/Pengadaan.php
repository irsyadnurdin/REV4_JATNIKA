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

class Pengadaan extends BaseController
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

        return view('pengadaan/index', $data);
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

			return view('pengadaan/barang', $data);
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

			return view('pengadaan/pengecekan', $data);
		} else {
            return redirect()->to('/pengadaan/pengecekan');
		}
	}


    // ===========================================================================
	// PENGAJUAN
	// ===========================================================================	

	public function pengajuan($id = null)
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
                $this->pengecekan_detail->where('kondisi', 2);
                $jumlah[2] = count($this->pengecekan_detail->findAll());

                $this->pengecekan_detail->where('pengecekan', $this->request->getPost('id_pengecekan'));
                $this->pengecekan_detail->where('kondisi', 3);
                $jumlah[3] = count($this->pengecekan_detail->findAll());

                $id_pengecekan = $this->request->getPost('id_pengecekan');
            } else {
                $id_pengecekan = "";
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

            $data['jumlah'] = $jumlah;

            $data['id_pengecekan'] = $id_pengecekan;

			return view('pengadaan/pengajuan', $data);
		} else {
            return redirect()->to('/pengadaan/pengadaan');
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

			return view('pengadaan/pengadaan', $data);
		} else {
            return redirect()->to('/pengadaan/pengadaan');
		}
	}

	// CRUD
	public function tambah_pengadaan()
	{
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama_barang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'harga_satuan' => 'required',
            'total_harga' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $this->pengadaan->insert([
                "nama_barang_pengadaan" => $this->request->getPost('nama_barang'),
                "merk_pengadaan" => $this->request->getPost('merk'),
                "jumlah_pengadaan" => $this->request->getPost('jumlah'),
                "harga_satuan" => $this->request->getPost('harga_satuan'),
                "total_harga" => $this->request->getPost('total_harga'),
            ]);
            
            echo 'sukses';
        } else {
            echo 'gagal';
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

			return view('pengadaan/pembelian', $data);
		} else {
            $data["pembelian"] = $this->pembelian->find($id);

			if ($data["pembelian"]) {
				return view('pengadaan/pembelian_edit', $data);
			} else {
				return view('pengadaan/error404', $data);
			}
		}
	}

	public function pembelian_tambah()
	{
        $data["pengguna"] = $this->pengguna->find(session()->get('id_pengguna'));		

		return view('pengadaan/pembelian_tambah', $data);
	}

	// CRUD
	public function tambah_pembelian()
	{
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama_barang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'tgl_pembelian' => 'required',
            'asal_perolehan' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $validation =  \Config\Services::validation();
            $validation->setRules([
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

                $this->pembelian->insert([
                    "nama_barang" => $this->request->getPost('nama_barang'),
                    "merk" => $this->request->getPost('merk'),
                    "jumlah" => $this->request->getPost('jumlah'),
                    "harga" => $this->request->getPost('harga'),
                    "tgl_pembelian" => $this->request->getPost('tgl_pembelian'),
                    "asal_perolehan" => $this->request->getPost('asal_perolehan'),
                    "foto" => $fileName,
                ]);

                $foto->move('_img/pembelian/', $fileName);
                
                echo 'sukses';
            } else {   
                echo 'gagal';
            }	
        } else {
            echo 'gagal';
        }
	}

    public function edit_pembelian()
	{
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id_pembelian' => 'required',
            'nama_barang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'tgl_pembelian' => 'required',
            'asal_perolehan' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        if ($isDataValid) {
            $validation =  \Config\Services::validation();
            $validation->setRules([
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
                $temp = $this->pembelian->find($this->request->getPost('id_pembelian'));

                $path = '../public/_img/pembelian/';
                @unlink($path . $temp['foto']);

                $foto = $this->request->getFile('foto');
                $fileName = $foto->getRandomName();

                $this->pembelian->update($this->request->getPost('id_pembelian'), [
                    "nama_barang" => $this->request->getPost('nama_barang'),
                    "merk" => $this->request->getPost('merk'),
                    "jumlah" => $this->request->getPost('jumlah'),
                    "harga" => $this->request->getPost('harga'),
                    "tgl_pembelian" => $this->request->getPost('tgl_pembelian'),
                    "asal_perolehan" => $this->request->getPost('asal_perolehan'),
                    'foto' => $fileName,
                ]);

                $foto->move('_img/pembelian/', $fileName);
            } else {
                $this->pembelian->update($this->request->getPost('id_pembelian'), [
                    "nama_barang" => $this->request->getPost('nama_barang'),
                    "merk" => $this->request->getPost('merk'),
                    "jumlah" => $this->request->getPost('jumlah'),
                    "harga" => $this->request->getPost('harga'),
                    "tgl_pembelian" => $this->request->getPost('tgl_pembelian'),
                    "asal_perolehan" => $this->request->getPost('asal_perolehan'),
                ]);
            }

            echo 'sukses';
        } else {
            echo 'gagal';
        }
	}

	// public function edit_barang()
	// {
    //     $validation =  \Config\Services::validation();
    //     $validation->setRules([
    //         'kode_barang' => 'required',
    //         'nup' => 'required',
    //         'nama_barang' => 'required',
    //         'merk' => 'required',
    //         'tgl_rekap' => 'required',
    //         'tgl_perolehan' => 'required',
    //     ]);
    //     $isDataValid = $validation->withRequest($this->request)->run();
        
    //     if ($isDataValid) {
    //         $this->barang->where('kode_barang', $this->request->getPost('kode_barang'));
    //         $this->barang->where('id_barang !=', $this->request->getPost('id_barang'));
    //         $pengecekan_kode_produk = $this->barang->find();

    //         if ($pengecekan_kode_produk) {
    //             echo 'kode_produk_sudah_terdaftar';
    //         } else {
    //             $this->barang->where('nup', $this->request->getPost('nup'));
    //             $this->barang->where('id_barang !=', $this->request->getPost('id_barang'));
    //             $pengecekan = $this->barang->find();

    //             if ($pengecekan) {
    //                 echo 'nup_sudah_terdaftar';
    //             } else {
    //                 $this->barang->update($this->request->getPost('id_barang'), [
    //                     "kode_barang" => $this->request->getPost('kode_barang'),
    //                     "nup" => $this->request->getPost('nup'),
    //                     "nama_barang" => $this->request->getPost('nama_barang'),
    //                     "merk" => $this->request->getPost('merk'),
    //                     "tgl_rekap" => $this->request->getPost('tgl_rekap'),
    //                     "tgl_perolehan" => $this->request->getPost('tgl_perolehan'),
    //                     "pemegang" => $this->request->getPost('pemegang'),
    //                     "asal_perolehan" => $this->request->getPost('asal_perolehan'),
    //                 ]);

    //                 echo 'sukses';
    //             }
    //         }
    //     } else {
    //         echo 'gagal';
    //     }
	// }

	public function hapus_pembelian()
	{
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id_pembelian' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        if ($isDataValid) {
            $this->pembelian->delete($this->request->getPost('id_pembelian'));

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

        return view('pengadaan/profile', $data);
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
        $pengadaan = $this->pengadaan->find($this->request->getPost('id_pengadaan'));

        $output = array(
            'id_pengadaan'              => $pengadaan['id_pengadaan'],
            'nama_barang_pengadaan'     => $pengadaan['nama_barang_pengadaan'],
            'merk_pengadaan'            => $pengadaan['merk_pengadaan'],
            'jumlah_pengadaan'          => $pengadaan['jumlah_pengadaan'],
            'harga_satuan'              => "Rp " . number_format($pengadaan['harga_satuan'], 2, ',', '.'),
            'total_harga'               => "Rp " . number_format($pengadaan['total_harga'], 2, ',', '.'),
            'status'                    => $pengadaan['deskripsi_status'],
            'key'                       => $pengadaan['status'],
            'tanggal_konfirmasi'        => $pengadaan['tanggal_konfirmasi'],
        );

        echo json_encode($output);
	}

}
