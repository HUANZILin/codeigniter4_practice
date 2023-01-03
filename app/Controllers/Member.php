<?php

namespace App\Controllers;

use App\Models\MemberModel;
use CodeIgniter\API\ResponseTrait;

class Member extends BaseController{
    use ResponseTrait;
    public function getIndex(){
        if($this->isLogin()){
            return view('member/member', $this->memberData);
        }else{
            return view('member/login');
        }
    }

    public function getDoLogin(){
        if($this->isLogin()) return $this->fail("已登入",403);

        $account = $this->request->getPost("account");
        $password = $this->request->getPost("password");
        if($account ==null || $password == null){
            return $this->fail("需傳遞帳號及密碼進行登入",400);
        }

        $memberModel = new MemberModel();
        $memberData = $memberModel->getMember($account,$password);

        if($memberData){
            $this->session->set("memberData",$memberData);
            $this->response->setStatusCode(200);
            return $this->response->setJSON(["msg"=>"OK"]);
        }else{
            return $this->fail("帳號或密碼錯誤",400);
        }
    }

    public function getDoLogout(){
        $this->session->destroy();
        return redirect()->to("/Member");
    }
}