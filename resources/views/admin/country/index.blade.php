@extends('admin.layout.admin')
@section('content')
    <div class="container-fluid mt-3">

        <div class="row">
            <div class="col-lg-12">
                {{-- list country --}}
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 text-center ">
                                @if (session('success'))
                                    <div class="alert alert-success w-50" id="notification">
                                        {!! session('success') !!}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger w-50" id="notification">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if ($countries->count()>0)
                        <div class="card-body">
                            <h4 class="card-title"> Quốc gia  ({{ $countries->count() }})</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tên thể loại</th>
                                            <th scope="col">Mô tả</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col" class="text-right">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($countries as $key => $country)
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>{{ $country->title }}</td>
                                                <td>
                                                    {{ $country->desc }}
                                                </td>
                                                <td>
                                                    @if ($country->status == 1)
                                                        <span class="badge badge-success">Hiện</span>
                                                    @else
                                                        <span class="badge badge-danger">Ẩn</span>
                                                    @endif
                                                </td>

                                                <td class="d-flex justify-content-end">
                                                    <a href="{{ route('admin.countries.edit', $country->id) }}"
                                                        class="btn btn-primary mr-2">Sửa</a>
                                                    <form action="{{ route('admin.countries.destroy', $country->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit">Xóa</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                    <span class="text-center my-3">Chưa có bản ghi nào</span>
                    @endif

                </div>
                <!-- #/ container -->
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#notification').fadeOut('slow');
            }, 2000);
        })
    </script>
@endsection
