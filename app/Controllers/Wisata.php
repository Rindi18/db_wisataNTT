<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesanModel;
use App\Models\WisataModel;
use CodeIgniter\HTTP\ResponseInterface;

class Wisata extends BaseController
{
    protected $wisata;
    protected $pesan;
    public function __construct()
    {
        $this->pesan = new PesanModel();
        $this->wisata = new WisataModel();
        helper(['form','url']);
    }
    public function index()
    {
        $data['wisata'] = $this->wisata->findAll();
        return view('wisata2/index', $data);
    }
    public function pesan($id)
    {
        if(session()->get('logged_in')==true){
            $data['wisata']=$this->wisata->where(['id_wisata'=>$id])->first();
            return view('wisata2/pesan', $data);
        }else {
            return redirect()->to('login2');
        }
    }
    public function proses()
    {
        $harga = $this->request->getVar('harga');
        $id = $this->request->getVar('id');
        $rules = [
            'anak' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Pengunjung Anak-Anak Harus Diisi',
                    'numeric' => 'Jumlah Pengunjung Harus Angka'
                ]
            ],
            'dewasa' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Pengunjung Dewasa Harus Diisi',
                    'numeric' => 'Jumlah Pengunjung Harus Angka'
                ]

            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Harus Diisi',
                ]

            ]

        ];
        if(!$this->validate($rules)){
            $data['wisata']=$this->wisata->where(['id_wisata'=>$id])->first();
            $data['validation'] = $this->validator->getErrors(); 
            return view('wisata2/pesan', $data);       
        }
        $anak = $this->request->getVar('anak');
        $dewasa = $this->request->getVar('dewasa');
        $tanggal = $this->request->getVar('tanggal');

        $hanak = $anak = ($harga / 2);
        $hdewasa = $dewasa*$harga;
        $total = $hanak + $hdewasa;

        \Midtrans\Config::$serverKey ='SB-Mid-server-MsIIlR2pTgS3yyP0suggbuM2';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
        $id_pesanan=time();
        $nama=session()->get('nama');
        $email=session()->get('email');

        $parrams = array(
            'transaction_details' => array(
                'order_id' => $id_pesanan,
                'gross_amount' => $total,

            ),
            'customer_details' => array(
                'first_name' =>$nama,
                'last_name' =>'',
                'email' => $email,
                'phone' => '',
            ),

        );
        $snapToken = \Midtrans\Snap::getSnapToken($parrams);

        $data=[
            'id_pesanan'=>$id_pesanan,
            'id'=>session()->get('id_users'),
            'id_wisata'=>$id,
            'qty_anak' =>$anak,
            'qty_dewasa' =>$dewasa,
            'total'=>$total,
            'tgl_datang'=>$tanggal,
            'snap'=>$snapToken
        ];
        $this->pesan->save($data);

        session()->setFlashdata('success', 'Berhasil Pesan Tiket Wisata');
        return redirect()->to('wisata2/bayar');
    }
    public function bayar()
    {
        $data['pesan'] = $this->pesan
        ->join('wisata','wisata.id_wisata = pesanan_layanan.id_wisata')
        ->where(['id'=>session()->get('id_users')])->findAll();
        return view('wisata2/bayar', $data);
    }
    public function cek($id)
    {
        $token = base64_encode('SB-Mid-server-MsIIlR2pTgS3yyP0suggbuM2' . ':');
        $url = "https://api.sandbox.midtrans.com/v2/" . $id . "/status";
        $header = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Basic ' . $token  
        );
        
        $verb='GET';
        $ch=curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $verb);
        curl_setopt($ch, CURLOPT_POSTFIELDS, null);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($ch);
        $hasil = json_decode($result, true);
        if ($hasil['status_code'] != '404'){
            $status= $hasil['transaction_status'];
            $this->pesan->save(['id_pesanan' => $id, 'status' => $status]);
        }
        

        return redirect()->to('wisata2/bayar');
        // if($hasil['status_code']==200){
        //    $status="Sudah Bayar";
        // }elseif($hasil['status_code']==201){
        //    $status="Tagihan Belum Dibayar";
        // }elseif($hasil['status_code']==401){
        //    $status="Tagihan Belum Dibuat";
        // }
    }
}
