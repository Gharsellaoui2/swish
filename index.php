<?php
//include "user-session.php";
include "inc/config.php";
include "inc/fonctions.php";
$NavActiveHome=true;
?>
<!doctype html>
<html class="fixed sidebar-light sidebar-left-collapsed">
<head>

<!-- Basic -->
<meta charset="UTF-8">
<title>Swish : Home</title>
<meta name="keywords" content="Swish" />
<meta name="description" content="Swish">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<!-- Web Fonts  -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700|Roboto:400,500,700,900' rel='stylesheet' type='text/css'>

<!-- Vendor CSS -->

<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="navbar/vendor/font-awesome/css/all.min.css" />
<link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="navbar/vendor/boxicons/css/boxicons.min.css" />
<!-- Theme CSS -->
<link rel="stylesheet" href="navbar/css/theme.css" />
<!-- Head Libs -->
<script src="navbar/vendor/modernizr/modernizr.js"></script>
<!-- Libs CSS ============================================ -->

<link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="js/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">
<link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="css/themecss/lib.css" rel="stylesheet">
<link href="js/jquery-ui/jquery-ui.min.css" rel="stylesheet">

<!-- Theme CSS ============================================ -->
<link href="css/themecss/so_megamenu.css" rel="stylesheet">
<link href="css/themecss/so-categories.css" rel="stylesheet">
<link href="css/themecss/so-listing-tabs.css" rel="stylesheet">
<link id="color_scheme" href="css/home4.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">


<!-- Vendor --> 
<script type="text/javascript" src="js/jquery-2.2.4.min.js"></script> 
<!-- Include Libs & Plugins		============================================ --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/owl-carousel/owl.carousel.js"></script> 
<script type="text/javascript" src="js/countdown/jquery.countdown.min.js"></script> 
<script type="text/javascript" src="js/themejs/libs.js"></script> 
<script type="text/javascript" src="js/unveil/jquery.unveil.js"></script> 
<script type="text/javascript" src="js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js"></script> 
<script type="text/javascript" src="js/datetimepicker/moment.js"></script> 
<script type="text/javascript" src="js/datetimepicker/bootstrap-datetimepicker.min.js"></script> 
<script type="text/javascript" src="js/jquery-ui/jquery-ui.min.js"></script> 
<!-- Theme files ============================================ --> 

<script type="text/javascript" src="js/themejs/toppanel.js"></script> 
<script type="text/javascript" src="js/themejs/so_megamenu.js"></script> 
<script type="text/javascript" src="js/themejs/addtocart.js"></script> 
<script type="text/javascript" src="js/themejs/accordion.js"></script> 
<script type="text/javascript" src="js/themejs/cpanel.js"></script>
<script type="text/javascript" src="js/countdown/script-countdown.js"></script> 

