<?php

namespace App\Controllers;
require_once(ROOTPATH.'vendor/autoload.php');

class Rekap extends BaseController
{
    function __construct()
    {
        $this->item = model('App\Models\ItemModel', false);
        $this->user = model('App\Models\PenggunaModel',false);
        
        $this->user_builder =   \Config\Database::connect()->table('pengguna');
        $this->klaim_builder =   \Config\Database::connect()->table('klaim');

        $this->request = \Config\Services::request();

    }
    public function index()
    {
        $this->user_builder->select('nama,id,jabatan,tipe_akun');
        $users = $this->user_builder->orderBy('nama ASC')->get();
        
        $data= [
            'parent_page' => 'Item',
            'page' => 'Rekap',
            'users'=>$users->getResultArray()
        ];
        return view('Pages/rekap',$data);
    }

    public function get_rekap_tahun()
    {
        $tahun = $this->request->getGet('tahun');
        
       
       
        

        if(strlen($tahun)>3) {
            //looping bulan in tahun
            $klaim = $this->klaim_builder->select('MONTH(tanggal_nota) as bulan_no,sum(pertamax_harga) as pertamax,sum(pertamax_volume) as pertamax_volume,sum(pertalite_harga) as pertalite,
            sum(pertalite_volume) as pertalite_volume,sum(dexlite_harga) as dexlite,sum(dexlite_volume) as dexlite_volume,sum(maintenance) as maintenance,sum(ongkos_kerja) as ongkos_kerja,sum(bea_materai) as bea_materai,sum(total_klaim) as total')->where('YEAR(tanggal_nota)',$tahun)->groupBy('bulan_no')->get();
        
            return $this->response->setJSON($klaim->getResultArray());
        } 
        return $this->response->setStatusCode(204)->setBody('No Content');
    }
    public function get_rekap_tahun_item()
    {
        $tahun = $this->request->getGet('tahun');
        $item_id = $this->request->getGet('item_id');
        
        if(strlen($tahun)>3) {
            //looping bulan in tahun
            $klaim = $this->klaim_builder->select('MONTH(tanggal_nota) as bulan_no,sum(pertamax_harga) as pertamax,sum(pertamax_volume) as pertamax_volume,sum(pertalite_harga) as pertalite,
            sum(pertalite_volume) as pertalite_volume,sum(dexlite_harga) as dexlite,sum(dexlite_volume) as dexlite_volume,sum(maintenance) as maintenance,sum(ongkos_kerja) as ongkos_kerja,sum(bea_materai) as bea_materai,sum(total_klaim) as total')->where(['YEAR(tanggal_nota)'=>$tahun,'item_id'=>$item_id])->groupBy('bulan_no')->get();
        
            return $this->response->setJSON($klaim->getResultArray());
        } 
        return $this->response->setStatusCode(204)->setBody('No Content');
    }

//    


}