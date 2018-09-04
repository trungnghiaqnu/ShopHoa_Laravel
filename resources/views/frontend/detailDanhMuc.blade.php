
@extends('frontend.master')
@section('title','Chi tiết danh muc')
@section('main')	


<div class="container">
    <div class="row">
        <div class="col-sm-9">
            <div class="row">
                    <h3 class="fontoswarld">{{ $catename->cate_name }}</h3>
            </div>
           <hr>
           <hr>
            <div class="row">
                @foreach ($itemDanhMuc as $item)
          
                    <div class="col-sm-4 text-xs-center">
                    
                            <div class="mottinchuan mb-3  wow  fadeInUp">
                                    <a href="{{ asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}"><img class="card-img-top img-fluid" src="{{ asset('storage/app/img/'.$item->prod_img )}}" alt="Card image cap"></a>
                                    <a href="{{ asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}" class="tieudetin1 fontoswarld">{{ $item->prod_name }} </a>
                                    <p class="fontroboto">{{ number_format($item->prod_price) }}đ</p>
                            </div>
                
                    </div>	
                @endforeach
            </div>
        </div> <!-- HET COT 9 -->
        <div class="col-sm-3">
           

            <div class="khoilistlink wow  fadeInUp">
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


					<!-- end main -->
@stop			