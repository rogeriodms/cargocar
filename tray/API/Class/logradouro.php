<?


class logradouro
{
    
var $ceporigem;
    var $cepdestino;
    var $kmcep;
    
    public function getCepOrigem()
    {
        return $this->ceporigem;
    }
    public function setCepOrigem($value)
    {
        $this->ceporigem = $value;
    }
    
    public function getCepDestino()
    {
        return $this->cepdestino;
    }
    public function setCepDestino($value)
    {
        $this->cepdestino = $value;
    }
    
    public function getCepkm()
    {
        return $this->cepkm;
    }
    public function setCepkm($value)
    {
        $this->cepkm = $value;
    }
}    
    ?>