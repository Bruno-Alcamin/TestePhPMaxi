        	
var tamanhoPagina = 10;

var pagina = 0;
		
var dados = [];
		
var url= window.location.href;
		
var modeledt = {};

var img = [];

$(listar());
function makeid(){
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	for( var i=0; i < 5; i++ )
	   text += possible.charAt(Math.floor(Math.random() * possible.length));
	return text;
}
     
$('#formId').submit( function( e ) {
	console.log(new FormData( this ))
    $.ajax( {
        url: url+'jornal/up?arg1='+img,
        type: 'POST',
        data: new FormData( this ),
        processData: false,
        contentType: false
    });
    e.preventDefault();
});

function confirmar(){
	var capas;
		
	for(var z = 0; z< img.length; z++){
		
		img[z] = makeid()+img[z];
	}
	
	for(var i = 0; i< img.length; i++){
		if(i==0){
			capas = img[i]+",";
		}else{
			capas += img[i]+",";
		}
	}
	
	console.log(img)
    var model = {"nome" : $('input[name="nome"]').val(), "capa" :capas};

    $('#formId').submit();
    
    $.ajax({
        type: 'POST',
        dataType: "json",
        cache: false,
        contentType:"application/json",    
        url: url+'jornal/cadastrar',
        data: JSON.stringify(model),
        success: function(e) {
            $("table#gridOleo tbody").html("");
        	listar();
        }
    });
    ajuste();
    $('table#gridOleo tbody tr').css('background-color','#fff');  
    img = undefined
    corBloqueio();
}

	

function novo(){
    $('.carrossel').html("");
	$('input').css("background-color", "#fff");
    $('#gridOleo tbody tr').off("click");
    $('input[name="nome"]').val("");
    $('textarea[name="descricao"]').val(""); 
    $('#btn-alt').removeAttr("onclick");
    $('#btn-nv').removeAttr("onclick");
    $('input[name="nome"]').removeAttr("disabled","disabled");
    $('input[name="img[]"]').removeAttr("disabled","disabled");
    $('textarea[name="descricao"]').removeAttr("disabled","disabled");
    $('#btn-conc').attr("onclick","confirmar()");
    $('#btn-canc').attr("onclick","cancelar()");
    $('#btn-canc').removeAttr("disabled",'disabled');
    $('#btn-conc').removeAttr("disabled",'disabled');
    $('#btn-alt').attr("disabled",'disabled');
    $('#imgProduto').html("");
    //document.querySelector(".img-responsive").src="<?= base_url() ?>assets/img/semimagem.jpg";
}


function corBloqueio(){
	$('input').css("background-color", "#ddd");
	$('textarea').css("background-color", "#ddd");
}


function cancelar(){
    $('.carrossel').html("");
	corBloqueio();
    selecao();
    $('table#gridOleo tbody tr').css('background-color','#fff');   
    ajuste();
}

function listar(){
    ajuste();
	dados = [];
	tamanhoPagina = 10;
	pagina = 0;
    $.ajax({
        type: 'GET',
        dataType: "json",
        cache: false,
        contentType:"application/json",    
        url: url+'jornal/busca',
    }).done(function(e){
         if(e!=null){
		    for (var i = 0 ; i < e.length; i++) {
		    	dados[i] = e[i];
		    }
            paginar();
        }
    });
}

function paginar() {
    $('table > tbody > tr').remove();
    var tbody = $('table > tbody');
    for (var i = pagina * tamanhoPagina; i < dados.length && i < (pagina + 1) *  tamanhoPagina; i++) {
        tbody.append(
            $('<tr>')
               .append($('<td class="center" id="id">').append(dados[i].cd_jornal))
		       .append($('<td class="center"  id="nm">').append(dados[i].nm_jornal))
		       .append($('<td id="im" style="display:none">').append(dados[i].ds_imagem_jornal))
		       
        )
    }
    $('#numeracao').text('Página ' + (pagina + 1) + ' de ' + Math.ceil(dados.length / tamanhoPagina));
    selecao();
    ajustarBotoes();
}

function ajustarBotoes() {
    $('#proximo').prop('disabled', dados.length <= tamanhoPagina || pagina > dados.length / tamanhoPagina - 1);
    $('#anterior').prop('disabled', dados.length <= tamanhoPagina || pagina == 0);
}

