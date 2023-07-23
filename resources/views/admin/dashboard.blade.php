@extends('admin.layout.admin')
@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">Products Sold</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">4565</h2>
                        <p class="text-white mb-0">Jan - March 2019</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i
                            class="fa fa-shopping-cart"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Net Profit</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">$ 8541</h2>
                        <p class="text-white mb-0">Jan - March 2019</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-3">
                <div class="card-body">
                    <h3 class="card-title text-white">New Customers</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">4565</h2>
                        <p class="text-white mb-0">Jan - March 2019</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-4">
                <div class="card-body">
                    <h3 class="card-title text-white">Customer Satisfaction</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">99%</h2>
                        <p class="text-white mb-0">Jan - March 2019</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body pb-0 d-flex justify-content-between">
                            <div>
                                <h4 class="mb-1">Comments</h4>
                                <p>Total Earnings of the Month</p>
                                <h3 class="m-0">$ 12,555</h3>
                            </div>
                            <div>
                                <ul>
                                    <li class="d-inline-block mr-3"><a class="text-dark"
                                            href="#">Day</a>
                                    </li>
                                    <li class="d-inline-block mr-3"><a class="text-dark"
                                            href="#">Week</a>
                                    </li>
                                    <li class="d-inline-block"><a class="text-dark"
                                            href="#">Month</a></li>
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body px-0">
                    <h4 class="card-title px-4 mb-3">Todo</h4>
                    <div class="todo-list">
                        <div class="tdl-holder">
                            <div class="tdl-content">
                                <ul id="todo_list">
                                    <li><label><input type="checkbox"><i></i><span>Get up</span><a
                                                href='#' class="ti-trash"></a></label></li>
                                    <li><label><input type="checkbox" checked><i></i><span>Stand
                                                up</span><a href='#' class="ti-trash"></a></label>
                                    </li>
                                    <li><label><input type="checkbox"><i></i><span>Don't give up the
                                                fight.</span><a href='#'
                                                class="ti-trash"></a></label></li>
                                    <li><label><input type="checkbox" checked><i></i><span>Do something
                                                else</span><a href='#' class="ti-trash"></a></label>
                                    </li>
                                </ul>
                            </div>
                            <div class="px-4">
                                <input type="text" class="tdl-new form-control"
                                    placeholder="Write new item and hit 'Enter'...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
<!-- #/ container -->
@endsection