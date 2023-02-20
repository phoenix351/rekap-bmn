<?php

namespace App\Controllers;

class Klaim extends BaseController
{
    function __construct()
    {
        $this->claim = model('App\Models\KlaimModel', false);
        $this->item_builder =   \Config\Database::connect()->table('item');
        $this->anggaran = model('App\Models\AnggaranModel', false);

        $this->item = model('App\Models\ItemModel', false);
        $this->user = model('App\Models\PenggunaModel',false);
        
        $this->user_builder =   \Config\Database::connect()->table('pengguna');
        $this->klaim_builder =   \Config\Database::connect()->table('klaim');

        $this->request = \Config\Services::request();


    
    }
    
    public function index()
    {
        $claims = $this->claim->findAll();
        // $item_klaim = $this->item_builder->join('klaim', 'item.id = klaim.item_id', 'right')->select('anggaran.id as anggaran_id,item.id as id,item.identitas,item.jenis, tahun, pagu_anggaran,pagu_realisasi')->get();
       $items = $this->item_builder->select('id,identitas')->get();
        $data= [
            'parent_page' => 'Item',
            'page' => 'klaim',
            'claims'=>$claims,
            'items'=> $items->getResultArray()
        ];
        
        
        return view('Pages/klaim',$data);
    }

    public function surat_pengantar()
    {
        $this->user_builder->select('nama,id,jabatan,tipe_akun');
        $users = $this->user_builder->orderBy('nama ASC')->get();
        
        $data= [
            'parent_page' => 'Item',
            'page' => 'Surat Pengantar',
            'users'=>$users->getResultArray()
        ];
        return view('Pages/surat_pengantar',$data);
    }

    public function summary_cetak()
    {
        $item_id = $this->request->getGet('item_id');
        $pengguna_id = $this->request->getGet('pengguna_id');
        $tahun = $this->request->getGet('tahun');
        $bulan = $this->request->getGet('bulan');
        $where_klaim = [
            'item_id'=>$item_id,
            'MONTH(tanggal_nota)'=>$bulan,
            'YEAR(tanggal_nota)'=>$tahun, 
        ];

        $klaim = $this->klaim_builder->select('id,item_id,pertamax_harga,pertalite_harga,dexlite_harga,maintenance,ongkos_kerja,bea_materai,total_klaim')->where($where_klaim)->get();
        

        $pengguna = $this->user->where('id',$pengguna_id)->get();
        $item = $this->item->select('identitas,jenis')->where('id',$item_id)->get();

        $data= [
            'user' => $pengguna->getResultArray()[0],
            'klaim'=> $klaim->getResultArray(),
            'item'=>$item->getResultArray()[0],
            'tahun'=>$tahun,
            'bulan'=>$bulan

        ];
        return $this->response->setJSON(($data));
    }
   public function cetak_surat_pengantar()
   {
        setlocale(LC_TIME, 'id_ID.UTF-8');                                              
        $monthName = strftime('%B', mktime(0, 0, 0, (int)$this->request->getGet('bulan_cetak')));
        $dateName = date('d M Y',strtotime($this->request->getGet('tanggal_surat')));

        $jumlah_bbm = number_format((int)$this->request->getGet('klaim_bbm'), 2, ",", ".");
        $jumlah_sparepart = number_format((int)$this->request->getGet('klaim_sparepart'),2,",",".");
        $jumlah_jasa = number_format((int)$this->request->getGet('klaim_jasa'),2,",",".");
        $jumlah_total = number_format((int)$this->request->getGet('klaim_total'),2,",",".");

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('template/template_klaim.docx');
        $data = [
            'nama_pemegang' => $this->request->getGet('nama_pemegang'),
            'jabatan' => $this->request->getGet('jabatan'),
            'identitas' => $this->request->getGet('identitas'),
            'bulan_cetak' => $monthName,
            'jumlah_bbm' => $jumlah_bbm,
            'tahun_cetak' => $this->request->getGet('tahun_cetak'),

            'jumlah_sparepart' => $jumlah_sparepart,
            'jumlah_jasa' => $jumlah_jasa,
            'jumlah_total' => $jumlah_total,
            'tanggal_surat' => $dateName,
            'jenis_bmn' => $this->request->getGet('jenis'),

            
        ];
        print_r($data);
        $templateProcessor->setValues($data);
        $nama = preg_replace("/[^a-zA-Z0-9]+/", "", $this->request->getGet('nama_pemegang'));
        $fileName = $this->request->getGet('tanggal_surat')."_".$nama."_".$this->request->getGet('identitas').'.docx';

        $templateProcessor->saveAs($fileName);
        header("Content-Type: application/msword");
        header("Content-Disposition: attachment; filename=".$fileName."");
        header("Content-Length: " . filesize($fileName));
        header("Content-Transfer-Encoding: binary");
        
        readfile($fileName);

   }

    public function get_item_by_id(){

        $id = $this->request->getGet('id');
        
        $item_anggaran = $this->anggaran->select('id,item_id,tahun')->where('item_id',$id)->findAll();
        
        if (strlen($id)>0) {
            $item_user = $this->item_builder->join('master_jenis_anggaran','master_jenis_anggaran.id = item.jenis_id','left')->select('item.id, jenis, identitas,')->where('item.id',$id)->get();
            
            $data= [
                'item_user'=>$item_user->getResultArray()[0],
                'anggaran'=>$item_anggaran,
            ];

            return $this->response->setJSON($data);

        }
        return $this->response->setStatusCode(204)->setBody('No Content');

    }

    public function insert() {
        // update anggaran

        $anggaran = $this->request->getPost('id_anggaran');
        $pagu_realisasi = (int) filter_var($this->request->getPost('pagu_anggaran'),FILTER_SANITIZE_NUMBER_INT) - (int)filter_var($this->request->getPost('pagu_sisa_after'),FILTER_SANITIZE_NUMBER_INT);

        $data = [
            'pagu_realisasi' => $pagu_realisasi
            
        ];
    
         $hasil_anggaran = $this->anggaran->update($anggaran,$data);
        //handle error

        
        $data = [
            
            'item_id'=>$this->request->getPost('item'),
            'tanggal_nota' => $this->request->getPost('tanggal'),
            'pertamax_harga' => filter_var($this->request->getPost('pertamax_harga'),FILTER_SANITIZE_NUMBER_INT),
            'pertalite_harga' => filter_var($this->request->getPost('pertalite_harga'),FILTER_SANITIZE_NUMBER_INT),
            'dexlite_harga' => filter_var($this->request->getPost('dexlite_harga'),FILTER_SANITIZE_NUMBER_INT),
           
            'pertamax_volume' => $this->request->getPost('pertamax_volume'),
            'pertalite_volume' => $this->request->getPost('pertalite_volume'),
            'dexlite_volume' => $this->request->getPost('dexlite_volume'),
            
            'maintenance' => filter_var($this->request->getPost('maintenance'),FILTER_SANITIZE_NUMBER_INT),
            'ongkos_kerja' => filter_var($this->request->getPost('ongkos_kerja'),FILTER_SANITIZE_NUMBER_INT),
            'bea_materai' => filter_var($this->request->getPost('bea_materai'),FILTER_SANITIZE_NUMBER_INT),
            'total_klaim' => filter_var($this->request->getPost('total_klaim'),FILTER_SANITIZE_NUMBER_INT),


        ];

        // insert klaim

        $hasil = $this->claim->insert($data);
        // print_r($data);
        return redirect()->route('klaim');
    }
   
}