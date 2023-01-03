<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model{
    protected $table = 'member';

    public function getMember($account, $password){
        $memberData = $this->asArray()->where(['account'=>$account, 'password'=>sha1($password)])->first();
        return $memberData ?? false;
    }
}

?>