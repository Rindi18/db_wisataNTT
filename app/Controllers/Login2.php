<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Google_Client;
class Login2 extends BaseController
{
    protected $users;
    protected $googleclient;
    public function __construct()
    {
        $this->users = new UserModel;
        helper(['form','url']);

        $this->googleclient=new Google_Client();
        $this->googleclient->setClientId('383754205727-5a3hcla5jc3r6a17kor9ad7uop93k6it.apps.googleusercontent.com');
        $this->googleclient->setClientSecret('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');
        $this->googleclient->setRedirectUri('http://localhost:8080/login2/masuk');
        $this->googleclient->addScope('email');
        $this->googleclient->addScope('profile');
    }
    public function index()
    {
        $data['link'] = $this->googleclient->createAuthUrl();
        return view('login2/index', $data);
    }
    public function register()
    {
        return view('register/index');
    }
    public function save()
    {
        $rules = [
            'nama' => [
                'rules' => 'required',
                'errors' =>[
                    'required' => 'Nama Lengkap Tidak Boleh Kosong'
                ]
            ],
            'kelamin' => [
                'rules' => 'required',
                'errors' =>[
                    'required' => 'Jenis Kelamin Tidak Boleh Kosong'
                ]
            ],
            'ponsel' => [
                'rules' => 'required',
                'errors' =>[
                    'required' => 'Nomor Handphone Tidak Boleh Kosong',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' =>[
                    'required' => 'Email Tidak Boleh Kosong',
                    'valid_email' => 'Format Email Belum Benar'
                ]
            ],
            'password' => [
                'rules' =>'required',
                'errors' => [
                    'required' => 'Password Tidak Boleh Kosong'
                ]
            ]        

        ];
        if (!$this->validate($rules)) {
            $data['validation']=$this->validator->getErrors();
            return view('register/index', $data);
        }
        $nama=$this->request->getVar('nama');
        $kelamin=$this->request->getVar('kelamin');
        $email=$this->request->getVar('email');
        $ponsel=$this->request->getVar('ponsel');
        $password=password_hash($this->request->getVar('password'), PASSWORD_BCRYPT);
        $data = [
            'id' => time(),
            'nama_users' => $nama,
            'kelamin' =>$kelamin,
            'email' => $email,
            'ponsel' => $ponsel,
            'password' => $password,
        ];
        $this->users->save($data);
        session()->setFlashdata('success', 'Berhasil Daftar Akun !');
        return redirect()->to('login2');
    }
    public function proses()
    {
        $rules = [
            'email' => [
                'rules' => 'required|valid_email',
                'errors' =>[
                    'required' => 'Email Tidak Boleh Kosong',
                    'valid_email' => 'Format Email Belum Benar'
                ]
            ],
            'password' => [
                'rules' =>'required',
                'errors' => [
                    'required' => 'Password Tidak Boleh Kosong'
                ]
            ]   

        ];
        if (!$this->validate($rules)) {
            $data['validation']=$this->validator->getErrors();
            return view('login2/index', $data);
        }
        $email=$this->request->getVar('email');
        $password=$this->request->getVar('password');

        $login2 = $this->users->where(['email' => $email])->first();
        if ($login2) {
            if (password_verify($password, $login2->password)){
                session()->set([
                    'id_users' =>$login2->id,
                    'nama' =>$login2->nama_users,
                    'email' => $login2->email,
                    'logged_in' =>true
                    ]);
                    return redirect()->to(base_url('home'));

            } else {
                session()->setFlashdata('error', 'Password Masih Salah!');
                return redirect()->to('login2');
            }

        } else {
            session()->setFlashdata('error', 'Email Tidak Ditemukan');
            return redirect()->to('login2');
        }
    }
    public function keluar()
    {
    session()->destroy();
    return redirect()->to(base_url('home'));
    }
    public function masuk()
    {
        $token = $this->googleclient->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
        if(!isset($token['error'])){
            $this->googleclient->setAccessToken($token['access_token']);
            $googleservice = new \Google_Service_Oauth2($this->googleclient);
            $isi = $googleservice->userinfo->get();

            $row=[
                'id'=>$isi['id'],
                'nama_users'=>$isi['name'],
                'kelamin'=>NULL,
                'email'=>$isi['email'],
                'ponsel'=>NULL,
                'password'=>NULL,
            ];
            $this->users->save($row);
            session()->set([
                'id_users'=>$isi['id'],
                'nama'=>$isi['name'],
                'email' => $isi['email'],
                'logged_in' =>true
                ]);
                return redirect()->to(base_url('home'));
        }
    }
}
