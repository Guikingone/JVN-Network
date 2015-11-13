<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<!-- All the files that are required -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />


    <title>JVN.org</title>

    <!-- Bootstrap Core CSS -->
    <link href="startbootstrap-agency-1.0.4/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="startbootstrap-agency-1.0.4/css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	
	<!-- Status -->
	    <br/><br/><br/>
    
    <!-- Paiement -->
	
	<!-- Vendor libraries -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.2.3/jquery.payment.min.js"></script>

	<!-- If you're using Stripe for payments -->
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

	<div class="container">
		<div class="row">
			<!-- You can make it whatever width you want. I'm making it full width
				 on <= small devices and 4/12 page width on >= medium devices -->
			<div class="col-xs-12 col-md-4">
			
			
				<!-- CREDIT CARD FORM STARTS HERE -->
				<div class="panel panel-default credit-card-box">
					<div class="panel-heading display-table" >
						<div class="row display-tr" >
							<h3 class="panel-title display-td" >Détails de paiement :</h3>
							<div class="display-td" >                            
								<img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
							</div>
						</div>                    
					</div>
					<div class="panel-body">
						<form role="form" id="payment-form">
							<div class="row">
								<div class="col-xs-12">
									<div class="form-group">
										<label for="cardNumber">CARD NUMBER</label>
										<div class="input-group">
											<input 
												type="tel"
												class="form-control"
												name="cardNumber"
												placeholder="Valid Card Number"
												autocomplete="cc-number"
												required autofocus 
											/>
											<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
										</div>
									</div>                            
								</div>
							</div>
							<div class="row">
								<div class="col-xs-7 col-md-7">
									<div class="form-group">
										<label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
										<input 
											type="tel" 
											class="form-control" 
											name="cardExpiry"
											placeholder="MM / YY"
											autocomplete="cc-exp"
											required 
										/>
									</div>
								</div>
								<div class="col-xs-5 col-md-5 pull-right">
									<div class="form-group">
										<label for="cardCVC">CV CODE</label>
										<input 
											type="tel" 
											class="form-control"
											name="cardCVC"
											placeholder="CVC"
											autocomplete="cc-csc"
											required
										/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<div class="form-group">
										<label for="couponCode">COUPON CODE</label>
										<input type="text" class="form-control" name="couponCode" />
									</div>
								</div>                        
							</div>
							<div class="row">
								<div class="col-xs-12">
									<button class="btn btn-success btn-lg btn-block" type="submit">Start Subscription</button>
								</div>
							</div>
							<div class="row" style="display:none;">
								<div class="col-xs-12">
									<p class="payment-errors"></p>
								</div>
							</div>
						</form>
					</div>
				</div>            
				<!-- CREDIT CARD FORM ENDS HERE -->
				
				
			</div>            
			
			<div class="col-xs-12 col-md-8" style="font-size: 12pt; line-height: 2em;">
				<p><h1>Features:</h1>
					<ul>
						<li>Assurez-vous du statut choisi !</li>
						<li>Les coupons de réduction sont disponible <a href="#">Ici</a> (Attention à la validité !)</li>
						<li>Tout paiement refusé par votre établissement bancaire sera facturé 3 mois plus tard</li>
						<li>Le paiement en nature n'est pas applicable !</li>
						<li>JVN.org est une communauté sérieuse, ne payer que si vous pensez être capable de vous tenir selon les <a href="#">LdS</a></li>
					</ul>
				</p>
				<p>Le prélèvement s'effectuera tout les 3 mois à la date d'entrée en action du paiement (Ex : Achat le 21 Juillet / Paiement le 21 Octobre)</p>
				
				<p>Built upon: Bootstrap, jQuery, 
					<a href="http://jqueryvalidation.org/">jQuery Validation Plugin</a>, 
					<a href="https://github.com/stripe/jquery.payment">jQuery.payment library</a>,
					and <a href="https://stripe.com/docs/stripe.js">Stripe.js</a>
				</p>
			</div>
			
		</div>
	</div>

    <!-- /Plans -->

    <!-- jQuery -->
    <script src="startbootstrap-agency-1.0.4/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="startbootstrap-agency-1.0.4/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="startbootstrap-agency-1.0.4/js/classie.js"></script>
    <script src="startbootstrap-agency-1.0.4/js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="startbootstrap-agency-1.0.4/js/jqBootstrapValidation.js"></script>
    <script src="startbootstrap-agency-1.0.4/js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="startbootstrap-agency-1.0.4/js/agency.js"></script>
      
</body>
</html>
</html>