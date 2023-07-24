@extends('admin.layout.admin')
@section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- show id --}}
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Edit Movie</h5>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.movies.index') }}" class="btn btn-primary float-right">Back</a>
                            </div>
                            <div class="col-md-12 text-center ">
                                @if (session('success'))
                                    <div class="alert alert-success w-50" id="notification">
                                        {{ session('success') }}
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
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.movies.update', $movie->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Movie Name</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                        value="{{ old('title', $movie->title) }}">
                                </div>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug" class="form-control" id="slug"
                                        value="{{ old('slug', $movie->slug) }}">
                                </div>
                                @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">movie Description</label>
                                    <textarea name="desc" id=Mdescription" cols="30" rows="10" class="form-control">{{ old('slug', $movie->desc) }}</textarea>
                                </div>
                                @error('desc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="file">Image</label>
                                <div class="form-group">
                                    <input type="file" class="form-control" id="file" name="image">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @if ($movie->image)
                                    <img style="width:20%; border:1px solid" src="{{ url($movie->image) }}" alt="">
                                @endif


                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status">Category</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option value="">Chọn danh mục</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $movie->category_id ? 'selected' : '' }}>
                                                {{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status">Genre</label>
                                    <select class="form-control" id="genre_id" name="genre_id">
                                        <option value="">Chọn thể loại</option>
                                        @foreach ($genres as $genre)
                                            <option value="{{ $genre->id }}"
                                                {{ $genre->id == $movie->category_id ? 'selected' : '' }}>
                                                {{ $genre->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('genre_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status">Country</label>
                                    <select class="form-control" id="country_id" name="country_id">
                                        <option value="">Chọn Quốc gia</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ $country->id == $movie->country_id ? 'selected' : '' }}>
                                                {{ $country->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('country_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" @if ($movie->status == 1) selected @endif>Active
                                        </option>
                                        <option value="0" @if ($movie->status == 0) selected @endif>
                                            Inactive</option>
                                    </select>
                                </div>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
