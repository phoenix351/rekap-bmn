<?php

namespace App\Controllers;

use Exception;
use PhpParser\Node\Expr\FuncCall;

class Item extends BaseController
{
    function __construct()
    {
        $this->item = model('App\Models\ItemModel', false);
        $this->user_builder =   \Config\Database::connect()->table('pengguna');
        $this->request = \Config\Services::request();
    }
    
    public function format_rupiah($num)
{
    $ret = '<td><div class="d-flex justify-content-between"><span>Rp</span><span>'.number_format($num, 2, ",", ".").'</span></div></td>';
    return $ret;
}
    public function index()
    {
       
        $items = $this->item->findAll();
        $this->user_builder->select('nama,id,jabatan,tipe_akun');
        $users = $this->user_builder->get();
        $item_user = $this->item->join('pengguna', 'item.pengguna_id = pengguna.id', 'left')
        ->join('master_jenis_anggaran','item.id_jenis = master_jenis_anggaran.id',"left")
        ->select('item.id as id, jabatan, identitas, jenis_id,pengguna_id,pengguna.nama,master_jenis_anggaran.jenis as jenis')->get();

        $data= [
            'parent_page' => 'Item',
            'page' => 'item',
            'items'=>$items,
            'users'=>$users->getResultArray()
            ,'item_users'=> $item_user->getResultArray()
        ];
        return view('Pages/item',$data);
    }

    public function get_user_by_id(){

        $id = $this->request->getGet('id');
        $this->user_builder->select('id,nama,jabatan')->where('id',$id);
        $user = $this->user_builder->get();
        $data= $user->getResultArray()[0];
        return $this->response->setJSON($data);
    }

    public function get_item_by_id(){

        $id = $this->request->getGet('id');

        if (strlen($id)>0) {
            $item_user = $this->user_builder->join('item', 'item.pengguna_id = pengguna.id', 'right')->select('item.id as id, jenis, jabatan, identitas, jenis_id,pengguna_id,nama')->where('item.id',$id)->get();
            
            $data= $item_user->getResultArray()[0];

            return $this->response->setJSON($data);

        }
        return $this->response->setStatusCode(204)->setBody('No Content');

    }

    public function get_item_by_userid(){
        $user_id = $this->request->getGet('user_id');

        if (strlen($user_id)>0) {
            $item_user = $this->item->select('id,pengguna_id,identitas,jenis')->where('pengguna_id',$user_id)->get();
            $data= $item_user->getResultArray();
            
            return $this->response->setJSON($data);
        }
        return $this->response->setStatusCode(204)->setBody('No Content');
    }

    public function update()
    {
        $item_id = $this->request->getPost('item_id_update');

        $data = [
            'pengguna_id' => $this->request->getPost('pemegang_update'),
            'id_jenis' => $this->request->getPost('jenis_update'),
            'jenis_id' => $this->request->getPost('jenis_id_update'),
            'identitas' => strtoupper($this->request->getPost('identitas_update')),
            
        ];
    
         $hasil = $this->item->update($item_id,$data);
        // // print_r($data);
        return redirect()->route('item');
    }

    public function insert() 
    {
        
        $data = [
            'pengguna_id' => $this->request->getPost('pemegang'),
            'jabatan' => $this->request->getPost('jabatan'),
            // 'jenis' => $this->request->getPost('jenis'),
            'jenis_id' => $this->request->getPost('jenis_id'),
            'id_jenis'=>$this->request->getPost('jenis'),
            'identitas' => strtoupper($this->request->getPost('identitas')),
            
        ];

        $hasil = $this->item->insert($data);
        // print_r($data);
        return redirect()->route('item');
    }

    public function delete() {
        $id_delete = $this->request->getPost('id');
        if (strlen($id_delete)>0) {
            $this->item->delete($id_delete);
            return $this->response->setStatusCode(204)->setBody('Content deleted');

        }
        return $this->response->setStatusCode(204)->setBody('No Content');

    }
}