<?php 
	include('inc/header.php');
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">Bienvenue sur la boutique officielle JVN-Network !</h1>
			<p class="text-center">Vous l'avez attendu, elle est enfin là, la boutique officielle remplie de goodies, de cadeaux et bien plus vous tend les bras.</p>
	</div>
</div>
<!-- Menu présentation -->

<!-- Panier -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 hidden-xs">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix unitaire</th>
                        <th>Prix total</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                            <div class="media">
                                <a class="thumbnail pull-left" href="#"></a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#"></a></h4>
                                    <h5 class="media-heading">Par<a href="#"></a></h5>
                                    <span>Status: </span><span class="text-success"><strong></strong></span>
                                </div>
                            </div>
                        </td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                            <input type="email" class="form-control" id="exampleInputEmail1" value="">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>$4.87</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>$14.61</strong></td>
                        <td class="col-sm-1 col-md-1">
                            <button type="button" class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove"></span> Remove
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-6">
                            <div class="media">
                                <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">Product name</a></h4>
                                    <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                                    <span>Status: </span><span class="text-warning"><strong>Leaves warehouse in 2 - 3 weeks</strong></span>
                                </div>
                            </div>
                        </td>
                        <td class="col-md-1" style="text-align: center">
                            <input type="email" class="form-control" id="exampleInputEmail1" value="">
                        </td>
                        <td class="col-md-1 text-center"><strong>$4.99</strong></td>
                        <td class="col-md-1 text-center"><strong>$9.98</strong></td>
                        <td class="col-md-1">
                            <button type="button" class="btn btn-danger">Enlever</button>
                        </td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Sous-total</h5></td>
                        <td class="text-right"><h5><strong></strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Frais de livraison</h5></td>
                        <td class="text-right"><h5><strong>Gratuit selon votre abonnement</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong></strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                            <button type="button" class="btn btn-default">Continuer mes achats</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-success">Commander</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Panier XS -->
<div class="container">
    <div class="row">
        <div class="col-xs-12 hidden-lg hidden-md hidden-sm text-center">
            <button type="submit" href="#" class="btn btn-danger" id="panier-xs">Voir mon panier</button>
        </div>
    </div>
</div>

<?php
	include ('inc/footer.php');
?>