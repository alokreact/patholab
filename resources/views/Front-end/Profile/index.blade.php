@extends('Front-end.layout.mainlayout')
@section('content')
<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <h1 class="text-capitalize mb-5 text-lg">My Profile</h1>
                    <span class="text-white">Order Overview</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section blog-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 mb-5">
                        <div class="row">
                            
                            @include('Front-end.Profile.sidebar')
                            
                                <div class="single-blog-item col-md-7">
                                    <table id="cart" class="table table-hover table-condensed cart-table">
                                        <thead>
                                            <tr>
                                                <th style="width:25%">Test Name</th>
                                                <th style="width:20%">Lab Name</th>
                                                <th style="width:20%">Price</th>

                                                <th style="width:20%">Date</th>
                                                <th style="width:22%" class="text-center">Download</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($order_items as $order_item)
                                                <tr>
                                                    <td>
                                                        @foreach ($order_item->subtest as $sub_test)
                                                            {{ $sub_test->sub_test_name }}
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        {{ $order_item->lab_id }}
                                                    </td>

                                                    <td>{{ $order_item->price }}/-</td>
                                                    <td>{{ $order_item->created_at->format('d-m-Y') }}</td>

                                                    <td>
                                                        @if ($order_item->report_url)
                                                            @php
                                                                $report_urls = explode(',', $order_item->report_url);
                                                            @endphp
                                                            @foreach ($report_urls as $url)
                                                                <a href="{{ asset('/public/Image/' . $url) }}"
                                                                    download>Download File</a>
                                                            @endforeach
                                                        @else
                                                            No Reports!
                                                        @endif

                                                    </td>
                                                </tr>
                                            @empty
                                                No Records
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
