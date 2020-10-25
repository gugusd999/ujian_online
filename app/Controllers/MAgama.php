<?php

namespace App\Controllers;



class MAgama extends BaseController
{

    protected $db;

    public function __construct(){
        $this->db = \Config\Database::connect();
    }

    function json(){
        // order
        $order = 'DESC';

        if (isset($_POST['order'])): $order = $_POST['order'][0]['dir'] ; else: $setorder = ''; endif;

        // pencarian
        $pencarian = "";
   		if (isset($_POST['search']['value'])) {
   			$pencarian = $_POST['search']['value'];
   		}

        // limit set   
        $start = $_POST['start'];
        $end = $_POST['length'];
    
        // draw
        $draw = $_POST['draw'];

        // query prosses
        
        
        $qr = $this->db->query("
            SELECT 
                * 
            FROM
                mAgama
            WHERE 
                kode LIKE '%$pencarian%'
                    OR
                nama LIKE '%$pencarian%'
            ORDER BY
                kode $order
            LIMIT
                $start , $end
        ");
        
        $arr = [];

        $dataArr = $qr->getResultObject();

        $dataTotal = count($qr->getResultObject());

		foreach($dataArr as $key => $value){
            
            $child = [];
            $child[] = $value->kode;
            $child[] = $value->nama;
            $child[] = "
                <button data-id='".$value->kode."' modal-open-delete class='btn btn-sm btn-danger'>Delete</button>
            ";
            $arr[] = $child;
        }
        
        $r = array(
            "draw"            => $draw,
            "recordsTotal"    => intval( $dataTotal ),
            "recordsFiltered" => intval( $dataTotal ),
            "data"            => $arr,
        );

        echo json_encode($r);

    }

    public function Index($edit = "")
    {
        if(isset($_POST['edit'])){

            $data = $_POST['edit'];

            unset($_POST['edit']);

            $this->db->query("UPDATE mAgama SET nama = '".$data['nama']."' WHERE kode = '".$data['kode']."' ");

            $data['success'] = 'data telah disimpan';

        }
        if(isset($_POST['data'])){

            $data = $_POST['data'];

            unset($_POST['data']);

            $this->db->query("INSERT INTO mAgama (kode, nama) VALUE('".$data['kode']."', '".$data['nama']."') ");

            $data['success'] = 'data telah disimpan';

        }
        if ($edit != "") {
            $data['edit'] = $this->db->query("SELECT * FROM mAgama WHERE kode = '$edit' ")->getRow();

            $data['agama'] = $this->db->query("SELECT * FROM mAgama LIMIT 0, 5")->getResultObject();
            return view('mAgama/index', $data);
        }else{
            $data['agama'] = $this->db->query("SELECT * FROM mAgama LIMIT 0, 5")->getResultObject();
            return view('mAgama/index', $data);
        }
    }
    
    public function formUpdate()
    {
        return view('mAgama/update');
    }

    public function hapus()
    {
        $kode = $_POST['kode'];
        $this->db->query("DELETE FROM mAgama WHERE kode = '$kode' ");
        return redirect()->to('/m-agama');
    }

}