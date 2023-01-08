@extends('backend.layouts.app')
@section('title') Danh sách sản phẩm @endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <h3 class="card-title">Danh sách sản phẩm</h3>

                            <div class="card-tools">
                                <a class="btn btn-success btn-sm" href="{{ route('product.create') }}"><span
                                    class="fas fa-plus"></span> Thêm mới </a>
                            </div>
                            <div class="form-search">
                                <form class="form-inline" action="{{ route('product.index') }}" method="get">
                                  <div class="form-row align-items-center margin-auto">
                                    <div class="form-group mr-2 mb-2">
                                      <label for="name" class="sr-only">Tên sản phẩm</label>
                                      <input type="text" name="name" value="{{ $request->get('name') }}" class="form-control" id="name"
                                             placeholder="Tên sản phẩm">
                                    </div>
                                    <button type="submit" class="btn-search btn btn-primary mb-2"><span
                                          class="fas fa-search"></span> Tìm kiếm </button>
                                  </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    {{--<th>Stt</th>--}}
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th style="width: 200px !important;">Tên</th>
                                    <th>Thể loại cha</th>
                                    <th>Nhà cung cấp</th>
                                    <th>Giá</th>
                                    <th>Size</th>
                                    <th>Số lượng</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if (!$products->isEmpty())
                                    @php $i = $products->firstItem() @endphp
                                    @foreach($products as $pro)
                                        <tr>
                                            {{--<td>{{ $i }}</td>--}}
                                            <td>{{ $pro->id }}</td>
                                            <td width="150" height="100px">
                                                <img src="{{ Storage::url('images/'.$pro->Anh) }}" width="150px" height="100px">
                                            </td>
                                            <td style="width: 200px !important;">{{ $pro->Ten }}</td>
                                            <td>{{ $pro->id_DMSP ? $pro->category_product->ten : '' }}</td>
                                            <td>{{ $pro->id_NCC ? $pro->supplier->Ten : '' }}</td>
                                            <td>{{ number_format($pro->Gia) }} đ</td>
                                            <td>{{ $pro->size }}</td>
                                            <td>{{ $pro->SoLuong }}</td>
                                            <td>
                                                <span class="badge bg-success">
                                                    @if ($pro->TrangThai)
                                                        Có
                                                    @else
                                                        Không
                                                    @endif
                                                </span>
                                            </td>

                                            <td>
                                                <a class="btn btn-primary btn-sm" href="{{ route('product.edit', $pro->id) }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a id="{{$pro->id}}" class="btn btn-danger btn-sm btn-delete" href="#">
                                                    <i class="fas fa-trash"></i>
                                                    <form method="post" action="{{ route('product.destroy', $pro->id) }}"
                                                          id="form_{{$pro->id}}">
                                                      @csrf
                                                      @method('DELETE')
                                                    </form>
                                                </a>
                                            </td>
                                        </tr>
                                        @php $i++ @endphp
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        @if($products->hasPages())
                          <div class="pagination text-center mb-4">
                            {{ $products->links() }}
                          </div>
                        @endif
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    @include('backend.common.modal_delete', ['messageConfirm' => 'Bạn có muốn xóa'])
@endsection
