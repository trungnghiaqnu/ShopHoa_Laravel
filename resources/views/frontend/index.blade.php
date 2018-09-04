@extends('frontend.master')
@section('title','Store')
@section('main')	
 	 	
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="row">
						@foreach ($product as $item)
							<div class="col-sm-4 text-xs-center">
							
									<div class="mottinchuan mb-3  wow  fadeInUp">
											<a href="{{ asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}"><img class="card-img-top img-fluid" width="100px" src="{{ asset('storage/app/img/'.$item->prod_img )}}" alt="Card image cap"></a>
											<a href="{{ asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}" class="tieudetin1 fontoswarld">{{ $item->prod_name }} </a>
											<p class="fontroboto">{{ number_format($item->prod_price) }}đ</p>
									</div>
						
							</div>	
						@endforeach
						
					</div>
					<div class="page" style="align:center">{{ $product->links() }}</div>
					<hr>
					<h3 class="fontdancing"> Sản phẩm nổi bật</h3>
					<hr>
					<div class="row">
						@foreach ($featured as $items)
							<div class="col-sm-4 text-xs-center">
							
									<div class="mottinchuan mb-3  wow  fadeInUp">
											<a href="{{ asset('detail/'.$items->prod_id.'/'.$items->prod_slug.'.html')}}"><img class="card-img-top img-fluid" src="{{ asset('storage/app/img/'.$items->prod_img )}}" alt="Card image cap"></a>
											<a href="{{ asset('detail/'.$items->prod_id.'/'.$items->prod_slug.'.html')}}" class="tieudetin1 fontoswarld">{{ $items->prod_name }} </a>
											<p class="fontroboto">{{ number_format($items->prod_price) }}đ</p>
									</div>
						
							</div>	
						@endforeach
						
							
						
						
					</div>
					
				</div> <!-- HET COT 9 -->

				<div class="col-sm-3">
					

					<div class="khoilistlink   wow  fadeInUp">
						<h3 class="fontoswarld">Category </h3>
							@foreach ($category as $cate)
								<ul class="fontroboto">
										<li><a href="{{ asset('category/'.$cate->cate_id.'/'.$cate->cate_slug.'.html') }}">{{ $cate->cate_name }} </a></li>
								</ul>
							@endforeach
					</div><!--  	het listlink  -->
				</div>  <!-- HET COT 3 -->
			
			</div>
			
		</div>		
@stop

		