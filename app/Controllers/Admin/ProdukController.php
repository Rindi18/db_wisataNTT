<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;




class ProdukController extends BaseController
{
    public function index()
    {
        $data = [
            'title'=> 'Daftar Produk',
            'daftar_kategori' => $this->KategoriModel->findAll(),
        ];
        return view('admin/produk/index', $data);
    }

    //daftar kategori produk
    public function about()
    {
        $data = [
            'title'=> 'Daftar Produk',
            'daftar_kategori' => $this->KategoriModel->findAll(),
        ];
        return view('admin/produk/about', $data);
    }

    public function accommodation()
    {
        $data = [
            'title'=> 'Daftar Produk',
            'daftar_kategori' => $this->KategoriModel->findAll(),
        ];
        return view('admin/produk/accommodation', $data);
    }

    public function baju_adat()
    {
        $data = [
            'title'=> 'Daftar Produk',
            'daftar_kategori' => $this->KategoriModel->findAll(),
        ];
        return view('admin/produk/baju_adat', $data);
    }

    public function budaya()
    {
        $data = [
            'title'=> 'Daftar Produk',
            'daftar_kategori' => $this->KategoriModel->findAll(),
        ];
        return view('admin/produk/budaya', $data);
    }

    public function pemesanan()
    {
        
        $data = [
             'title'=> 'Daftar Produk',
             'daftar_kategori' => $this->KategoriModel->findAll(),
        ];
        
        return view('admin/produk/pemesanan', $data);
    }
    public function home()
    {
        $data['wisata'] = $this->wisata->limit(3)->findAll();
        return view('home', $data);
    }
    public function wisata()
    {
        if (session()->get('logged_in') == true){
        $data = [
            'title'=> 'Daftar Produk',
            'wisata' => $this->wisata->findAll(),
        ];
        return view('admin/produk/wisata', $data);
     } else {
        return redirect()->to('login');
        }
    }

    public function add()
    {
        if (session()->get('logged_in') == true){
        
        return view('admin/produk/add');
        }else {
            return redirect()->to('login');
            }
    }

    public function save(){
        if (session()->get('logged_in') == true){
        $rules = [
            'pic' => [
                'rules' => 'uploaded[pic]|mime_in[pic,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                'errors'=> [
                    'uploaded' => 'Belum Upload',
                    'mime_in' => 'Tipe File Ditolak'
                ]
                ],
            'nama'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Nama Tidak Boleh Kosong'
                ]        
                ],
                'des' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Deskripsi Tidak Boleh Kosong'
                    ]
                    ],
                    'harga' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Harga Tidak Boleh Kosong Tidak Boleh Kosong'
                        ]
                        ]

        ];
        if (!$this->validate($rules)) {
            $data['validation']=$this->validator->getErrors();
            return view('admin/produk/add',$data);
        }

        $nama = $this->request->getVar('nama');
        $des = $this->request->getVar('des');
        $harga = $this->request->getVar('harga');
        $foto = $this->request->getFile('pic');
        $foto->move(WRITEPATH . '../public/asset-admin');

        $data=[
            'nama_wisata'=>$nama,
            'deskripsi' =>$des,
            'harga'=>$harga,
            'foto'=>$foto->getClientName()
        ];
        $this->wisata->save($data);

        return redirect()->to('wisata');
        }
        else {
            return redirect()->to('login');
        }


    }
    public function edit($id){
        if (session()->get('logged_in') == true){
        $data['cari'] = $this->wisata->where(['id_wisata' => $id])->first();
        return view('admin/produk/edit', $data);
        }else {
            return redirect()->to('login');
        }
    }
    public function update(){
        if (session()->get('logged_in') == true){
        $id = $this->request->getVar('kode');
        $nama = $this->request->getVar('nama');
        $des = $this->request->getVar('des');
        $harga = $this->request->getVar('harga');
        $foto = $this->request->getFile('foto');
        $foto->move(WRITEPATH . '../public/asset-admin');

        $data=[
            'id_wisata' => $id,
            'nama_wisata'=>$nama,
            'deskripsi' =>$des,
            'harga'=>$harga,
            'foto'=>$foto->getClientName()
        ];
        $this->wisata->save($data);

        return redirect()->to('wisata');
        } else {
            return redirect()->to('login');
        }

    }
    public function delete($id){
        if (session()->get('logged_in') == true){

        $this->wisata->delete($id);

        return redirect()->to('wisata');
        }else {
            return redirect()->to('login');
        }
    }


    // Fungsi untuk Admin
    public function admin()
    {
        $data = [
            'title'=> 'Daftar Produk',
            'wisata' => $this->wisata->findAll(),
        ];
        return view('admin/produk/admin', $data);
    }

    // Fungsi untuk Member
    public function member()
    {
        $data = [
            'title'=> 'Daftar Produk',
            'daftar_kategori' => $this->wisata->findAll(),
        ];
        return view('admin/produk/member', $data);
    }

    // Fungsi untuk Order Tiket
    public function orderTiket()
    {
        $data = [
            'title'=> 'Daftar Produk',
            'daftar_kategori' => $this->wisata->findAll(),
        ];
        return view('admin/produk/order_tiket', $data);
    }

    // Fungsi untuk Laporan Tiket
    public function laporanTiket()
    {
        $data = [
            'title'=> 'Daftar Produk',
            'daftar_kategori' => $this->wisata->findAll(),
        ];
        return view('admin/produk/laporan_tiket', $data);
    }

    public function festival()
    {
        $data = [
            'title'=> 'Daftar Produk',
            'daftar_kategori' => $this->KategoriModel->findAll(),
        ];
        return view('admin/produk/festival', $data);
    }

    public function gallery()
    {
        $data = [
            'title'=> 'Daftar Produk',
            'daftar_kategori' => $this->KategoriModel->findAll(),
        ];
        return view('admin/produk/gallery', $data);
    }

    public function places()
    {
        $data = [
            'title'=> 'Daftar Produk',
            'daftar_kategori' => $this->KategoriModel->findAll(),
        ];
        return view('admin/produk/places', $data);
    }

    public function rumah_adat()
    {
        $data = [
            'title'=> 'Daftar Produk',
            'daftar_kategori' => $this->KategoriModel->findAll(),
        ];
        return view('admin/produk/rumah_adat', $data);
    }

    public function tari_tradisional()
    {
        $data = [
            'title'=> 'Daftar Produk',
            'daftar_kategori' => $this->KategoriModel->findAll(),
        ];
        return view('admin/produk/tari_tradisional', $data);
    }

    public function transportation()
    {
        $data = [
            'title'=> 'Daftar Produk',
            'daftar_kategori' => $this->KategoriModel->findAll(),
        ];
        return view('admin/produk/transportation', $data);
    }

    public function upacara()
    {
        $data = [
            'title'=> 'Daftar Produk',
            'daftar_kategori' => $this->KategoriModel->findAll(),
        ];
        return view('admin/produk/upacara', $data);
    }
}
