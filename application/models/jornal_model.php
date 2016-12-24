<?php

class Jornal_model extends CI_Model{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function getprod(){
       $this->db->select('*');

		$this->db->from('jornal');

		$result = $this->db->get()->result();

		return $result;
    }

    public function insert($nome,$descricao){
        $values = array('nm_jornal' => $nome, 'ds_imagem_jornal' => $descricao );
        $this->db->insert("jornal",$values);
    }
    
}   

?>