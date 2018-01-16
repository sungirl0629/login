<?php
namespace app\home\controller;
use think\Controller;
use app\home\controller\Common;
class Login extends Common
{
    public function index()
    {
        return $this->fetch();

    }
    public function do_login()
    {
        $username=input('post.username');
        $password=input('post.password');
        $table=db('member');
        $info=$table->where('username="'.$username.'"')->find();
//        echo "<pre>";
//        print_r($info);
        if($info)
        {
             session('username',$username);
                session('userid',$info['id']);
            if($info['password']==$password)
            {
                if(input('post.ischecks'))
                {

                    cookie('username',$username,864000);
                }
                session('username',$username);
                $result=[
                    'msg'=>'succ',
                    'status'=>1
                ];
                return json($result);

            }
            else{
                $result=[
                    'msg'=>'error passeord',
                    'status'=>0
                ];
                return json($result);

            }
        }
        else{
            $result=[
                'msg'=>'username is null',
                'status'=>0
            ];
            return json($result);

        }
    }
}
