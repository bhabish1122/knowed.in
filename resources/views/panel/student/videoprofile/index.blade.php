@extends('panel.student.layouts.master')
@section('title', @$data['title'])
@section('content')
    <section>
        <h1>Video Profile</h1>
        <form action="{{ route('student.video.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-item">
            <label for="">Remarks</label>
            <textarea name="remarks" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="form-item">
            <label for="">Choose Video</label>
            <input type="file" name="video" id="video" class="form-control"/>
        </div>
        <div class="form-item">
           <button class="btn btn-primary">Submit</button>
        </div>
        </form>
    </section>

    <section>
        <div class="row">
            
        </div>
    </section>
@endsection
