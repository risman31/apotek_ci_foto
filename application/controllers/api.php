<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	function __construct(){
	parent::__construct();
	$this->load->model('MApotek');
	}

	public function index()
	{
        $status = array(
                'status' => 'Ok'
        );
		echo json_encode($status);
    }

    public function GetDataObat()
    {
        $query = $this->MApotek->GetData('obat')->result();
        echo json_encode($query);
    }

    public function GetDataSupplier()
    {
        $query = $this->MApotek->GetData('supplier')->result();
        echo json_encode($query);
    }

    public function GetDataTransaksi()
    {
        $query = $this->MApotek->GetData('transaksi')->result();
        echo json_encode($query);
    }

    public function GetDataAdmin()
    {
        $username = urldecode($this->uri->segment(3));
        $query = $this->MApotek->GetData('admin')->result();
        if($query) {
            redirect('Api');
        }
        echo json_encode($query);
    }
    public function CekLogin()
    {
        $username = urldecode($this->uri->segment(3));
        $password = urldecode($this->uri->segment(3));
        $query = $this->MApotek->GetData('admin', 'username', $username)->result();
        if($query) {
            redirect('Api');
        } else {
            $status = array(
                'status' => 'Error'
        );
        }
        echo json_encode($status);
    }
}
