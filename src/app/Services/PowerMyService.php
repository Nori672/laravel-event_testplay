<?php

namespace App\Services;

use App\Interfaces\MyServiceInterface;

class PowerMyService implements MyServiceInterface
{
    private $msg = 'no ID ...';
    private $data = ['いちご', 'りんご', 'ばなな','みかん','ぶどう'];
    private $id = -1;
    private $seiral;

    public function __construct()
    {
        $this->setId(rand(0, count($this->data)));
    }

    public function setId($id)
    {
        $this->id = $id;
        if ($this->id >= 0 && $id < count($this->data)){
            $this->msg = 'あなたが好きなのは'.$id.'番の'.$this->data[$id].'ですね';
        }
    }

    public function say(){
        return $this->msg;
    }

    public function data(int $id){
        return $this->data[$id];
    }

    public function alldata(){
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }
}
?>