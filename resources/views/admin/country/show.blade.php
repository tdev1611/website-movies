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
                                <h5>Edit country</h5>
                            </div>
                            <div class="col-md-6">

                                <a href="{{ route('admin.countries.index') }}" class="btn btn-primary float-right">Back</a>
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
                    <form action="{{ route('admin.countries.update', $country->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">country Name</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                        value="{{ $country->title }}">
                                </div>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug"> Slug</label>
                                    <input type="text" name="slug" class="form-control" id="slug"
                                        value="{{ $country->slug }}">
                                </div>
                                @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">country Description</label>
                                    <textarea name="desc" id="description" cols="30" rows="10" class="form-control">{{ $country->desc }}</textarea>
                                </div>
                                @error('desc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="{{ $country->id }}"
                                            {{ old('status') == $country->id ? 'selected' : '' }} > {{$country->id }}
                                        </option>
                                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>
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
