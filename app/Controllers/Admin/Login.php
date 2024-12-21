<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;


class Login extends BaseController
{
    protected $login;

    public function __construct()
    {
        $this->login = new AdminModel();
        helper(['form','url']);
    }
    
    public function login()
    {
        return view('admin/produk/login');
    }
    public function cek()
    {
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required'
        ];

        $pesan = [
            'email' =>[
                'required'=>'Email Tidak Boleh Kosong',
                'valid_email'=>'Format Email Salah'
            ],
            'password' =>[
                'required'=>'Password Tidak Boleh Kosong',
            ],
        ];
        if (!$this->validate($rules, $pesan)) {
            $data['validation']=$this->validator;
            return view('admin/produk/login',$data);
        }
        $email=$this->request->getVar('email');
        $password=$this->request->getVar('password');
        $dataLogin = $this->login->where(['email' => $email])->first();
        if ($dataLogin) {
            if (password_verify($password, $dataLogin->password)) {
                session()->set([
                    'id_admin' => $dataLogin->id_admin,
                    'logged_in' => true,
                    'nama' => $dataLogin->nama
                ]);
                return redirect()->to('wisata');
            } else {
                session()->setFlashdata('error', 'Password Masih Salah');
                return redirect()->to('login');
            }
        } else {
            session()->setFlashdata('error', 'Email Tidak Ditemukan');
            return redirect()->to('login');
        }

    }
    public function keluar()
    {
        session()->destroy();

        return redirect('home');
    }

}
