@extends('backend.master')
@section('title')
    {{ "Job Placement" }}
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('backend/assets/css/mult-step.css') }}">
@endpush
@section('content')
    <div class="page-content">

        {{-- breadecrumb Area S t a r t --}}
        @include('backend.ui-components.breadcrumb', [
            'title' => "Job Placement",
            'routes' => [
                route('dashboard') => ___('common.Dashboard'),
                route('course.index') => ___('common.Courses'),
                '#' => "Job Placement",
            ],
            'buttons' => 0,
        ])
    </div>
    <section>
        <div class="card">
            <div class="card-body table-responsive">
                <table class="w-100 table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Course Id</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobs as $index => $data)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $data->job_name }}</td>
                                <td>{{ $data->Course->name }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-info"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('job.placement.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Job Name</label>
                            <input type="text" name="job_name" class="form-control" placeholder="Enter Job">
                        </div>
                        <div class="col-md-12 mt-3">
                            <input type="hidden" value="{{ $course_id }}" name="course_id">
                            <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script src="{{ asset('backend/assets/js/edit_course.js') }}"></script>
    <script>
        $(document).ready(function(){
            $(".table").Datatable();
        })
    </script>
@endpush
        