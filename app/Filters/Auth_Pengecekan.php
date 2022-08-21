<?php namespace App\Filters;
 
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
 
class Auth_Pengecekan implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('logged_in')){
            return redirect()->to('/login'); 
        } elseif (session()->get('role') == 1){
            return redirect()->to('/pendataan'); 
        } elseif (session()->get('role') == 3){
            return redirect()->to('/pengadaan'); 
        } elseif (session()->get('role') == 4){
            return redirect()->to('/umum'); 
        }
    }
 
    //--------------------------------------------------------------------
 
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}