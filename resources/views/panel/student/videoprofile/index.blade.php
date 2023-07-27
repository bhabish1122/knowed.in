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
            @forelse($data['videos'] as $video)
            <div class="col-md-12">
                <label for="">{{ $video->remarks }}</label>
                <div class="col-md-12">
                    <video src="{{ url('storage/uploads/video_profile/'.$video->video) }}"
                        width="640"
                        height="360"
                        controls
                        autoplay
                        loop
                        muted
                        poster="{{ asset('storage/uploads/video_profile/thumbnails/'.$video->thumbnail) }}"
                        preload="auto">
                    </video>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                EMPTY
            </div>
            @endforelse
        </div>
    </section>
@endsection
