<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">

<!--     // <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    // <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    // <script src="../../assets/js/jquery.maskedinput-1.1.4.pack.js"></script>
    // <script src="../../assets/js/jquery-1.2.6.pack.js"></script> -->

    <script src="../../assets/js/jquery-2.1.4.min.js"></script>
    <script src="../../assets/js/jquery.mask.js"></script>

    <!-- Custom CSS -->
    <link href="../../assets/css/logo-nav.css" rel="stylesheet">
	<title>Guia do Café</title>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo site_url() . '/items'; ?>">Cadastrar empresa</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url() . '/items/listagemempresas'; ?>">Lista de empresas</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url() . '/segmento'; ?>">Segmentos</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url() . '/segmento/segmentos_listagem'; ?>">Lista de Segmentos</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url() . '/banner'; ?>">Banner</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url() . '/banner/banners_listagem'; ?>">Lista de Banners</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	
	{content_for_layout}
	<!-- jQuery -->
    <script src="../../assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../assets/js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="../../assets/js/jquery.easing.min.js"></script>
</body>
</html>