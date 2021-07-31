<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Visin extends CI_Controller {
	public function index()
	{
        $dataUrl=base_url('assets/perpus.json');
        $dataStringJson=file_get_contents($dataUrl);
        $dataJson=json_decode($dataStringJson);
        $data=$dataJson;     
        $output['buku']=$this->data_perpus($data);
                
        $this->load->view('visin',$output);        
    }
    function data_perpus($data)
    {
        $result=[['Kecamatan','Desa','Jumlah']];
        foreach($data as $row)
        {
			$data_perpus=[$row->kecamatan,(int)$row->desa, (int)$row->jumlah];
			array_push($result,$data_perpus);
		}
		return json_encode($result);
    }
	
}