$(function() {
    $('#proximo').click(function() {
        if (pagina < dados.length / tamanhoPagina - 1) {
            pagina++;
            paginar();
            ajustarBotoes();
        }
    });
    $('#anterior').click(function() {
        if (pagina > 0) {
            pagina--;
            paginar();
            ajustarBotoes();
        }
    });
    paginar();
    ajustarBotoes();
});

function selecao(){
	$('#imgProduto').html("");
    $('table#gridOleo tbody tr').css('cursor','pointer');
    $('table#gridOleo tbody tr').click(function(){       
        $('#btn-alt').removeAttr("disabled",'disabled');
        $('table#gridOleo tbody tr').css('background-color','#fff')
        $('#btn-alt').attr("onclick","alterar()");
        $(this).css('background-color','#76affd');
        $('table#gridOleo tbody tr').removeAttr('select','select');
        $(this).attr('select','select');
        $('.carrossel').html("");
        if($(this).find('td[id="im"]').html()!='null'){
			var aux = $(this).find('td[id="im"]').html().split(',')
    		console.log(aux)
    		for(var i=0; i<aux.length;i++){
    			if(aux[i]!=""){
    				var local = url+"Imagens/jornal/"+aux[i];
    				$('.carrossel').append($('<li class="item">').append($('<img class=" img'+i+'">')));
    			    document.querySelector('.img'+i).src=local;
    			}
    		}
    		
    		confCarrossel();
    		
        }
        modeledt = {"id":$(this).find('td[id="id"]').html(),
        "nome" : $('input[name="nome"]').val($(this).find('td[id="nm"]').html()),
        "capa" : $(this).find('td[id="im"]').html(),
        "descricao" : $('textarea[name="descricao"]').val($(this).find('td[id="des"]').html())};
    });
}

function ajuste(){
    $('#gridOleo tbody tr').on("click");
    $('input[name="nome"]').val("");
    $('input[name="img[]"]').val("");
    $('textarea[name="descricao"]').val(""); 
    $('#btn-nv').attr("onclick","novo()");
    $('input[name="nome"]').attr("disabled","disabled");
    $('input[name="img[]"]').attr("disabled","disabled");
    $('select[name="tipo"]').attr("disabled","disabled");
    $('textarea[name="descricao"]').attr("disabled","disabled");
    $('#btn-alt').removeAttr("onclick");
    $('#btn-alt').attr("disabled",'disabled');
    $('#btn-conc').attr("disabled",'disabled');
    $('#btn-canc').attr('disabled','disabled');
    $('#btn-conc').removeAttr("onclick");
    $('#btn-canc').removeAttr("onclick");
}

$('input[name="img[]"]').change(function(){
    readURL(this);
});
	
function readURL(input){
	$('#imgProduto').html("");
	img = [];
	for(var i=0; i< input.files.length;i++){
	    img.push(input.files[i].name);
		if (input.files && input.files[i]) {
			var reader = new FileReader();
			reader.onload = function (e) {
			    $('.carrossel').append($('<li class="item">').append($('<img >')
				.attr('src', e.target.result)))
				confCarrossel();
				
			};
			reader.readAsDataURL(input.files[i]);
			
		}
	}
	
	console.log(img)
}

function confCarrossel(){
	if($('.carrossel .item').on){
	    ident = 0;
        width = (parseInt($('.carrossel .item').outerWidth() + parseInt($('.carrossel .item').css('margin-right')))) * $('.carrossel .item').length;
        $('.carrossel').css('width',width)
        count = ($('.carrossel .item').length / numImages) -1;
        slide = (numImages * MarginPadding) + ($('.carrossel img').outerWidth() * numImages);   
	}
}

var width = (parseInt($('.carrossel .item').outerWidth() + parseInt($('.carrossel .item').css('margin-right')))) * $('.carrossel .item').length;
$('.carrossel').css('width',width)

var numImages = 2 ;
var MarginPadding = 30;

var ident = 0;
var count = ($('.carrossel .item').length / numImages) -1;
var slide = (numImages * MarginPadding) + ($('.carrossel img').outerWidth() * numImages);

$('.forth').click(function() {
    if(ident < count){
        ident++;
        $('.carrossel').animate({'margin-left': '-=' +  slide + 'px'},'500')    
    }
})

$('.back').click(function() {
    if(ident >= 1){
        ident--;
        $('.carrossel').animate({'margin-left': '+=' +  slide + 'px'},'500')    
    }
})

