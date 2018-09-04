@extends('backend.master')
@section('title','Sửa Sản Phẩm')
@section('main')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Sửa sản phẩm</div>
					<div class="panel-body">
						<form method="post" enctype="multipart/form-data">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Tên sản phẩm</label>
										<input required type="text" name="name" class="form-control" value="{{ $product->prod_name }}">
									</div>
									<div class="form-group" >
										<label>Giá sản phẩm</label>
										<input required type="number" name="price" class="form-control" value="{{ $product->prod_price }}">
									</div>
									<div class="form-group" >
										<label>Ảnh sản phẩm</label>
										<input id="img" type="file" name="img" class="form-control " onchange="changeImg(this)">
					                    <img id="avatar" class="thumbnail" width="300px" src="{{asset('storage/app/img/'.$product->prod_img  )}}">
									</div>
									
				
									<div class="form-group" >
										<label>Trạng thái</label>
										<select required name="status" class="form-control">
											<option value="1" @if ($product->prod_status==1) checked
												@endif>Còn hàng</option>
											<option value="0" @if ($product->prod_status==0) checked
												@endif>Hết hàng</option>
					                    </select>
									</div>
									<div class="form-group" >
										<label>Miêu tả</label>
										<textarea class="ckeditor" required name="description" >{{ $product->prod_description }}</textarea>
										
									</div>
									<div class="form-group" >
										<label>Danh mục</label>
										<select required name="cate" class="form-control">
											@foreach ($cate as $cate)
												<option value="{{ $cate->cate_id }}" 
													@if ($product->prod_cate == $cate->cate_id) selected
													@endif>{{ $cate->cate_name }}
												</option>
											@endforeach
											
					                    </select>
									</div>
									<div class="form-group" >
										<label>Sản phẩm nổi bật</label><br>
										Có: <input type="radio" name="featured" value="1" 
										@if ($product->prod_featured==1) selected @endif>
										Không: <input type="radio" checked name="featured" value="0" 
										@if ($product->prod_featured==0) selected @endif>
									</div>
									<input type="submit" name="submit" value="Update" class="btn btn-primary">
									<a href="{{ asset('admin/Product') }}" class="btn btn-danger">Hủy bỏ</a>
								</div>
							</div>
							{{ csrf_field() }}
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		<script>
			CKEDITOR.replace( 'description', {
			   filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
			   filebrowserImageBrowseUrl:  '/ckfinder/ckfinder.html?Type=Images',
			   });
	</script>
	</div>	<!--/.main-->
@stop