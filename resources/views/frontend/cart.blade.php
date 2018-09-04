
@extends('frontend.master')
@section('title','Giỏ hàng')
@section('main')	
<link rel="stylesheet" href="css/cart.css">
<script type="text/javascript">
    function updateCart(qty,rowId){//phương thức update có 2 tham số 
            $.get(
                '{{ asset('cart/update')}}',
                {qty:qty,rowId:rowId},
                function(){
                    location.reload();
                }
            )

    }
</script>
<style>
    .qty{
        width: 50px;
        border:snow;
    }
</style>

    <section class="cart">
        <div class="container">
                @if(Cart::count()>=1)
            <h2 class="text-xs-center ">Giỏ hàng của bạn</h2>
                <table class="table">
                        <tr>
                            <th>Ảnh mô tả</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Thành Tiền</th>
                            <th>Xóa</th>
                        </tr>
                   
                        @foreach ($item as $item)
                            <tr>
                                <td><img width="100px" class="img-responsive" src="{{ asset('storage/app/img/'.$item->options->img) }}"></td>
                                <td>{{ $item->name }}</td>
                                <td ><input class="qty" type="number" value="{{ $item->qty }}" onchange="updateCart(this.value,'{{ $item->rowId }}')"></td>
                                <td><span class="price">{{ number_format($item->price) }}</span></td>
                                <td><span class="price">{{ number_format($item->price*$item->qty) }} đ</span></td>
                                <td><a href="{{ asset('cart/delete/'.$item->rowId) }}" class="btn btn-danger">Xóa</a></td>
                            </tr>
                        @endforeach
                   
                </table>
            <div class="row" id="total-price">
                        <div class="col-md-6 col-sm-12 col-xs-12">										
                                Tổng thanh toán: <span class="total-price">{{ $total }} đ</span>
                                                                                                        
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <a href="{{ asset('/') }}" class="my-btn btn">Mua tiếp</a>
                            
                            <a href="{{ asset('cart/delete/all') }}" class="my-btn btn">Xóa giỏ hàng</a>
                        </div>
                    </div>
            </div>
            <div class="col-md-6">
                <div id="xac-nhan">
                        <h3>Xác nhận mua hàng</h3>
                        <form method="POST">
                            <div class="form-group">
                                <label for="email">Email address:</label>
                                <input required type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="name">Họ và tên:</label>
                                <input required type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại:</label>
                                <input required type="number" class="form-control"  id="phone" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="add">Địa chỉ:</label>
                                <input required type="text" class="form-control" id="add" name="add">
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-default">Thực hiện đơn hàng</button>
                            </div>
                            {{ csrf_field() }}
                        </form>
                </div>
            </div>
            @else 
            <div class="alert alert-info text-xs-center" role="alert">
                    <h2><strong>Giỏ hàng của bạn trống !</strong><a href="{{ asset('/') }}">Quay lại mua hàng</a></h2>
            </div>
            @endif
        </div>
    </section>
@stop