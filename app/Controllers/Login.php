<?php

namespace App\Controllers;

use App\Models\PenggunaModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Login extends BaseController
{
    public function __construct() {
        $this->pengguna = new PenggunaModel();
    }
    
    public function index()
    {
        helper(['form']);
        return view('login/login');
    } 
 
    public function auth()
    {   
        $session = session();

        $validation =  \Config\Services::validation();
		$validation->setRules(['username' => 'required']);
		$validation->setRules(['password' => 'required']);
		$isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $this->pengguna->join('role', 'role.id_role = pengguna.role');
            $data = $this->pengguna->where([
                'username' => $username
            ])->first();

            $pengecekan_password = $this->pengguna->where([
                'password' => md5($password),
            ])->first();
            
            if (($data) OR ($pengecekan_password)) {
                if ($data) {
                    if ((md5($password)) == $data['password']) {
                        $data_session = [
                            'id_pengguna'   => $data['id_pengguna'],
                            'username'      => $data['username'],
                            'nama'          => $data['nama_pengguna'],
                            'email'         => $data['email'],
                            'role'          => $data['role'],
                            'deskripsi'     => $data['deskripsi'],
                            'logged_in'     => TRUE
                        ];

                        $session->set($data_session);
                        
                        echo 'sukses';
                    } else {
                        echo 'password_salah';
                    }
                } else {
                    echo 'username_tidak_terdaftar';  
                }
            } else {
                echo 'username_password_tidak_terdaftar';
            }
        } else {
			echo 'gagal';
		}   
    }


    // ===========================================================================
	// LUPA PASSWORD
    // ===========================================================================

	public function lupa_password()
	{
        return view('login/lupa_password');
	}

	public function auth_lupa_password()
    {		
		$email_smtp = \Config\Services::email();
        $validation =  \Config\Services::validation();
		$validation->setRules(['username' => 'required']);
		$isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $username = $this->request->getPost('username');

            $data = $this->pengguna->where([
                'username' => $username
            ])->first();
            
            if ($data) {
                $email = $data['email'];
                $nama_pengguna = $data['nama_pengguna'];
                $token = md5((uniqid().$data["username"]).'aqiva');

                $this->pengguna->update($data['id_pengguna'], [
                    "token" => $token,
                ]);

                $mail = new PHPMailer(true);         
               
                $mail->SMTPDebug = 0;                                
                $mail->isSMTP();                                    
                $mail->Host = 'smtp.gmail.com';  
                $mail->SMTPAuth = true;                               
                $mail->Username = 'inventarisbbpplembang@gmail.com';                
                $mail->Password = 'Jatnika2021';                       
                $mail->SMTPSecure = 'ssl';                         
                $mail->Port = 465;                                 

                $mail->setFrom('inventarisbbpplembang@gmail.com', 'Balai Besar Pelatihan Pertanian Lembang');
                $mail->addAddress($email, $nama_pengguna);  
                $mail->Subject = 'Silahkan Reset Akun Anda';
                $mail->Body    = 'Silahkan Klik Link Disini : ' . base_url("login/reset_password/".$token);

                if ($mail->send()) {
                    echo 'sukses';
                } else {
                    echo 'gagal_mengirim_email';
                }

                // $email_smtp->setFrom("irsyadnurdin.dev@gmail.com", "Wuling Motors");
                // $email_smtp->setTo($email);
                // $email_smtp->setSubject("Reset Password");

                // $data["username"] = $data["username"];
				// $data["token"] = $token;

				// $body = view('email/reset', $data);
                
                // $email_smtp->setMessage($body);
                // // $email_smtp->setMessage($token);

                // if ($email_smtp->send()) {
				// 	echo 'sukses';
				// } else {
				// 	echo 'gagal_mengirim_email';
				// }

            } else {
                echo 'username_tidak_terdaftar';
            }
        } else {
			echo 'gagal';
		}
	}

 
    // ===========================================================================
	// RESET PASSWORD
    // ===========================================================================
    
	public function reset_password($id = null)
	{
		if (!isset($id)) { 
			return redirect()->to('/login'); 
		} else {
            $data['token'] = $id;

            $data['pengguna'] = $this->pengguna->where([
                'token' => $data['token']
            ])->first();
            
            if ($data['pengguna']) {
                return view('login/reset_password', $data);
            } else {
                return redirect()->to('/login'); 
            }
		}
	}

    public function auth_reset_password()
    {		
		$email_smtp = \Config\Services::email();
        $validation =  \Config\Services::validation();
		$validation->setRules(['id_pengguna' => 'required']);
        $validation->setRules(['password' => 'required']);
        $validation->setRules(['password_ulang' => 'required']);
		$isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $id_pengguna = $this->request->getPost('id_pengguna');
            $password = $this->request->getPost('password');
            $password_ulang = $this->request->getPost('password_ulang');

            $status = $this->pengguna->update($id_pengguna, [
                "token" => "",
                "password" => md5($password),
            ]);

            if ($status) {
                echo "sukses";
            } else {
                echo 'gagal';
            }
        } else {
			echo 'gagal';
		}
	}

    


}
