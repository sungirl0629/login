<?php
namespace app\home\controller;

use think\Controller;
class Index extends Controller
{
public function welcome()
{
    return $this->fetch('welcome');
}
}