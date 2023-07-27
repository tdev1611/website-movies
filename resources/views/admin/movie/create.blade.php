@extends('admin.layout.admin')
@section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- status --}}
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                @if (session('success'))
                                    <div class="alert alert-success " id="notification">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger" id="notification">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- status --}}
                    <div class="card-body">
                        <h4 class="card-title">Add Movie</h4>
                        <form action="{{ route('admin.movies.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Movie Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter Movie Name" value="{{ old('title') }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title_eng" class="col-sm-2 col-form-label">Movie Name English</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title_eng" name="title_eng"
                                        placeholder="Enter Movie Name" value="{{ old('title_eng') }}">
                                    @error('title_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        placeholder="Enter slug Name" value="{{ old('slug') }}">
                                    @error('slug')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea name="desc" class="form-control" id="description" cols="30" rows="10"
                                        placeholder="Enter Description"> {{ old('desc') }}</textarea>
                                    @error('desc')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="file" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="file" name="image"
                                        value="{{ old('image') }}">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="subtitles" class="col-sm-2 col-form-label">Subtitles</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="subtitles" name="subtitles">
                                        <option value="">Chọn phụ đề</option>
                                        <option value="Viet Sub" {{ old('subtitles') == 'Viet Sub' ? 'selected' : '' }}>
                                            Viet Sub</option>
                                        <option value="Thuyết minh"
                                            {{ old('subtitles') == 'Thuyết minh' ? 'selected' : '' }}>Thuyết minh</option>
                                    </select>
                                    @error('subtitles')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="definition" class="col-sm-2 col-form-label">Definition</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="definition" name="definition">
                                        <option value="">Chọn định dạng</option>

                                        <option value="HD" {{ old('definition') == 'HD' ? 'selected' : '' }}>
                                            HD
                                        </option>
                                        <option value="Full HD" {{ old('definition') == 'Full HD' ? 'selected' : '' }}>
                                            Full HD
                                        </option>
                                    </select>
                                    @error('definition')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="feature" class="col-sm-2 col-form-label">Feature</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="feature" name="feature">
                                        <option value="1" {{ old('feature') == 1 ? 'selected' : '' }}>Có
                                        </option>
                                        <option value="0" {{ old('feature') == 0 ? 'selected' : '' }} selected>
                                            Không</option>
                                    </select>
                                    @error('feature')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option value="">Chọn danh mục</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="genre_id" class="col-sm-2 col-form-label">Genre</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="genre_id" name="genre_id">
                                        <option value="">Chọn thể loại</option>
                                        @foreach ($genres as $genre)
                                            <option value="{{ $genre->id }}"
                                                {{ old('genre_id') == $genre->id ? 'selected' : '' }}>{{ $genre->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('genre_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country_id" class="col-sm-2 col-form-label">Country</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="country_id" name="country_id">
                                        <option value="">Chọn Quốc gia</option>
                                        @foreach ($countries as $country)
                                            <option
                                                value="{{ $country->id }}"{{ old('country_id') == $country->id ? 'selected' : '' }}>
                                                {{ $country->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="status" name="status">
                                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>
                                            Active</option>
                                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>





                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#notification').fadeOut('slow');
            }, 2000);
        })
    </script>
@endsection
