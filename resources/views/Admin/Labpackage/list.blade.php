@extends('Admin.layout.master')
@section('title', __('LabPackage'))
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Lab Name</th>
                                        <th>Sub Test</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($labs) > 0)
                                        @foreach ($labs as $lab)
                                            <tr>
                                                <td>{{ $lab->lab_name }}</td>

                                                <td>
                                                    @foreach ($lab->subtest as $subtest)
                                                        <span class="badge bg-info text-dark">
                                                            {{ ucfirst($subtest->sub_test_name) }}</span>

                                                        (Price- <span
                                                            class="badge bg-light text-dark">{{ $subtest->pivot->price }}</span>)
                                                    @endforeach

                                                </td>


                                                <td>
                                                    <a href="{{ route('labpackage.edit', [$lab->id]) }}">
                                                        <button type="button" class="btn btn-success"><i
                                                                class="bi bi-pencil-square"></i></button>
                                                    </a>

                                                </td>

                                            </tr>

                                            <!-- View Modal -->
                                        @endforeach
                                    @else
                                        <td>No user to display</td>
                                    @endif
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection


 