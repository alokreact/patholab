@extends('Admin.layout.master')
@section('title', __('Orders'))
@section('action', __('List'))
@section('content')
    <main id="main" class="main">
        @include('Admin.layout.partials.breadcrumb')

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">List</h5>

                            <!-- Default Table -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Order Option</th>
                                        <th>Amount</th>
                                        <th scope="col">Order Date</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">View</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($orders) > 0)
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $order->recieptId }}</td>
                                                <td>{{ $order->pay_option === '2' ? 'COD' : 'ONLINE' }}</td>
                                                <td>{{ $order->total }}</td>
                                                <td>{{ \Carbon\Carbon::parse($order->order_date)->forMat('d-m-Y') }}</td>

                                                <td>
                                                    <a href="{{ route('order.download', [$order->id]) }}">
                                                        <button type="button" class="btn btn-success">Download</button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form method="get" action="{{route('show.order')}}">

                                                        <input type="hidden" value="{{ $order->id }}" name="itemId"/>
                                                        <button type="submit" class="btn btn-primary open-modal">
                                                        View
                                                    </button>

                                                    </form>

                                                </td>
                                            </tr>
                                            <!-- View Modal -->
                                        @endforeach
                                    @else
                                        <td>No Order to display</td>
                                    @endif
                                </tbody>
                            </table>

                            <!-- End Default Table Example -->
                        </div>

                        @include('Admin.Order.modal')

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('after-order-scripts')
    <script></script>
@endpush
