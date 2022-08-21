<?php namespace App\Libraries;

use App\Models\PengadaanModel;
use App\Models\Pengecekan_DetailModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Widget
{
    public function __construct() {
        $this->pengadaan = new PengadaanModel();
        $this->pengecekan_detail = new Pengecekan_DetailModel();
    }

    public function pengadaan(array $params = [])
    {
		$data['id_tabel'] = $params['id_tabel'];
        $data['tambah'] = $params['tambah'];

        $this->pengadaan->join('status', 'status.id_status = pengadaan.status');
        $this->pengadaan->where('status', $params['status']);	
        $this->pengadaan->orderby("created", "DESC");	
        $data['pengadaan_es'] = $this->pengadaan->findAll();

        return view('widget/pengadaan', $data);
    }

    public function pengadaan_umum(array $params = [])
    {
		$data['id_tabel'] = $params['id_tabel'];

        $this->pengadaan->join('status', 'status.id_status = pengadaan.status');
        $this->pengadaan->where('status', $params['status']);	
        $this->pengadaan->orderby("created", "DESC");	
        $data['pengadaan_es'] = $this->pengadaan->findAll();

        return view('widget/pengadaan_umum', $data);
    }

    public function pengecekan(array $params = [])
    {
		$data['id_tabel'] = $params['id_tabel'];
        $data['id_pengecekan'] = $params['id_pengecekan'];
        $data['kondisi'] = $params['kondisi'];

        $this->pengecekan_detail->join('barang', 'barang.id_barang = pengecekan_detail.barang');
        $this->pengecekan_detail->where('pengecekan', $data['id_pengecekan']);
        $this->pengecekan_detail->where('kondisi', $data['kondisi']);
        $data["pengecekan_detail_es"] = $this->pengecekan_detail->findAll();

        return view('widget/pengecekan', $data);
    }

}