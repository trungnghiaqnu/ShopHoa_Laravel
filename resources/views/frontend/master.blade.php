<!DOCTYPE html>
<html lang="en"><head>
	<title>ShopHoa | @yield('title') </title>
	<meta charset="utf-8">
	<base href="{{ asset('public/frontend') }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700&amp;subset=vietnamese" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">
	


	<script type="text/javascript" src="style/bootstrap.js"></script>

 	<script type="text/javascript" src="style/isotope.pkgd.min.js"></script>
 	<script type="text/javascript" src="style/imagesloaded.pkgd.min.js"></script>
 	<script type="text/javascript" src="style/1.js"></script>

	<link rel="stylesheet" href="style/bootstrap.css">
	<link rel="stylesheet" href="style/font-awesome.css">
	<link rel="stylesheet" href="style/1.css">
 </head>
		<body >

			<div class="topheader">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 wow jello">
							<div class="mangxh float-sm-left text-xs-center text-sm-left">
									<a  href=" {{ asset('login') }}"><img width="30" src="{{ asset('login.png') }}" alt=""></a>
							</div>
							<div class="datban">
								Tư Vấn : +01226114548
							</div>
						</div>
						<div class="col-sm-5 ">
							<form role="search" action="{{ asset('search/') }}" method="GET">
								<div class="datban openingtop float-sm-right text-sm-left text-xs-center">
										<div class="phansearch  wow  fadeInUp">
												<input type="text" class="form-control phansearchct"  placeholder="Search" name="result">
												
											<button type="submit" class="iconsearch"><i class="fa fa-search"></i></button>
										
									</div>
								</div>
							</form>
						
						</div>
					</div> <!-- het row -->
				</div> <!-- het container -->
			</div> <!-- het topheader  -->
			<div class="logovamenu">
					<nav class="navbar navbar-light  fontroboto">
						<div class="container">    	
								<button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#mtren">
								
								</button>
								<div class="collapse navbar-toggleable-xs" id="mtren">
									<a class="navbar-brand text-xs-center text-sm-left" href="#"><img src="" alt=""></a>

									<ul class="nav navbar-nav float-sm-right">
										<li class="nav-item">
											<a class="nav-link" href="{{ asset('/') }}">Home  </a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#">Tin Tức</a>
										</li>
									
										<li class="nav-item">
											<a class="nav-link" href="#">Thông Tin</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="{{ asset('cart/show') }}">Giỏ Hàng</a>
										</li>
										<li class="nav-item ">
											<a class="nav-link btn btn-warning wow bounce" data-wow-iteration="3" href="{{ asset('cart/show') }}" ><img width="25px" src="{{asset('cart.png') }}" alt=""> {{ Cart::count() }}</a>
										</li>
									</ul>
								</div>
						</div> <!-- het container -->
					</nav>
			</div> <!-- het logo va menu -->
			<div class="tieudenews">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-xs-center wow  flipInY" data-wow-delay="0s">
									<div class="tdtintuchome ">
										<span class="fontdancing">Rất hân hạnh được đón</span>
										<h2 class="fontdancing"> tiếp quý khách</h2>
									</div>
								
						</div>
					</div>
				</div>
			</div>   <!-- HET TIEU DE DE NEWS -->

							<!--main-->
							@yield('main')
				
			<div class="footerbottom text-xs-center fontroboto wow bounce" data-wow-delay="0s">

						Nguyễn Trung Nghĩa
			</div>

		

		</body>
</html>