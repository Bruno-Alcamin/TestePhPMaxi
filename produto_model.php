<?php

class Produto_model extends CI_Model{
    
    public function __construct(){
        parent::__construct();
    }
    
     public function insert($a,$b,$c,$d,$e,$f,$g){
        
        $values = array('nm_produto' => $a, 'vl_produto' => $b, 'ds_foto_produto'=> $c, 'cd_tipo_produto'=> $d, 'ic_broto' => $e, 'vl_produto_broto' => $f, 'cd_categoria_produto'=>$g);
        $vec = $this->db->insert("produto",$values);

    }
    
        
    public function deletar($id){
        
        $this->db->where('cd_produto', $id);
        $this->db->delete('produto_ingredientes');
        $vec = $this->db->query('select ds_foto_produto from produto where cd_produto = '.$id);
        $data = $vec->result();
        unlink('/home/ubuntu/workspace/Imagens/produtos/'.$data[0]->ds_foto_produto);
        $this->db->where('cd_produto', $id);
        $this->db->delete('produto');
    }
    
    
    public function updata($x,$a,$b,$c,$d,$e,$f,$g){
        $vec = $this->db->query('select ds_foto_produto from produto where cd_produto = '.$x);
        $data = $vec->result();
        if($c!=$data[0]->ds_foto_produto){
            unlink('/home/ubuntu/workspace/Imagens/produtos/'.$data[0]->ds_foto_produto);    
        }
        $values = array('nm_produto' => $a, 'vl_produto' => $b, 'ds_foto_produto'=> $c, 'cd_tipo_produto'=> $d, 'ic_broto' => $e, 'vl_produto_broto' => $f, 'cd_categoria_produto' => $g );
        $where = 'cd_produto = '.$x; 
        $vec = $this->db->update("produto",$values,$where);
 
    }
    
    

    public function getprodutos(){
            
        $vec = $this->db->query("select O.*, GROUP_CONCAT(B.nm_ingredientes) as ingredientes
                                	from ingredientes as B 
                                	Inner join produto_ingredientes as OB 
                                	on B.cd_ingredientes = OB.cd_ingredientes
                                	right Join produto as O
                                	on O.cd_produto = OB.cd_produto
                                	group by O.cd_produto ");
        $data = $vec->result();
        return $data;
 
    }
    
     public function getAll(){
            
        $vec = $this->db->query("select * from produtos");
        $data = $vec->result();
        return $data;
 
    }
    
}   

?>