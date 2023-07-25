@extends('backend.master')
@section('title')
{{ "Job Placement" }}
@endsection

@push('style')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
        <div class="card-header"><h3>Add Job</h3></div>
        <div class="card-body">
            <form action="{{ route('job.placement.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Job Name</label>
                        <input type="text" name="job_name" class="form-control" placeholder="Enter Job" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <input type="hidden" value="{{ $course_id }}" name="course_id">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card mt-5">
        <div class="card-header"><h3>Job Lists</h3></div>
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
                        <td>{{ $data->Course->title }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ $data->id }}" class="btn btn-info edit" data-id="{{ $data->id }}"><i
                                        class="fas fa-edit"></i></a>
                                <button class="btn btn-danger delete" data-id="{{ $data->id }}"><i
                                        class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Job <span class="badge badge-success badge-job"></span></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('job.placement.update') }}" method="post" id="editForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Job Name</label>
                                <input type="text" name="job_name" id="edit_job_name" class="form-control" required>
                            </div>
                            <div class="col-md-12 mt-3">
                                <input type="hidden" value="{{ $course_id }}" name="course_id">
                                <input type="hidden" id="job_id" name="job_id">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                            <div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@push('script')
<script src="{{ asset('backend/assets/js/edit_course.js') }}"></script>
<script>
    $(document).ready(function(){
        $(document).on("click",".edit",function(e){
            e.preventDefault()
            let id = $(this).attr("data-id");
            $.ajax({
                url : "{{ route('job.placement.edit',['id'=> ':id']) }}".replace(":id",id),
                method : "get",
                success:function(response){
                    console.log(response)
                    $("#editModal").modal("show");
                    $("#edit_job_name").val(response.job.job_name)
                    $("#job_id").val(id)
                    $(".badge-job").text(response.job.job_name)
                },
                error:function(error){
                    console.log(error)
                }
            });
        })

        $(document).on("data-bs-dismiss","#editModal",function(){
           $("#edit_job_name").val("")
        })

       $(document).on("click",".delete",function(e){
            e.preventDefault();
            let id = $(this).data("id");
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                   $.ajax({
                        url : "{{ route('job.placement.delete') }}",
                        method : "post",
                        data : {
                            "_token" : $("meta[name='csrf-token']").attr("content"),
                            "id" : id
                        },
                        success:function(response){
                            console.log(response);
                            location.reload()
                        },
                        error:function(error){
                            console.log(error);
                        }
                   })
                }
            })
       })
    })
</script>


@endpush