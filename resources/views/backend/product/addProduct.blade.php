@extends('backend.layouts.backend-master')
@section('backend-main')

<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Trang chủ</a></li>
    <li><a href="#">Sản phẩm</a></li>
    <li class="active">Thêm sản phẩm</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <form enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{route('admin.post.create.product')}}">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Thêm</strong> sản phẩm</h3>   
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Danh mục</label>
                                    <div class="col-md-9">
                                        <select class="form-control select" name="pro_cate_id" id="">
                                            <option value="">Chọn thương hiệu</option>
                                            @if(isset($categories))
                                            @foreach($categories as $category )
                                            <option value="{{$category->id}} 
                                                {{ old('pro_cate_id',isset($product->pro_cate_id) ? $product->pro_cate_id : '')== $category->id ? "selected='selected'":"" }}">
                                                {{$category->name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            @if($errors->has('pro_cate_id'))
                                            <div class="help-block">
                                                {{ $errors->first('pro_cate_id') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Loại</label>
                                        <div class="col-md-9">
                                            <select class="form-control select" name="pro_type">
                                                <option>Vui lòng chọn loại laptop</option>
                                                <option>Game</option>
                                                <option>Design</option>
                                                <option>Office</option>
                                                <option>Compact</option>
                                                <option>Business</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Tên sản phẩm</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control" name="pro_name"/>
                                            </div>
                                            @if($errors->has('pro_name'))
                                            <div class="help-block">
                                                {!!$errors->first('pro_name')!!}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Giá</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-dollar"></span></span>
                                                <input type="text" class="form-control" name="pro_price" />
                                            </div>
                                            @if($errors->has('pro_price'))
                                            <div class="help-block">
                                                {!!$errors->first('pro_price')!!}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Số Lượng</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-info"></span></span>
                                                <input type="text" class="form-control" name="pro_amount" />
                                            </div>
                                            @if($errors->has('pro_amount'))
                                            <div class="help-block">
                                                {!!$errors->first('pro_amount')!!}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Mô tả</label>
                                        <div class="col-md-9 col-xs-12">
                                            <textarea class="form-control" rows="5" name="pro_content"></textarea>
                                            @if($errors->has('pro_content'))
                                            <div class="help-block">
                                                {!!$errors->first('pro_content')!!}
                                            </div>
                                            @endif
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Hình ảnh</label>
                                        <div class="col-md-9">
                                            <input type="file" class="fileinput btn-primary" name="pro_image" id="filename"
                                            title="Chọn hình ảnh" />
                                            @if($errors->has('pro_image'))
                                            <div class="help-block">
                                                {!!$errors->first('pro_image')!!}
                                            </div>
                                            @endif
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-offset-3 col-md-9">
                                            <img id="img_upload" class="img img-responsive" src="" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Bộ xử lý CPU</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-info"></span></span>
                                                <input type="text" class="form-control" name="cpu"/>
                                                
                                            </div>
                                            @if($errors->has('pro_detail'))
                                            <div class="help-block">
                                                {!!$errors->first('pro_detail')!!}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Bộ nhớ RAM</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-info"></span></span>
                                                <input type="text" class="form-control" name="ram"/>
                                            </div>
                                            @if($errors->has('pro_detail'))
                                            <div class="help-block">
                                                {!!$errors->first('pro_detail')!!}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Màn hình</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-info"></span></span>
                                                <input type="text" class="form-control" name="screen"/>
                                            </div>
                                            @if($errors->has('pro_detail'))
                                            <div class="help-block">
                                                {!!$errors->first('pro_detail')!!}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Card màn hình</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-info"></span></span>
                                                <input type="text" class="form-control" name="card"/>
                                            </div>
                                            @if($errors->has('pro_detail'))
                                            <div class="help-block">
                                                {!!$errors->first('pro_detail')!!}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Ổ cứng</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-info"></span></span>
                                                <input type="text" class="form-control" name="harddrive"/>
                                            </div>
                                            @if($errors->has('pro_detail'))
                                            <div class="help-block">
                                                {!!$errors->first('pro_detail')!!}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Kích thước và trọng lượng</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-info"></span></span>
                                                <input type="text" class="form-control" name="weight"/>
                                            </div>
                                            @if($errors->has('pro_detail'))
                                            <div class="help-block">
                                                {!!$errors->first('pro_detail')!!}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Camera</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-info"></span></span>
                                                <input type="text" class="form-control" name="camera"/>
                                            </div>
                                            @if($errors->has('pro_detail'))
                                            <div class="help-block">
                                                {!!$errors->first('pro_detail')!!}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Cổng kết nối</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-info"></span></span>
                                                <input type="text" class="form-control" name="port"/>
                                            </div>
                                            @if($errors->has('pro_detail'))
                                            <div class="help-block">
                                                {!!$errors->first('pro_detail')!!}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Pin</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-info"></span></span>
                                                <input type="text" class="form-control" name="pin"/>
                                            </div>
                                            @if($errors->has('pro_detail'))
                                            <div class="help-block">
                                                {!!$errors->first('pro_detail')!!}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            {{-- <button class="btn btn-default">Xóa trường</button> --}}
                            <button type="submit" class="btn btn-primary pull-right">Thêm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT WRAPPER -->
    @stop