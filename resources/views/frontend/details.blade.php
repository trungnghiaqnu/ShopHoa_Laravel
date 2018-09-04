
@extends('frontend.master')
@section('title','Chi tiết sản phẩm')
@section('main')	
<style>
	.comment h3{
		margin-top: 15px;
		font-size: 24px;	
		color: #ff9600;
		text-transform: uppercase;
	}
	.form-control{
		border-radius: 0px;
	}

	.btn:hover{
		background: #ff9600;
	}
	.comment{
		padding: 0px;
	}
	.comment-list ul{
		border-bottom: 1px dotted #cdcdcd;
		padding-bottom: 10px;
	
	}
	.comment-list li{
		list-style: none;
		color: #666;
		line-height: 22px;
		font-size: 12px;
	}
	li.com-title{
		color: #000;
		font-weight: bold;
		text-transform: capitalize;
		font-size: 15px;
	
	}
	li.com-details{
		font-size: 17px;
	}
	
	li.com-title span{
		font-weight: normal;
		color: #999;
	}
	.comment-list{
		margin-top: 25px;
		text-align: justify;
		
	}
</style>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div class="row">
					<div class="col-sm-5">
							<a ><img class="card-img-top img-fluid" src="{{ asset('storage/app/img/'.$item->prod_img )}}" alt="Card image cap"></a>
					</div>	
					<div class="col-sm-4">
						<h4>{{ $item->prod_name }}</h4>
						<p class="fontroboto">Giá: {{ number_format($item->prod_price) }} đ</p>
						<p class="fontroboto">Tình trạng: @if($item->prod_status==1) Còn hàng @else Hết hàng @endif </p>
						<p class="fontroboto">Mô tả: {{ $item->prod_description }}</p>
						<a href="{{ asset('cart/add/'.$item->prod_id)}}" class="btn btn-outline-success btn-lg">Add Cart</a>
					
					</div>
					
				</div>	
			</div>
			<div class="col-sm-3">
				<div class="khoilistlink  wow  fadeInUp">
					<h3 class="fontoswarld">Category </h3>
						@foreach ($category as $cate)
							<ul class="fontroboto">
									<li><a href="{{ asset('category/'.$cate->cate_id.'/'.$cate->cate_slug.'.html') }}">{{ $cate->cate_name }} </a></li>
							</ul>
						@endforeach
				</div><!--  	het listlink  -->
			</div>  <!-- HET COT 3 -->
		</div>
		<hr>
		<hr>
	
						<div class="comment-list">
								@foreach ($comment as $comments)
									<ul>
										<li class="com-title">
											{{ $comments->com_name }}
											<br>
											<span>{{ date('d/m/Y H:i',strtotime($comments->created_at)) }}</span>	
										</li>
										<li class="com-details">
											{{ $comments->com_content }}
										</li>
									</ul>
								@endforeach
						</div>

						<div class="comment">
							<h3>Bình luận</h3>
							<div class="col-md-9 comment">
								<form method='post'>
									<div class="form-group">
										<label for="email">Email:</label>
										<input required type="email" class="form-control" id="email" name="email">
									</div>
									<div class="form-group">
										<label for="name">Tên:</label>
										<input required type="text" class="form-control" id="name" name="name">
									</div>
									<div class="form-group">
										<label for="cm">Bình luận:</label>
										<textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
									</div>
									<div class="form-group text-right">
										<button type="submit" class="btn btn-default">Gửi</button>
									</div>
									{{ csrf_field() }}
								</form>
							</div>
						</div>
						
					</div>		
	</div>			
					<!-- end main -->
@stop			