<!DOCTYPE html>
<html lang="br">
	<head>
		<!-- start: Meta -->
		<meta charset="utf-8">
		<title>Teste PHP - Maxi</title>
	
		
		<!-- start: Mobile Specific -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- end: Mobile Specific -->
		
		<link id="bootstrap-style" href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?= base_url() ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link id="base-style" href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
		<link id="base-style-responsive" href="<?= base_url() ?>assets/css/style-responsive.css" rel="stylesheet">
	       
		<style type="text/css">
			#gridOleo{
				margin-top: 40px;
			}
			
			#imgProduto{
			
				width:40%; 
				margin-left:5%;
				float:left;
			}
			
		
			
			fieldset{
				float:left;
				width:50%;
			}
			
			.has-danger{
				background-color:#e5aba7;
				border-color:#c5423a;
			}
			
			thead{
				background-color:#bbb;
			}
			
			.img{
				width:30%;
				height:40%;
				margin:8%;
			}
			
			.box-content{
				width:40%;
				float:left;
				max-height: 300px;
			}
			
			.box-content1{
				width:50%;
				float:left;
				
			}
			
			.blockimgs{
				padding:0px;
				margin-top: 0px;
			}
			
			img{max-width: 100%;}
			.clear{clear: both;}
			
			/*234px;*/
			/*418px;*/
			/*600px*/
			/*784px;*/
			
			.box_carrossel{width: 418px; overflow:hidden; margin: 10% auto; position: relative; padding: 10px 30px; background: #fff; box-shadow: 0 0 5px 1px #000;}
			.box_carrossel .nav{position: absolute; top: 0; padding: 0 5px; display: table; height: 147px; background: cornflowerblue; color: #fff; font-size: 1.3em; cursor: pointer;}
			.box_carrossel .nav p{display: table-cell; vertical-align: middle;}
			.box_carrossel .nav:hover{background: #99ccff;}
			.box_carrossel .nav.back{left: 0;}
			.box_carrossel .nav.forth{right: 0;}
			
			.carrossel{list-style:  none; width:1000%; float: left; background: #fff;}
			.carrossel .item{float: left; width: 173px; padding: 10px; margin-right: 10px; background: #99ccff;}
		
		</style>
	
			
	</head>
	
	<body>
		<!-- start: Header -->
		<div class="navbar">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="home"><span>Teste PHP - Maxi</span></a>
									
					<!-- start: Header Menu -->
					<div class="nav-no-collapse header-nav">
						<ul class="nav pull-right">
						</ul>
					</div>
					<!-- end: Header Menu -->
				</div>
			</div>
		</div>
		<!-- start: Header -->
		<div class="container-fluid-full">
		<div class="row-fluid">
			<!-- start: Main Menu -->
				<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="index"><span class="hidden-tablet"> Cadastro de Fotos</span></a></li>
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			<!-- start: Content -->
			<div id="content" class="span10">
				<ul class="breadcrumb">
					<li><a href="#">Cadastro de Fotos</a></li>
				</ul>
				<div  class="row-fluid">
					
					<div class="box-content">
						<h2>Cadastro de Fotos</h2>
	    				<button id="btn-nv" class="btn btn-primary-outline col-md-offset-2 col-lg-offset-2 btn-success" >Novo</button>
	    		
						<div class="row-fluid sortable">
				
							<div id="fiel" class="box-content">
									
								<fieldset>
									<div class="control-group">
										<label class="control-label" for="focusedInput">Nome</label>
										<div class="controls">
											<input class="input-xlarge focused" id="focusedInput" name="nome" type="text">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Imagens</label>
										<div class="controls">
											<form   enctype="multipart/form-data" id="formId">
												<input name="img[]" type="file" multiple>
											</form>
										</div>
									</div>
									<button class="btn btn-primary" id="btn-conc">Confirmar</button>
									<button class="btn btn-danger" id="btn-canc">Cancelar</button>
								</fieldset>
								
							</div>
						</div>
						
					</div><!--/span-->
					<div class="box-content1 blockimgs" >
						<div class="box_carrossel">
				            <div class="nav back"><p>&laquo;</p></div>
				            <ul class="carrossel">
				                
				                
				            </ul>
				            <div class="nav forth"><p>&raquo;</p></div>
				            <div class="clear"></div>
			        	</div>
					</div>
				</div><!--/row-->
				<table id="gridOleo" class="table table-bordered bootstrap-datatable ">
					<thead>
						<tr>
							<th>Código </th>
							<th>Descrição</th>
						</tr>
					</thead>   
					<tbody>
					</tbody>
				</table>            
				<div>
				    <button id="anterior" class="btn btn-info">&lsaquo; Anterior</button>
				    <span id="numeracao"></span>
					<button id="proximo" class="btn btn-info" >Próximo &rsaquo;</button>
				</div>
				<footer style="text-align:center;">
					<span > Teste PHP - Maxi</span>
				</footer>
	
		
		<!-- start: JavaScript-->
	
			<script src="<?= base_url() ?>assets/js/jquery-1.9.1.min.js"></script>
			
			<script src="<?= base_url() ?>assets/js-Controller/jornal.js" type="text/javascript"></script>
		
			<script src="<?= base_url() ?>assets/js/jquery-migrate-1.0.0.min.js"></script>
		
			<script src="<?= base_url() ?>assets/js/jquery-ui-1.10.0.custom.min.js"></script>
		
			<script src="<?= base_url() ?>assets/js/jquery.ui.touch-punch.js"></script>
		
			<script src="<?= base_url() ?>assets/js/modernizr.js"></script>
		
			<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
		
			<script src="<?= base_url() ?>assets/js/jquery.cookie.js"></script>
		
			<script src='<?= base_url() ?>assets/js/fullcalendar.min.js'></script>
		
			<script src='<?= base_url() ?>assets/js/jquery.dataTables.min.js'></script>
	
			<script src="<?= base_url() ?>assets/js/excanvas.js"></script>
			<script src="<?= base_url() ?>assets/js/jquery.flot.js"></script>
			<script src="<?= base_url() ?>assets/js/jquery.flot.pie.js"></script>
			<script src="<?= base_url() ?>assets/js/jquery.flot.stack.js"></script>
			<script src="<?= base_url() ?>assets/js/jquery.flot.resize.min.js"></script>
		
			<script src="<?= base_url() ?>assets/js/jquery.chosen.min.js"></script>
		
			<script src="<?= base_url() ?>assets/js/jquery.uniform.min.js"></script>
			
			<script src="<?= base_url() ?>assets/js/jquery.cleditor.min.js"></script>
		
			<script src="<?= base_url() ?>assets/js/jquery.noty.js"></script>
		
			<script src="<?= base_url() ?>assets/js/jquery.elfinder.min.js"></script>
		
			<script src="<?= base_url() ?>assets/js/jquery.raty.min.js"></script>
		
			<script src="<?= base_url() ?>assets/js/jquery.iphone.toggle.js"></script>
		
			<script src="<?= base_url() ?>assets/js/jquery.uploadify-3.1.min.js"></script>
		
			<script src="<?= base_url() ?>assets/js/jquery.gritter.min.js"></script>
		
			<script src="<?= base_url() ?>assets/js/jquery.imagesloaded.js"></script>
		
			<script src="<?= base_url() ?>assets/js/jquery.masonry.min.js"></script>
		
			<script src="<?= base_url() ?>assets/js/jquery.knob.modified.js"></script>
		
			<script src="<?= base_url() ?>assets/js/jquery.sparkline.min.js"></script>
		
			<script src="<?= base_url() ?>assets/js/counter.js"></script>
		
			<script src="<?= base_url() ?>assets/js/retina.js"></script>
			<script src="<?= base_url() ?>assets/js/custom.js"></script>
	
	</body>
</html>
