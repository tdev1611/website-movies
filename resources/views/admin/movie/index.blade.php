@extends('admin.layout.admin')
@section('content')
    <div class="container-fluid mt-3">

        <div class="row">
            <div class="col-lg-12">
                {{-- list movie --}}
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
                    @if ($movies->count() > 0)
                        <div class="card-body">
                            <h4 class="card-title"> Movies ({{ $movies->count() }})</h4>
                            <div class="table-responsive">
                                <table class="table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tên movie</th>
                                            <th scope="col">Tên tiếng anh</th>
                                            {{-- <th scope="col">Slug </th> --}}
                                            <th scope="col">Mô tả</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Danh mục</th>
                                            <th scope="col">Thể loại</th>
                                            <th scope="col">Quốc gia</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Nổi bật</th>
                                            <th scope="col">Ngày tạo</th>
                                            <th scope="col">Ngày cập nhật</th>
                                            <th scope="col">Năm</th>
                                            <th scope="col" class="text-right">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sortable">
                                        @foreach ($movies as $key => $movie)
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td> {{ Str::limit($movie->title, 10) }}
                                                </td>
                                                {{-- <td> {{ Str::limit($movie->title_eng, 10) }} --}}
                                                </td>
                                                <td>
                                                    {{ Str::limit($movie->slug, 10) }}
                                                </td>
                                                <td>
                                                    {{ Str::limit($movie->desc, 20) }}
                                                </td>
                                                <td>
                                                    <img style="width:39px; border:1px solid " class="img-fluid"
                                                        src="{{ url($movie->image) }}" alt="">
                                                </td>
                                                <td>
                                                    {{ $movie->category->title }}
                                                </td>
                                                <td>
                                                    {{ $movie->genre->title }}
                                                </td>
                                                <td>
                                                    {{ $movie->country->title }}
                                                </td>
                                                <td>
                                                    @if ($movie->status == 1)
                                                        <span class="badge badge-success">Hiện</span>
                                                    @else
                                                        <span class="badge badge-danger">Ẩn</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($movie->feature == 1)
                                                        <span class="badge badge-success">Hiện</span>
                                                    @else
                                                        <span class="badge badge-primary">Ẩn</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    {{ $movie->created_at }}
                                                </td>
                                                <td>
                                                    {{ $movie->updated_at }}
                                                </td>
                                                <td>


                                                    <select id="{{ $movie->id }}" name="year" class="select_year">
                                                        @php
                                                            $startYear = 2001;
                                                            $endYear = 2023;
                                                            for ($year = $startYear; $year <= $endYear; $year++) {
                                                                $selected = $movie->year == $year ? 'selected' : '';
                                                                
                                                                echo '<option value="' . $year . '" ' . $selected . '>' . $year . '</option>';

                                                            }
                                                        @endphp
                                                    </select>



                                                </td>
                                                <td class="d-flex justify-content-end">
                                                    <a style="font-size:14px; padding:7px 10px"
                                                        href="{{ route('admin.movies.edit', $movie->id) }}"
                                                        class="btn btn-primary mr-2">Sửa</a>
                                                    <form action="{{ route('admin.movies.destroy', $movie->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" style="padding:7px 10px"
                                                            type="submit">Xóa</button>
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
                    {{-- {{ $movies->links() }} --}}
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
