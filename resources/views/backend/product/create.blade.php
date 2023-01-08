@extends('backend.layouts.app')
@section('title') Sản phẩm @endsection
@section('css-custom.style')
    <link rel="stylesheet" href="{{ asset('backend_asset/plugins/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection
@section('content')
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Thêm mới</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('product.store')}}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Tên <span class="note">*</span></label>

                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                            @if ($errors && $errors->has('name'))
                                <p class="text-danger text-xs error-message">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Giá <span class="note">*</span></label>

                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="price" id="price" value="{{old('price')}}">
                            @if ($errors && $errors->has('price'))
                                <p class="text-danger text-xs error-message">{{ $errors->first('price') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Số lượng <span class="note">*</span></label>

                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="quantities" id="quantities" value="{{old('quantities')}}">
                            @if ($errors && $errors->has('quantities'))
                                <p class="text-danger text-xs error-message">{{ $errors->first('quantities') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Thể loại cha</label>
                        <div class="input-group date col-sm-6">
                            <select name="category_product_id" id="category_product_id" value="{{old('category_product_id')}}" class="form-control">
                                <option value="">Thể loại cha</option>
                                @if (!$categoryProducts->isEmpty())
                                    @foreach($categoryProducts as $categories)
                                        <option value="{{$categories->id}}">{{$categories->ten}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nhà cung cấp</label>
                        <div class="input-group date col-sm-6">
                            <select name="supplier_id" id="supplier_id" value="{{old('supplier_id')}}" class="form-control">
                                <option value="">Nhà cung cấp</option>
                                @if (!$suppliers->isEmpty())
                                    @foreach($suppliers as $sup)
                                        <option value="{{$sup->id}}">{{$sup->Ten}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Chọn size <span class="note">*</span></label>
                        <div class="input-group date col-sm-6">
                            <select name="size[]" id="size" class="form-control input_select2" multiple>
                                @foreach($listSize as $size)
                                    <option value="{{$size}}">{{$size}}</option>
                                @endforeach
                            </select>
                            <div class="col-sm-12" style="padding: 0px">
                                @if ($errors && $errors->has('size'))
                                    <p class="text-danger text-xs error-message">{{ $errors->first('size') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Nội dung <span class="note">*</span></label>

                        <div class="col-sm-6 ">
                            <div class="mb-3">
                            <textarea name="description" class="textarea" placeholder="Place some text here" style="" rows="10">{{old('description')}}</textarea>
                            </div>
                            @if ($errors && $errors->has('description'))
                                <p class="text-danger text-xs error-message">{{ $errors->first('description') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Hiển thị</label>

                        <div class="col-sm-10">
                            <input name="status" type="checkbox" id="active" /> Hiển thị
                        </div>
                    </div>

                    <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Image</label>
                            <label for="files" class="col-sm-2 btn btn-primary btn-block btn-outlined">Select Image</label>
                            <input type="file" style="visibility:hidden;" name="image" class="form-file-control" id ="files" onchange="previewFile();">
                    </div>

                    <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <img id = "preview" src="" style="width:150px;">
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-default float-left"><a style="color:black" href="{{ route('product.index') }}">Hủy</a></button>
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-info">Tạo mới</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.card -->
    </section>
@endsection
@section('js-custom.script')
<script src="{{ asset('backend_asset/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
    (function ($) {
        $('.textarea').summernote({
            height: 200
        });
    })(jQuery)

    function previewFile(){ 
        var preview = $('#preview');
        var file = $('#files').prop('files')[0];
        var reader = new FileReader();
        if(file){
            reader.readAsDataURL(file);
        }else{
            preview.attr('src', '');
        }
        reader.onloadend = function() {
            preview.attr('src', reader.result);
        }
    }
</script>
@endsection