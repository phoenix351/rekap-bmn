<?php

namespace App\Controllers;

class Anggaran extends BaseController
{
    function __construct()
    {
        $this->anggaran = model('App\Models\AnggaranModel', false);
        $this->item_builder =   \Config\Database::connect()->table('item');

    
    }
    
    public function index()
    {
        $this->item_builder->join('master_jenis_anggaran','item.id_jenis = master_jenis_anggaran.id','right')->select('item.id,master_jenis_anggaran.jenis,identitas');
        $items = $this->item_builder->get();
        $item_anggaran = $this->anggaran->join('item', 'item.id = anggaran.item_id', 'left')
        ->join('master_jenis_anggaran','item.id_jenis = master_jenis_anggaran.id','left')
        ->select('anggaran.id as anggaran_id,item.id as id,item.identitas,master_jenis_anggaran.jenis, tahun, anggaran.pagu_anggaran,pagu_realisasi')->get();

        $data= [
            'parent_page' => 'Anggaran',
            'page' => 'Kelola Anggaran',
            'items'=> $items->getResultArray(),
            'item_anggaran'=> $item_anggaran->getResultArray()
        ];
        return view('Pages/anggaran',$data);
        
    }

    
    public function insert() 
    {
        
        $data = [
            'id' => $this->request->getPost('id'),
            'item_id'=>$this->request->getPost('item'),
            'tahun' => $this->request->getPost('tahun'),
            'pagu_anggaran' => filter_var($this->request->getPost('pagu_anggaran'),FILTER_SANITIZE_NUMBER_INT),
            
        ];

        $hasil = $this->anggaran->insert($data);
        // print_r($data);
        return redirect()->route('anggaran');
    }


    public function get_anggaran_by_id(){

        $id = $this->request->getGet('id');

        if (strlen($id)>0) {
            $item_anggaran = $this->item_builder->join('anggaran', 'anggaran.item_id = item.id', 'right')->select('item.id as id, anggaran.id as anggaran_id,item.jenis as jenis, item.identitas as identitas, tahun, pagu_anggaran, pagu_realisasi')->where('item.id',$id)->get();
            
            $data= $item_anggaran->getResultArray()[0];

            return $this->response->setJSON($data);

        }
        return $this->response->setStatusCode(204)->setBody('No Content');

    }

    public function get_anggaran_by_itemid(){
        $item_id = $this->request->getGet('item_id');

        if(strlen($item_id)>0){
            $anggaran_get = $this->anggaran->select('id,item_id,tahun')->where('item_id',$item_id)->get();
            $data = $anggaran_get->getResultArray();
            return $this->response->setJSON($data);
        }
        return $this->response->setStatusCode(204)->setBody(('No Content'));


    }

    public function get_anggaran_by_item_and_tahun()
    {
        $item_id = $this->request->getGet('item_id');
        $tahun = $this->request->getGet('tahun');
        if (strlen($item_id)>0 && strlen($tahun)>0) 
        {
           $data = $this->anggaran->select('id,pagu_anggaran,pagu_realisasi')->where(['item_id'=>$item_id,'tahun'=>$tahun])->findAll();
            return $this->response->setJSON($data[0]);
        }
        return $this->response->setStatusCode(204)->setBody('No Content');
    }

    public function update()
    {
        $anggaran = $this->request->getPost('id_anggaran_update');

        $data = [
            'tahun' => $this->request->getPost('tahun_update'),
            'pagu_anggaran' => filter_var($this->request->getPost('pagu_anggaran_update'),FILTER_SANITIZE_NUMBER_INT),
            
        ];
    
         $hasil = $this->anggaran->update($anggaran,$data);
        // // print_r($data);
        return redirect()->route('anggaran');
    }

    public function delete() {

        $id_delete = $this->request->getPost('id');
        if (strlen($id_delete)>0) {
            $this->anggaran->delete($id_delete);
            return $this->response->setStatusCode(204)->setBody('Content deleted');

        }
        return $this->response->setStatusCode(204)->setBody('No Content');

    }
    public function generate() { 
        $tahun_generate = $this->request->getPost('tahun');
        // $tahun_generate = $this->request->getGet('tahun');


        if (strlen($tahun_generate)>3) {
            
            $item_list = $this->item_builder->join('master_jenis_anggaran','master_jenis_anggaran.id = item.id_jenis','right')->
            select('item.id as item_id, master_jenis_anggaran.jenis as jenis,master_jenis_anggaran.pagu_anggaran as pagu_anggaran')->get();
            
            $item_insert = [];

            foreach($item_list->getResultArray() as $item){
                $item['tahun']= $tahun_generate;
                array_push($item_insert,$item);
            }


            $this->anggaran->insertBatch($item_insert);
            // $data = [
            //     'id' => $this->request->getPost('id'),
            //     'item_id'=>$this->request->getPost('item'),
            //     'tahun' => $this->request->getPost('tahun'),
            //     'pagu_anggaran' => filter_var($this->request->getPost('pagu_anggaran'),FILTER_SANITIZE_NUMBER_INT),
                
            // ];
            return $this->response->setJSON([
                'message'=>'successfully generated',
                'tahun'=>$tahun_generate,
                'data'=>$item_insert
            ]);
        }
        return $this->response->setStatusCode(204)->setBody('No Content');
    }

}