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
                                <h5>Edit Category</h5>
                            </div>
                            <div class="col-md-6">
                                {{-- {{ route('category.index') }} --}}
                                <a href="{{ route('admin.categories.index') }}" class="btn btn-primary float-right">Back</a>
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
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Category Name</label>
                                    <input type="text" name="title" class="form-control" id="name"
                                        value="{{ $category->title }}">

                                </div>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Category Description</label>
                                    <textarea name="desc" id="description" cols="30" rows="10" class="form-control">{{ $category->desc }}</textarea>
                                </div>
                                @error('desc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" @if ($category->status == 1) selected @endif>Active
                                        </option>
                                        <option value="0" @if ($category->status == 0) selected @endif>
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