</head>
<body class="res layout-subpage common-home res layout-home1">
<section class="body">
  <?php
    include "inc/header.php";
    ?>
    <div class="inner-wrapper">
    	<?php
        include "inc/c-left.php";
        ?>
        <section role="main" class="content-body"> 
          
          <!-- start: page -->
          <div class="row">
            <div class="col-lg-12">
			
				
			
              <div id="wrapper" class="wrapper-full banners-effect-7"> 
				
				
				
				<!-- Main Container  -->
                <main id="content" class="common-home page-main"> 
					<?php
					include "inc/banner.php";
					?>
					
					<div class="so-spotlight1">
						<div class="container">
							<div class="block-banner banners banner-sn-1 wow fadeInUp">
								<?php
								$SqlCategorieHome = mysqli_query($CNX_ZEN, "SELECT	id_categorie_ecommerce, nom_".$_SESSION["LANGUE_SITE_CODE"]."  AS nom_categorie, ordre, id_categorie_ecommerce_parent, banner	FROM categorie_ecommerce WHERE etat_activer='1' AND etat_delete='0' AND etat_home='1' ORDER BY ordre, nom_".$_SESSION["LANGUE_SITE_CODE"]."");
								$NumCat = 0 ;
								while ($ResCategorieHome = mysqli_fetch_array($SqlCategorieHome))
								{
									$NumCat ++ ;
									if(stripslashes(trim($ResCategorieHome["banner"]))==NULL)
									{
										$banner_categorie = "default.png";
									}
									else
									{
										$banner_categorie = stripslashes(trim($ResCategorieHome["banner"]));
									}
								?>
								<div class="img-1 banner1-<?php echo $NumCat ; ?>">
									<a title="Static Image" href="category.php?Category=AllCategory&CategoryId=<?php echo stripslashes(trim($ResCategorieHome["id_categorie_ecommerce"])) ; ?>"><img class="img-responsive lazyautosizes lazyloaded" data-sizes="auto" src="<?php echo $_SESSION["ROOTDOCUMENTWEBSITE"].$DOSSIER_BANNER_CATEGORIE."/".$banner_categorie ; ?>" data-src="<?php echo $_SESSION["ROOTDOCUMENTWEBSITE"].$DOSSIER_BANNER_CATEGORIE."/".$banner_categorie ; ?>" alt="<?php echo stripslashes(trim($ResCategorieHome["nom_categorie"])) ; ?>" sizes="292px"></a>
								</div>
								<?php
								}
								mysqli_free_result($SqlCategorieHome);
								?>
								
							</div>
						</div>  
					</div>
					
					
					
				 
				  
				  
				   <!-- Block Spotlight2  -->
                  <div class="so-spotlight2">
                    <div class="container">
                      <div class="row">
						
                        <div class="col-md-12 col-sm-12 col-xs-12"> 
					  
						  
						  
						  
						  <!-- Mod Streams -->
						  <?php
						  $SqlStream = mysqli_query($CNX_ZEN, "SELECT s.id_streaming, COUNT(sv.id_streaming_views) AS nbr_view, s.date_heure_start_prevue, s.date_heure_ajout, s.date_heure_finish, s.etat_stream, s.date_heure_start, s.file_streaming, i.id_influenceur, CONCAT(i.nom,' ', i.prenom) AS nom_prenom_influencer, s.code_streaming, s.photo, s.nom_".$_SESSION["LANGUE_SITE_CODE"]." AS nom_stream FROM streaming s INNER JOIN influenceur i ON (s.id_influenceur = i.id_influenceur AND i.etat_activer='1' AND i.etat_delete='0') LEFT JOIN streaming_views sv ON (s.id_streaming = sv.id_streaming ) WHERE s.etat_activer='1' AND s.etat_delete='0' GROUP BY s.id_streaming ORDER BY FIELD(s.etat_stream, 2, 0, 1) DESC, s.date_heure_ajout DESC");
						 
						  if(mysqli_num_rows($SqlStream)>0)
						  {
						  ?>
                          <div class="module so-deals">
                            <h3 class="modtitle"><span>Streaming</span></h3>
                            <div class="modcontent">
                              <div class="so-deal modcontent products-list grid clearfixbutton-type1 style2">
                                <div class="extraslider-inner product-layout livestreaming-slider" id="livestreaming-slider">
								
									<?php
									while ($ResStream = mysqli_fetch_array ($SqlStream))
									{
										if(stripslashes(trim($ResStream["photo"]))==NULL)
										{
										$photo_stream =  $DEFAULT_PHOTO_STREAM ;
										}
										else
										{
										$photo_stream =  stripslashes(trim($ResStream["photo"])) ;
										}
										
										if(stripslashes(trim($ResStream["etat_stream"]))==0)
										{
											$ClassLiveOrReplay = "soon";
											$TxtLiveOrReplay = "Soon";
											$UrlLiveReplay =  "#" ;
											$ImgLiveOrReplay = "soon-streaming.jpg";
											$TargetStream = "";
											
											if(!empty(stripslashes(trim($ResStream["date_heure_start_prevue"]))))
											{
											$DateTimeStartStreamAgo = "Scheduled on ".date("d-m-Y H:i", strtotime(stripslashes(trim($ResStream["date_heure_start_prevue"]))));
											}
											else
											{
											$DateTimeStartStreamAgo = "";
											}
										}

										elseif(stripslashes(trim($ResStream["etat_stream"]))==1)
										{
											$ClassLiveOrReplay = "live";
											$TxtLiveOrReplay = "Live";
											$UrlLiveReplay =  $_SESSION["MYDOMAINE_HTTPS_LIVE_STREAM"]."/live.html?token=".$_SESSION["TokenSessionClient"]."&session_stream=".$ResStream['code_streaming']."&user_stream=".$_SESSION["AuthentificationData"]["IdConnexion"] ;
											
											/*$UrlLiveReplay =  "live.php?token=".$_SESSION["TokenSessionClient"]."&session_stream=".$ResStream['code_streaming']."&user_stream=".$_SESSION["AuthentificationData"]["IdConnexion"] ;*/
											$ImgLiveOrReplay = "live-streaming.jpg";
											$TargetStream = "_blank";
											$start_date = new DateTime(stripslashes(trim($ResStream["date_heure_start"])));
											$since_start = $start_date->diff(new DateTime($NOW));
											$DateTimeStartStreamAgo =$since_start->i." Min ago" ;
											$DateTimeStartStreamAgo .="<br />".stripslashes(trim($ResStream["nbr_view"]))." Views" ;
											
											
										}
										elseif(stripslashes(trim($ResStream["etat_stream"]))==2)
										{
											$ClassLiveOrReplay = "replay";
											$TxtLiveOrReplay = "Replay";
											$UrlLiveReplay = $_SESSION["MYDOMAINE_HTTPS"]."/".$DOSSIER_RECORD_STREAM."/".stripslashes(trim($ResStream["file_streaming"])) ;
											
											/*$UrlLiveReplay =  "live.php?token=".$_SESSION["TokenSessionClient"]."&session_stream=".$ResStream['code_streaming']."&user_stream=".$_SESSION["AuthentificationData"]["IdConnexion"] ;*/
											$ImgLiveOrReplay = "replay-streaming.jpg";
											$TargetStream = "_blank";
											$DateTimeStartStreamAgo = date("d-m-Y H:i:s", strtotime(stripslashes(trim($ResStream["date_heure_finish"]))));
											$DateTimeStartStreamAgo .="<br />".stripslashes(trim($ResStream["nbr_view"]))." Views" ;
										}
									?>
									
									<div class="product-thumb transition product-item-container">
									
										<div class="left-block">
										<div class="product-image-container second_img ">
											
											<?php
											if(stripslashes(trim($ResStream["etat_stream"]))!=0)
											{
											?>
											<a class="lt-image" href="<?php echo $UrlLiveReplay ; ?>" target="<?php echo $TargetStream ; ?>">
											<?php
											}
											?>
											<img class="lazyload img-1 img-responsive" data-sizes="auto" src="<?php echo $_SESSION["ROOTDOCUMENTWEBSITE"].$DOSSIER_PHOTO_STREAMING."/".$photo_stream ; ?>" data-src="<?php echo $_SESSION["ROOTDOCUMENTWEBSITE"].$DOSSIER_PHOTO_STREAMING."/".$photo_stream ; ?>" alt="<?php echo stripslashes(trim($ResStream["nom_stream"])) ; ?>">
												
												<img class="lazyload img-2 img-responsive" data-sizes="auto" src="image/stream/<?php echo $ImgLiveOrReplay ; ?>" data-src="image/stream/<?php echo $ImgLiveOrReplay ; ?>" alt="<?php echo stripslashes(trim($ResStream["nom_stream"])) ; ?>">
											<?php
											if(stripslashes(trim($ResStream["etat_stream"]))!=0)
											{
											?>
											</a>
											<?php
											}
											?>
											
										</div>
										<!--Sale Label-->
										
											<span class="label label-<?php echo $ClassLiveOrReplay ; ?>"><?php echo $TxtLiveOrReplay ; ?></span>
										<!--full quick view block-->
											<?php
											if(stripslashes(trim($ResStream["etat_stream"]))==0 && !empty(stripslashes(trim($ResStream["date_heure_start_prevue"]))))
											{
											$DateHeureEnd =  date("Y-m-d H:i", strtotime(stripslashes(trim($ResStream["date_heure_start_prevue"])))) ; 
											$DiffInSecond =  strtotime($DateHeureEnd) - strtotime($NOW) ;
											?>
											<div class="countdown_box">
												<div class="countdown_inner">
													<div class="CountDownStartStream-<?php echo stripslashes(trim($ResStream["id_streaming"])) ; ?>"></div>
												</div>
											</div>
											<script>
											var TimeStop = new Date(dateAdd(new Date(), 'second', <?php echo $DiffInSecond ; ?>).getFullYear(), dateAdd(new Date(), 'second', <?php echo $DiffInSecond ; ?>).getMonth(), dateAdd(new Date(), 'second', <?php echo $DiffInSecond ; ?>).getDate(), dateAdd(new Date(), 'second', <?php echo $DiffInSecond ; ?>).getHours(), dateAdd(new Date(), 'second', <?php echo $DiffInSecond ; ?>).getMinutes(),dateAdd(new Date(), 'second', <?php echo $DiffInSecond ; ?>).getSeconds());
											$('.CountDownStartStream-<?php echo stripslashes(trim($ResStream["id_streaming"])) ; ?>').countdown(TimeStop, function(event) {
											var $this = $(this).html(event.strftime(''
											   + '<div class="time-item time-day"><div class="num-time">%D</div><div class="name-time">Day </div></div>'
											   + '<div class="time-item time-hour"><div class="num-time">%H</div><div class="name-time">Hour </div></div>'
											   + '<div class="time-item time-min"><div class="num-time">%M</div><div class="name-time">Min </div></div>'
											   + '<div class="time-item time-sec"><div class="num-time">%S</div><div class="name-time">Sec </div></div>'));
											});
											
											
											</script>
											<?php
											}
											?>
									</div>
									
									
										
										<div class="right-block">
										  <div class="caption">
											
											<h4>
											<?php
											if(stripslashes(trim($ResStream["etat_stream"]))!=0)
											{
											?>
											<a href="<?php echo $UrlLiveReplay ; ?>" target="<?php echo $TargetStream ; ?>" title="<?php echo stripslashes(trim($ResStream["nom_stream"])) ; ?>">
											<?php
											}
											?>
											
											<?php echo stripslashes(trim($ResStream["nom_stream"])) ; ?>
											<?php
											if(stripslashes(trim($ResStream["etat_stream"]))!=0)
											{
											?>
											</a>
											<?php
											}
											?>
											</h4>
											<p class="price"> <span class="price-new"><a href="profile.php?ProfileId=<?php echo stripslashes(trim($ResStream["id_influenceur"])) ; ?>"><?php echo stripslashes(trim($ResStream["nom_prenom_influencer"])) ; ?></a></span> 
											
											<span class="price-normal"><?php echo $DateTimeStartStreamAgo ; ?></span>
											
											</p>
										  </div>
										</div>
										
										
										<?php
										if(stripslashes(trim($ResStream["etat_stream"]))!=0)
										{
										?>
										 <div class="button-group">
												<button class="camera btn-button" type="button" data-toggle="tooltip" title="Go <?php echo $TxtLiveOrReplay ; ?>" onclick="window.open('<?php echo $UrlLiveReplay ; ?>', '<?php echo $TargetStream ; ?>')"><i class="fa fa-video-camera"></i></button>
												 </div>
										<?php
										}
										?>
									
									
									</div>
                                  
									
                                  
									<?php
									}
									?>
								</div>
                              </div>
                            </div>
                            <!--/.modcontent--> 
                          </div>
						  <?php
						  }
						   mysqli_free_result($SqlStream);
						  ?>
                          <!-- End Mod Streams --> 

						  
                          <!-- Mod Hot Deals -->
                          <div class="module so-deals">
                            <h3 class="modtitle"><span>Hot Deals</span></h3>
                            <div class="modcontent">
                              <div class="so-deal modcontent products-list grid clearfixbutton-type1 style2">
                                <div class="extraslider-inner product-layout deal-slider" id="hotdeal-slider">
								
									<?php
									$GetProduit = GetProduit("./", $FlagProduit="Promotion", $IdCategorie=0, $IdOneProduit=0, $CodeStreaming='', $LimitShowProduit=0) ;	
									foreach ($GetProduit as $IdProduitCurrent => $ProduitInfo)
									{	
										$TabIdProduit = explode("-", $IdProduitCurrent);
										$SrcPrd = $TabIdProduit[0] ;
										$IdProduit =  $TabIdProduit[1] ;
									?>
									
								
									
									<div class="product-thumb transition product-item-container">
									<div class="left-block">
										<div class="product-image-container second_img ">
											
											<?php
											if($SrcPrd=='SW')
											{
											$NumImage = 0 ;
											$SqlProduitPhoto = mysqli_query($CNX_ZEN, "SELECT fichier_photo from produit_galerie_photo WHERE id_produit='".$IdProduit."' AND etat_activer='1' AND etat_delete='0' ORDER BY ordre_photo, id_produit_galerie_photo ASC LIMIT 2") ;
											if(mysqli_num_rows($SqlProduitPhoto)>0)
											{
												while($ResProduitPhoto = mysqli_fetch_array ($SqlProduitPhoto))
												{
												$NumImage++ ;
												?>	
												
												<img data-src="<?php echo $_SESSION["ROOTDOCUMENTWEBSITE"].$DOSSIER_GALERIE_PHOTO_PRODUIT."/".stripslashes(trim($ResProduitPhoto["fichier_photo"])) ; ?>" src="<?php echo $_SESSION["ROOTDOCUMENTWEBSITE"].$DOSSIER_GALERIE_PHOTO_PRODUIT."/".stripslashes(trim($ResProduitPhoto["fichier_photo"])) ; ?>"  alt="<?php echo $GetProduit[$IdProduitCurrent]["nom_produit"] ; ?>" class="img-<?php echo $NumImage ; ?> img-responsive" onclick="window.open('product.php?ProductId=<?php echo $IdProduitCurrent ; ?>','_self')" style="cursor:pointer;" />
												
												<?php
												}
												?>
											<?php
											}
											mysqli_free_result($SqlProduitPhoto);
											}
											else
											{
											?>
												<img data-src="<?php echo $GetProduit[$IdProduitCurrent]["fichier_photo1"] ; ?>" src="<?php echo $GetProduit[$IdProduitCurrent]["fichier_photo1"] ; ?>"  alt="<?php echo $GetProduit[$IdProduitCurrent]["nom_produit"] ; ?>" class="img-1 img-responsive" onclick="window.open('product.php?ProductId=<?php echo $IdProduitCurrent ; ?>','_self')" style="cursor:pointer;" />
												
												<img data-src="<?php echo $GetProduit[$IdProduitCurrent]["fichier_photo2"] ; ?>" src="<?php echo $GetProduit[$IdProduitCurrent]["fichier_photo2"] ; ?>"  alt="<?php echo $GetProduit[$IdProduitCurrent]["nom_produit"] ; ?>" class="img-2 img-responsive" onclick="window.open('product.php?ProductId=<?php echo $IdProduitCurrent ; ?>','_self')" style="cursor:pointer;" />
											<?php
											}
											?>
											
										</div>
										<!--Sale Label-->
										
										<?php
											if($GetProduit[$IdProduitCurrent]["avaibility"]>0)
											{
											?>
											<span class="label label-sale">Sale</span>
											<?php
											}
											?>
											
											<?php
											if($GetProduit[$IdProduitCurrent]["etat_future"]==1)
											{
											?>
											<span class="label label-new">New</span>
											<?php
											}
											?>
										<!--full quick view block-->
											<?php
											if(!empty($GetProduit[$IdProduitCurrent]["date_debut_promo"]) and !empty($GetProduit[$IdProduitCurrent]["date_fin_promo"]) && date('Y-m-d') >= $GetProduit[$IdProduitCurrent]["date_debut_promo"] and date('Y-m-d') <= $GetProduit[$IdProduitCurrent]["date_fin_promo"])
											{
											$DateHeureEnd =  date("Y-m-d 00:00:00", strtotime($GetProduit[$IdProduitCurrent]["date_fin_promo"])) ; 
											$DiffInSecond =  strtotime($DateHeureEnd) - strtotime($NOW) ;
											?>
											<div class="countdown_box">
												<div class="countdown_inner">
													<div class="CountDownHotProduct-<?php echo $IdProduitCurrent ; ?>"></div>
												</div>
											</div>
											<script>
											var TimeStop = new Date(dateAdd(new Date(), 'second', <?php echo $DiffInSecond ; ?>).getFullYear(), dateAdd(new Date(), 'second', <?php echo $DiffInSecond ; ?>).getMonth(), dateAdd(new Date(), 'second', <?php echo $DiffInSecond ; ?>).getDate(), dateAdd(new Date(), 'second', <?php echo $DiffInSecond ; ?>).getHours(), dateAdd(new Date(), 'second', <?php echo $DiffInSecond ; ?>).getMinutes(),dateAdd(new Date(), 'second', <?php echo $DiffInSecond ; ?>).getSeconds());
											$('.CountDownHotProduct-<?php echo $IdProduitCurrent ; ?>').countdown(TimeStop, function(event) {
											var $this = $(this).html(event.strftime(''
											   + '<div class="time-item time-day"><div class="num-time">%D</div><div class="name-time">Day </div></div>'
											   + '<div class="time-item time-hour"><div class="num-time">%H</div><div class="name-time">Hour </div></div>'
											   + '<div class="time-item time-min"><div class="num-time">%M</div><div class="name-time">Min </div></div>'
											   + '<div class="time-item time-sec"><div class="num-time">%S</div><div class="name-time">Sec </div></div>'));
											});
											
											
											</script>
											<?php
											}
											?>
									</div>
									
									
									
									
									
										
										
										
										<div class="right-block">
										  <div class="caption">
											<div class="rating"> 
											<?php
											for ($i_rating = 1; $i_rating <= 5; $i_rating++)
											{
												if($i_rating<=ceil($GetProduit[$IdProduitCurrent]["AverageRating"]))
												{
											?>
												<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span> 
												<?php
												}
												else
												{
											?>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<?php
												}
											}
											?>
											
											
											
											</div>
											<h4><a href="product.php?ProductId=<?php echo $IdProduitCurrent ; ?>" target="_self" title="<?php echo $GetProduit[$IdProduitCurrent]["nom_produit"] ; ?>"><?php echo $GetProduit[$IdProduitCurrent]["nom_produit"] ; ?></a></h4>
											<p class="price"> <span class="price-new"><?php echo  number_format($GetProduit[$IdProduitCurrent]["prix_final_usd"] * $_SESSION["DEFAULT_DEVISE_SELECTED_TAUX_CHANGE"], $_SESSION["CHIFFRE_APRES_VIRGULE"], '.', ' ') ; ?> <?php echo $_SESSION["DEFAULT_DEVISE_SELECTED_ISO"] ; ?></span> 
											<?php
											if($GetProduit[$IdProduitCurrent]["prix_final_ori"]<$GetProduit[$IdProduitCurrent]["prix_ori"])
											{
											?>
											<span class="price-old"><?php echo  number_format($GetProduit[$IdProduitCurrent]["prix_usd"] * $_SESSION["DEFAULT_DEVISE_SELECTED_TAUX_CHANGE"], $_SESSION["CHIFFRE_APRES_VIRGULE"], '.', ' ') ; ?></span>
											<?php
											}
											?>
											</p>
										  </div>
										</div>
										
										<div class="button-group">
												<button class="wishlist btn-button" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('42');"><i class="fa fa-heart"></i></button>
												
												
												<a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title="" data-fancybox-type="iframe" href="quickview.php?ProductId=<?php echo $IdProduitCurrent ; ?>" data-original-title="Quickview"> <i class="fa fa-search"></i> </a> </div>
									</div>
                                  
                                  
									<?php
									}
									?>
								</div>
                              </div>
                            </div>
                            <!--/.modcontent--> 
                          </div>
                          <!-- End Mod Hot Deals --> 
						  
						  
						  <!-- Mod Featured Product -->
                          <div class="module so-deals">
                            <h3 class="modtitle"><span>Featured Product</span></h3>
                            <div class="modcontent">
                              <div class="so-deal modcontent products-list grid clearfixbutton-type1 style2">
                                <div class="extraslider-inner product-layout deal-slider" id="featured-slider">
								
									<?php
									$GetProduit = GetProduit("./", $FlagProduit="Future", $IdCategorie=0, $IdOneProduit=0, $CodeStreaming='', $LimitShowProduit=0) ;	
									foreach ($GetProduit as $IdProduitCurrent => $ProduitInfo)
									{	
										$TabIdProduit = explode("-", $IdProduitCurrent);
										$SrcPrd = $TabIdProduit[0] ;
										$IdProduit =  $TabIdProduit[1] ;
									?>
									
									<div class="product-thumb transition product-item-container">
										
											
										
									<div class="left-block">
										<div class="product-image-container second_img ">
											
											<?php
											if($SrcPrd=='SW')
											{
											$NumImage = 0 ;
											$SqlProduitPhoto = mysqli_query($CNX_ZEN, "SELECT fichier_photo from produit_galerie_photo WHERE id_produit='".$IdProduit."' AND etat_activer='1' AND etat_delete='0' ORDER BY ordre_photo, id_produit_galerie_photo ASC LIMIT 2") ;
											if(mysqli_num_rows($SqlProduitPhoto)>0)
											{
												while($ResProduitPhoto = mysqli_fetch_array ($SqlProduitPhoto))
												{
												$NumImage++ ;
												?>	
												
												<img data-src="<?php echo $_SESSION["ROOTDOCUMENTWEBSITE"].$DOSSIER_GALERIE_PHOTO_PRODUIT."/".stripslashes(trim($ResProduitPhoto["fichier_photo"])) ; ?>" src="<?php echo $_SESSION["ROOTDOCUMENTWEBSITE"].$DOSSIER_GALERIE_PHOTO_PRODUIT."/".stripslashes(trim($ResProduitPhoto["fichier_photo"])) ; ?>"  alt="<?php echo $GetProduit[$IdProduit]["nom_produit"] ; ?>" class="img-<?php echo $NumImage ; ?> img-responsive" onclick="window.open('product.php?ProductId=<?php echo $IdProduitCurrent ; ?>','_self')" style="cursor:pointer;" />
												
												<?php
												}
												?>
											<?php
											}
											mysqli_free_result($SqlProduitPhoto);
											}
											else
											{
											?>
												<img data-src="<?php echo $GetProduit[$IdProduitCurrent]["fichier_photo1"] ; ?>" src="<?php echo $GetProduit[$IdProduitCurrent]["fichier_photo1"] ; ?>"  alt="<?php echo $GetProduit[$IdProduitCurrent]["nom_produit"] ; ?>" class="img-1 img-responsive" onclick="window.open('product.php?ProductId=<?php echo $IdProduitCurrent ; ?>','_self')" style="cursor:pointer;" />
												
												<img data-src="<?php echo $GetProduit[$IdProduitCurrent]["fichier_photo2"] ; ?>" src="<?php echo $GetProduit[$IdProduitCurrent]["fichier_photo2"] ; ?>"  alt="<?php echo $GetProduit[$IdProduitCurrent]["nom_produit"] ; ?>" class="img-2 img-responsive" onclick="window.open('product.php?ProductId=<?php echo $IdProduitCurrent ; ?>','_self')" style="cursor:pointer;" />
											
											<?php
											}
											?>
											
											
											
											
											
										</div>
										<!--Sale Label-->
										
											<?php
											if($GetProduit[$IdProduitCurrent]["avaibility"]>0)
											{
											?>
											<span class="label label-sale">Sale</span>
											<?php
											}
											?>
											
											<?php
											if($GetProduit[$IdProduitCurrent]["etat_future"]==1)
											{
											?>
											<span class="label label-new">New</span>
											<?php
											}
											?>
										<!--full quick view block-->
												<?php
												if(!empty($GetProduit[$IdProduitCurrent]["date_debut_promo"]) and !empty($GetProduit[$IdProduitCurrent]["date_fin_promo"]) && date('Y-m-d') >= $GetProduit[$IdProduitCurrent]["date_debut_promo"] and date('Y-m-d') <= $GetProduit[$IdProduitCurrent]["date_fin_promo"])
												{
												$DateHeureEnd =  date("Y-m-d 00:00:00", strtotime($GetProduit[$IdProduitCurrent]["date_fin_promo"])) ; 
												$DiffInSecond =  strtotime($DateHeureEnd) - strtotime($NOW) ;
												?>
												<div class="countdown_box">
													<div class="countdown_inner">
														<div class="CountDownFeaturedProduct-<?php echo $IdProduitCurrent ; ?>"></div>
													</div>
												</div>
												<script>
												var TimeStop = new Date(dateAdd(new Date(), 'second', <?php echo $DiffInSecond ; ?>).getFullYear(), dateAdd(new Date(), 'second', <?php echo $DiffInSecond ; ?>).getMonth(), dateAdd(new Date(), 'second', <?php echo $DiffInSecond ; ?>).getDate(), dateAdd(new Date(), 'second', <?php echo $DiffInSecond ; ?>).getHours(), dateAdd(new Date(), 'second', <?php echo $DiffInSecond ; ?>).getMinutes(),dateAdd(new Date(), 'second', <?php echo $DiffInSecond ; ?>).getSeconds());
												$('.CountDownFeaturedProduct-<?php echo $IdProduitCurrent ; ?>').countdown(TimeStop, function(event) {
												var $this = $(this).html(event.strftime(''
												   + '<div class="time-item time-day"><div class="num-time">%D</div><div class="name-time">Day </div></div>'
												   + '<div class="time-item time-hour"><div class="num-time">%H</div><div class="name-time">Hour </div></div>'
												   + '<div class="time-item time-min"><div class="num-time">%M</div><div class="name-time">Min </div></div>'
												   + '<div class="time-item time-sec"><div class="num-time">%S</div><div class="name-time">Sec </div></div>'));
												});
												
												
												</script>
												<?php
												}
												?>
									</div>
									
									
										
										<div class="right-block">
										  <div class="caption">
											<div class="rating"> 
											<?php
											for ($i_rating = 1; $i_rating <= 5; $i_rating++)
											{
												if($i_rating<=ceil($GetProduit[$IdProduitCurrent]["AverageRating"]))
												{
											?>
												<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span> 
												<?php
												}
												else
												{
											?>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<?php
												}
											}
											?>
											</div>
											<h4><a href="product.php?ProductId=<?php echo $IdProduitCurrent ; ?>" target="_self" title="<?php echo $GetProduit[$IdProduitCurrent]["nom_produit"] ; ?>"><?php echo $GetProduit[$IdProduitCurrent]["nom_produit"] ; ?></a></h4>
											<p class="price"> <span class="price-new"><?php echo  number_format($GetProduit[$IdProduitCurrent]["prix_final_usd"] * $_SESSION["DEFAULT_DEVISE_SELECTED_TAUX_CHANGE"], $_SESSION["CHIFFRE_APRES_VIRGULE"], '.', ' ') ; ?> <?php echo $_SESSION["DEFAULT_DEVISE_SELECTED_ISO"] ; ?></span> 
											<?php
											if($GetProduit[$IdProduitCurrent]["prix_final_ori"]<$GetProduit[$IdProduitCurrent]["prix_ori"])
											{
											?>
											<span class="price-old"><?php echo  number_format($GetProduit[$IdProduitCurrent]["prix_usd"] * $_SESSION["DEFAULT_DEVISE_SELECTED_TAUX_CHANGE"], $_SESSION["CHIFFRE_APRES_VIRGULE"], '.', ' ') ; ?></span>
											<?php
											}
											?>
											</p>
										  </div>
										</div>
										
										<div class="button-group">
												<button class="wishlist btn-button" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('42');"><i class="fa fa-heart"></i></button>
												
												
												<a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title="" data-fancybox-type="iframe" href="quickview.php?ProductId=<?php echo $IdProduitCurrent ; ?>" data-original-title="Quickview"> <i class="fa fa-search"></i> </a> </div>
									</div>
                                  
                                  
									<?php
									}
									?>
								</div>
                              </div>
                            </div>
                            <!--/.modcontent--> 
                          </div>
                          <!-- End Mod Featured Product --> 

						  
                        </div>
                      </div>
                    
					
					
                  
					</div>
                  </div>
				  
				  
				 <!--Block Spotlight4  -->
				<div class="so-spotlight4">
					<div class="container">
						<div class="block-brand">
							<div class="brand-slider">
								<?php
								$SqlMarque = mysqli_query($CNX_ZEN, "SELECT nom_".$_SESSION["LANGUE_SITE_CODE"]." AS nom_marque, logo, id_marque_ecommerce FROM marque_ecommerce WHERE etat_activer='1' AND etat_delete='0' ORDER BY date_heure_last_update DESC");
								while ($ResMarque = mysqli_fetch_array ($SqlMarque))
								{
									if(stripslashes(trim($ResMarque["logo"]))==NULL)
									{
									$photo_marque =  $DEFAULT_LOGO_MARQUE ;
									}
									else
									{
									$photo_marque =  stripslashes(trim($ResMarque["logo"])) ;
									}	
								?>
								<div class="item-manu">
									<a href="#" title="<?php echo  stripslashes(trim($ResMarque["nom_marque"])) ; ?>">
										<img class="lazyload" data-sizes="auto" src="<?php echo $_SESSION["ROOTDOCUMENTWEBSITE"].$DOSSIER_LOGO_MARQUE."/".$photo_marque ; ?>" data-src="<?php echo $_SESSION["ROOTDOCUMENTWEBSITE"].$DOSSIER_LOGO_MARQUE."/".$photo_marque ; ?>" alt="<?php echo  stripslashes(trim($ResMarque["nom_marque"])) ; ?>">
									</a>
								</div>
								<?php
								}
								mysqli_free_result($SqlMarque);
								?>
								
							</div>
						</div>
					</div>
				</div> 
	  
				<!--Block Spotlight3  -->
                  <div class="so-spotlight3">
                    <div class="container">
                      <ul class="mudule list-services row">
                        <li class="item-service col-lg-4 col-md-4 col-sm-4 col-xs-12"><a title="Free Shipping" href="#"><img class="lazyload" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="image/demo/cms/free-shipping.png" alt="Free Shipping"></a></li>
                        <li class="item-service col-lg-4 col-md-4 col-sm-4 col-xs-12"><a title="Guaranteed" href="#"><img class="lazyload" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="image/demo/cms/guaranteed.png" alt="Guaranteed"></a></li>
                        <li class="item-service col-lg-4 col-md-4 col-sm-4 col-xs-12"><a title="Deal" href="#"><img class="lazyload" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="image/demo/cms/deal.png" alt="Deal"></a></li>
                      </ul>
                    </div>
                  </div>
                </main >
                <!-- //Main Container --> 
                

                <?php
				include "inc/footer.php";
				?>
                
              </div>
				<?php
				include "inc/social-widgets.php";
				include "inc/define-theme.php";
				?>
              
              <!-- Preloading Screen -->
              <div id="loader-wrapper">
                <div id="loader"></div>
                <div class="loader-section section-left"></div>
                <div class="loader-section section-right"></div>
              </div>
              <!-- End Preloading Screen --> 
              
            </div>
          </div>
          
          <!-- end: page --> 
        </section>
    </div>
	<?php
    include "inc/c-right.php";
    ?>
</section>

<script src="navbar/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script> 
<script src="navbar/vendor/popper/umd/popper.min.js"></script> 
<script src="navbar/vendor/nanoscroller/nanoscroller.js"></script> 
<!-- Theme Base, Components and Settings --> 
<script src="navbar/js/theme.js"></script> 
<!-- Theme Initialization Files --> 
<script src="navbar/js/theme.init.js"></script> 
<script type="text/javascript" src="js/themejs/application.js"></script>
<script type="text/javascript" src="js/themejs/FormValidate.js"></script>
</body>
</html>