@extends('layouts.website')
@section('title')
    All Order
@endsection
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Orders</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <div class="col-md-3 ">
                        @include('user.includes.profile-sidebar')
                    </div>
                    <div class="col-md-9 mt-2">
                        <div class="table table-bordered table-striped table-hover custom_table">
                            <table>
                                <tbody>
                                    <tr style="background: #E9EBEC;margin-bottom:50px;display:block;padding:10px;color:green;">
                                        <td class="col-md-2">
                                            <label for="">Date</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">Total</label>
                                        </td>
                                        <td class="col-md-3">
                                            <label for="">Payment</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">Invoice</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">Order </label>
                                        </td>
                                        <td class="col-md-1">
                                            <label for="">Action</label>
                                        </td>
                                    </tr>
                                    @foreach ($orders as $order)
                                        <tr style="margin-bottom:50px;display:block;">
                                            <td class="col-md-2">
                                                <strong>{{ $order->order_date }}</strong>
                                            </td>
                                            <td class="col-md-2">
                                                <strong>${{ $order->amount }}</strong>
                                            </td>
                                            <td class="col-md-3">
                                                <strong>{{ $order->payment_method }}</strong>
                                            </td>
                                            <td class="col-md-2">
                                                <strong>{{ $order->invoice_no }}</strong>
                                            </td>
                                            <td class="col-md-2">
                                                <span class="badge badge-pill badge-warning" style="background: #418DB9; text:white;">{{ ucwords($order->status) }}</span>
                                            </td>
                                            <td class="col-md-1">
                                                <a href="{{ url('user/order-view/'.$order->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>
                                                <a href="{{ url('user/invoice-download/'.$order->id) }}" style="margin-top: 5px;"  class="btn btn-sm btn-danger "><i class="fa fa-download" style="color:white;"></i> Invoice</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection