@extends('backend.layouts.app')
@section('title') Danh sách Người dùng @endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <h3 class="card-title">Danh sách Người dùng</h3>

                            <div class="card-tools">
                                <a class="btn btn-success btn-sm" href="{{ route('user.create') }}"><span
                                    class="fas fa-plus"></span> Thêm mới </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap ">
                                <thead>
                                <tr>
                                    {{--<th>Stt</th>--}}
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Chức vụ</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>
                                <tbody>        
                                @if (!$users->isEmpty())
                                    @php $i = $users->firstItem() @endphp
                                    @foreach($users as $use)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $use->Ten }}</td>
                                            <td>{{ $use->email }}</td>
                                            <td>{{ $roleUser[$use->VaiTro] }}</td>
                                            <td>{{ $use->DiaChi }}</td>
                                            <td>{{ $use->SDT }}</td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="{{ route('user.edit', $use->id) }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a id="{{$use->id}}" class="btn btn-danger btn-sm btn-delete" href="#">
                                                    <i class="fas fa-trash"></i>
                                                    <form method="post" action="{{ route('user.destroy', $use->id) }}"
                                                          id="form_{{$use->id}}">
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
                        @if($users->hasPages())
                          <div class="pagination text-center mb-4">
                            {{ $users->links() }}
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
