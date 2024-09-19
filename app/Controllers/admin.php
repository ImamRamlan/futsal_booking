<?php

namespace App\Controllers;
use App\Models\AdminModel;
class admin extends BaseController
{
    protected $AdminModel;
    public function __construct() {
        $this->AdminModel = new AdminModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Beranda Utama'
        ];
        return view('admin/index',$data);
    }
    public function create()
    {
        $data = [
            'title' => 'Form Admin'
        ];
        return view('admin/create',$data);
    }
    public function view()
    {
        $data = [
            'title' => 'Data Admin',
            'admin' => $this->AdminModel->findAll()
        ];
        return view('admin/view',$data);
    }
}
