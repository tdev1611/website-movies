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
                        <h4 class="card-title">Add Category</h4>
                        <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="title"
                                        placeholder="Enter Category Name">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="description" name="desc"
                                        placeholder="Enter Description">
                                    @error('desc')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="status" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
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
