<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jornal extends CI_Controller {
    
	public function __construct() {

	    header('Access-Control-Allow-Origin: *');

	    header('Access-Control-Allow-Methods: GET, POST, PUT');

	    header("Access-Control-Allow-Headers: X-Requested-With");

		parent::__construct();	
	}
	
	public function up(){
	    
	    $names = $_GET['arg1']; 
	  
	    $arrayNomes = explode(',',$names);
        
        $valid_formats = array("jpg", "png", "gif");
        $max_file_size = 1024*1000; //100 kb
        $path = "Imagens/jornal/"; // Upload directory
        $count = 0;
        $maxWidth = 1920;
        $maxheight = 1080;
    
        if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
            
            foreach ($_FILES['img']['name'] as $f => $name) {     
                if ($_FILES['img']['error'][$f] == 4) {
                    continue; 
                }          
                if ($_FILES['img']['error'][$f] == 0) {              
                    if ($_FILES['img']['size'][$f] > $max_file_size) {
                        $message[] = "$name is too large!.";
                        continue; 
                    }
                    elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
                        $message[] = "$name is not a valid format";
                        continue; 
                    }
                    else{ 
                        $nmImg = $arrayNomes[$f];
                        $uploadfile = $path.$nmImg;
                        if(move_uploaded_file($_FILES["img"]["tmp_name"][$f], $path.$nmImg)){
                            // Pegamos sua largura e altura originais
                            list($width_orig, $height_orig) = getimagesize($uploadfile);
                            
                            //Comparamos sua largura e altura originais com as desejadas
                            if($width_orig > $maxWidth || $height_orig > $maxheight){
                            
                                // Chamamos a função que redimensiona a imagem
                                $this->redimensionar($path, $nmImg);
                            }
                        }
                       
                        $count++; 
                    }
                }
            }
        }
        
    }
    
    protected function redimensionar($caminho, $nomearquivo){

        $width = 1920;
        $height = 1080;
        list($width_orig, $height_orig, $tipo, $atributo) = getimagesize($caminho.$nomearquivo);


        if($width_orig > $height_orig){
        $height = ($width/$width_orig)*$height_orig;
        
        } elseif($width_orig < $height_orig) {
        $width = ($height/$height_orig)*$width_orig;
        }
        
        $novaimagem = imagecreatetruecolor($width, $height);
        switch($tipo){
        
        
        case 1:
        
        $origem = imagecreatefromgif($caminho.$nomearquivo);
        
        imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
        
        imagegif($novaimagem, $caminho.$nomearquivo);
        break;
        
        
        case 2:
        
        $origem = imagecreatefromjpeg($caminho.$nomearquivo);
        
        imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
        
        imagejpeg($novaimagem, $caminho.$nomearquivo);
        break;
        
        
        case 3:
        
        $origem = imagecreatefrompng($caminho.$nomearquivo);
        
        imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
        
        imagepng($novaimagem, $caminho.$nomearquivo);
        break;
        }
        
        imagedestroy($novaimagem);
        
        imagedestroy($origem);
    }


    public function busca(){
        header('content-type: application/json');
        $pd = $this->jornal_model;
        $prod = $pd->getprod();
        echo json_encode($prod);
    }
    
    public function cadastrar(){
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            $this->jornal_model->insert($array["nome"],$array["capa"]);
            echo json_encode(array("Cadastro"=>"Realizado"));
        }else{
            echo json_encode(array("response"=>"Dados inválidos"));
        }
    }
}
