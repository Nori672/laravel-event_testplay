<?php
namespace App\Services;

use App\Interfaces\MyServiceInterface;

class MyService implements MyServiceInterface
{
    private $msg = 'no ID ...';
    private $data = ['Hello', 'Welcome', 'Bye'];
    private $id = -1;
    private $seiral;

    public function __construct()
    {
        $this->seiral = rand();
        echo '[' . $this->seiral . ']';
    }

    public function setId($id)
    {
        $this->id = $id;
        if ($this->id >= 0 && $id < count($this->data)){
            $this->msg = 'select id : '.$id.', data :'.$this->data[$id];
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
}
?>