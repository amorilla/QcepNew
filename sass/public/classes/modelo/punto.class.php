<?
class Punto
{
    private $primerNum;
    private $segunNum;
    private $proces_id;

    public function __construct($pNum, $sNum, $pId)
    {
        $this->primerNum = $pNum;
        $this->segunNum = $sNum;
        $this->proces_id = $pId;
    }

    public function getPrimerNum()
    {
        return $this->primerNum;
    }
    public function getSegunNum()
    {
        return $this->segunNum;
    }
    public function getProces()
    {
        return $this->proces_id;
    }

    public function setPrimerNum($num)
    {
        $this->primerNum = $num;
    }
    public function setSegunNum($num)
    {
        $this->segunNum = $num;
    }
}
