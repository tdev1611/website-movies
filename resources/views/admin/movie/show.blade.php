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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title_eng">Movie Name English</label>
                                    <input type="text" name="title_eng" class="form-control" id="title_eng"
                                        value="{{ old('title_eng', $movie->title_eng) }}">
                                </div>
                                @error('title_eng')
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

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subtitles">Subtitles</label>
                                    <select class="form-control" id="subtitles" name="subtitles">
                                        <option
                                            value="{{ $movie->subtitles }}" {{ old('subtitles') == $movie->subtitles ? 'selected' : '' }}>
                                            {{ $movie->subtitles }}</option>
                                        <option value="Viet Sub"
                                            style="{{ $movie->subtitles == 'Viet Sub' ? 'display:none' : '' }}">
                                            VietSub
                                        </option>
                                        <option value="Thuyết minh"
                                            style="{{ $movie->subtitles == 'Thuyết minh' ? 'display:none' : '' }}">
                                            Thuyết minh</option>
                                    </select>
                                </div>
                                @error('subtitles')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="definition">Definition</label>
                                    <select class="form-control" id="definition" name="definition">
                                        <option
                                            value="{{ $movie->definition }}{{ old('definition') == $movie->definition ? 'selected' : '' }}">
                                            {{ $movie->definition }}</option>
                                        <option value="HD" {{ old('definition') == 'HD' ? 'selected' : '' }}
                                            style="{{ $movie->definition == 'HD' ? 'display:none' : '' }}">
                                            HD</option>
                                        <option value="Full HD" {{ old('Full HD') == 'Full HD' ? 'selected' : '' }}
                                            style="{{ $movie->definition == 'Full HD' ? 'display:none' : '' }}">
                                            Full HD
                                        </option>
                                    </select>
                                </div>
                                @error('definition')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--  --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="feature">Feature</label>
                                    <select class="form-control" id="feature" name="feature">
                                        <option value="{{ $movie->feature }}">
                                            {{ $movie->feature == 1 ? 'Nổi bật' : 'Không' }}</option>
                                        <option value="1" {{ old('feature') == 1 }}>
                                            Nổi bật
                                        </option>
                                        <option value="0" {{ old('feature') == 0 }}>
                                            Không
                                        </option>

                                    </select>
                                </div>
                                @error('feature')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--  --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Category</label>
                                    <select class="form-control" id="category_id" name="category_id">
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
                                        <option value="{{ $movie->status }}">
                                            {{ $movie->status == 1 ? 'Active' : 'Inactive' }}
                                        </option>
                                        <option value="1">
                                            Active
                                        </option>
                                        <option value="2">
                                            Inactive
                                        </option>

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
