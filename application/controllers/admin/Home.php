<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __Construct()
	{
		parent::__Construct();
		$this->load->model('DashboardModel');
	}

	public function index()
	{
		if($this->session->userdata('authenticated')){
			if($this->session->userdata('akses') == 'admin'){
                $data = array(
                    'title' => 'Admin - HOME',
                    'content' => 'admin/home',
					'laporan_tahunan' => $this->DashboardModel->laporan_tahunan(),
					'laporan_tahunan_lalu' => $this->DashboardModel->laporan_tahunan_lalu(),
					'laporan_bulanan' => $this->DashboardModel->laporan_bulanan(),
					'laporan_bulanan_lalu' => $this->DashboardModel->laporan_bulanan_lalu(),
					'produk_terlaris_bulan' => $this->DashboardModel->produk_terlaris_bulan(),
					'produk_terlaris_hari' => $this->DashboardModel->produk_terlaris_hari(),
					'penghasilan_bulan' => $this->DashboardModel->penghasilan_bulan(),
					'penghasilan_hari' => $this->DashboardModel->penghasilan_hari()
                );
				$this->load->view('admin/template', $data);
			} else{
				$data['title'] = 'AKSES!!!';
				$this->load->view('c_error/akses', $data);
			}
		} else{
			$data['title'] = 'LOGIN!!!';
			$this->load->view('c_error/login', $data);  
		}
	}
}
