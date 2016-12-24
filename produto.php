<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produto extends CI_Controller {
    
    
	public function __construct() {
	    
	    header('Access-Control-Allow-Origin: *');

	    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

	    header("Access-Control-Allow-Headers: X-Requested-With");
	    
		parent::__construct();	
	}
	
	public function up(){
        $dir = '/home/ubuntu/workspace/Imagens/produtos/';
        $uploadfile = $dir .  $_GET["arg1"];
        move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);
    }
    
    public function cadastrar(){
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            $this->produto_model->insert($array["nome"],$array["valor"],$array["capa"],$array["tipo"],$array["icBroto"],$array["valorBroto"],$array["categoria"]);
            echo json_encode(array("Cadastro"=>"Realizado"));
            
        }else{
            echo json_encode(array("response"=>"Dados inválidos"));
            
        }
    }
    
    public function deletarProduto(){
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            $this->produto_model->deletar($array["id"]);
            echo json_encode(array("Cadastro"=>"Deletado"));
            
        }else{
            echo json_encode(array("response"=>"Dados inválidos"));
            
        }
    }
    
    
    public function update(){
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            $this->produto_model->updata($_GET["arg1"],$array["nome"],$array["valor"],$array["capa"],$array["tipo"],$array["icBroto"],$array["valorBroto"],$array["categoria"]);
            echo json_encode(array("Cadastro"=>"Atualizado"));
            
        }else{
            echo json_encode(array("response"=>"Dados inválidos"));
            
        }
    }

    public function buscaProduto(){
        header('content-type: application/json');
        $pd = $this->produto_model;
        $prod = $pd->getprodutos();
        echo json_encode($prod);
        
    }
    
    public function buscanomeProduto(){
        header('content-type: application/json');
        $pd = $this->produto_model;
        $prod = $pd->getNomeprodutos($_GET['arg0']);
        $prod1 = $pd->getbeneficioprodutos($_GET['arg0']);
        $prod +=$prod1;
        echo json_encode($prod);
        
    }
    
    public function buscaTodos(){
        header('content-type: application/json');
        $pd = $this->produto_model;
        $prod = $pd->getAll();
        echo json_encode($prod);
       
    }
    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */