@extends('panel.student.layouts.master')
@section('title', @$data['title'])
@section('content')
    <section>

        @if($errors->any())
            <div class="errors">
                <h4>Error</h4>
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            </div>
        @endif

        @if(session()->has("message"))
            <h4>Message</h4>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
               {{ session()->get("message") }}
            </div>
        @endif

        <form action="{{ route('student.kyc.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-item">
            <h3>Aadhar Card</h3>
            <div class="row">
                <div class="col-md-4">
                    <label for="">Aadhar Number</label>
                    <input type="text" name="aadhar_number" placeholder="Enter Aadhar Number" class="form-control"/>
                </div>
                <div class="col-md-4">
                    <label for="">Front Side</label>
                    <input type="file" name="aadhar_front" id="aadhar_front" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="">Back Side</label>
                    <input type="file" name="aadhar_back" id="aadhar_back" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-item">
            <h3>PAN Card</h3>
            <div class="row">
                <div class="col-md-4">
                    <label for="">Pan Number</label>
                    <input type="text" name="pan_number" placeholder="Enter Pan Number" class="form-control"/>
                </div>
                <div class="col-md-4">
                    <label for="">Front Side</label>
                    <input type="file" name="pan_front" id="pan_front" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="">Back Side</label>
                    <input type="file" name="pan_back" id="pan_back" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-item">
            <h3>Driving License</h3>
            <div class="row">
                <div class="col-md-4">
                    <label for="">Driving License Number</label>
                    <input type="text" name="driving_license_number" placeholder="Driving License Number" class="form-control"/>
                </div>
                <div class="col-md-4">
                    <label for="">Front Side</label>
                    <input type="file" name="driving_license_front" id="driving_license_front" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="">Back Side</label>
                    <input type="file" name="driving_license_back" id="driving_license_back" class="form-control">
                </div>
            </div>
        </div>
        <hr>
        <div class="form-item">
           <button class="btn btn-primary">Submit</button>
        </div>
        </form>
    </section>

    <section>
        <div class="row">
            <div class="col-md-12 mt-3">Aadhar card</div>
            <div class="col-md-4">
                <label for="">Aadhar Number</label>
                <input type="text" class="form-control" value="{{ $mykyc->aadhar_number ?? '' }}" readonly/>
            </div>
            <div class="col-md-4">
                <label for="">Aadhar Front</label>
                @if ($mykyc && $mykyc->aadhar_front)
                    <img src="{{ url('storage/uploads/kyc/'.$mykyc->aadhar_front) }}" alt="{{ $mykyc->aadhar_front }}" width="300px" height="400px">
                @else
                    <p>No Aadhar Front image available</p>
                @endif
            </div>
            <div class="col-md-4">
                <label for="">Aadhar Back</label>
                @if ($mykyc && $mykyc->aadhar_back)
                    <img src="{{ url('storage/uploads/kyc/'.$mykyc->aadhar_back) }}" alt="{{ $mykyc->aadhar_back }}" width="300px" height="400px">
                @else
                    <p>No Aadhar Back image available</p>
                @endif
            </div>
            <div class="col-md-12 mt-3">Pan card</div>
            <div class="col-md-4">
                <label for="">Pan Number</label>
                <input type="text" class="form-control" value="{{ $mykyc->pan_number ?? '' }}" readonly/>
            </div>
            <div class="col-md-4">
                <label for="">Pan Front</label>
                @if ($mykyc && $mykyc->pan_front)
                    <img src="{{ url('storage/uploads/kyc/'.$mykyc->pan_front) }}" alt="{{ $mykyc->pan_front }}" width="300px" height="400px">
                @else
                    <p>No Pan Front image available</p>
                @endif
            </div>
            <div class="col-md-4">
                <label for="">Pan Back</label>
                @if ($mykyc && $mykyc->pan_back)
                    <img src="{{ url('storage/uploads/kyc/'.$mykyc->pan_back) }}" alt="{{ $mykyc->pan_back }}" width="300px" height="400px">
                @else
                    <p>No Pan Back image available</p>
                @endif
            </div>
            <div class="col-md-12 mt-3">Driving License</div>
            <div class="col-md-4">
                <label for="">Driving License Number</label>
                <input type="text" class="form-control" value="{{ $mykyc->driving_license_number ?? '' }}" readonly/>
            </div>
            <div class="col-md-4">
                <label for="">Driving License Front</label>
                @if ($mykyc && $mykyc->driving_license_front)
                    <img src="{{ url('storage/uploads/kyc/'.$mykyc->driving_license_front) }}" alt="{{ $mykyc->driving_license_front }}" width="300px" height="350px">
                @else
                    <p>No Driving License Front image available</p>
                @endif
            </div>
            <div class="col-md-4">
                <label for="">Driving License Back</label>
                @if ($mykyc && $mykyc->driving_license_back)
                    <img src="{{ url('storage/uploads/kyc/'.$mykyc->driving_license_back) }}" alt="{{ $mykyc->driving_license_back }}" width="300px" height="400px">
                @else
                    <p>No Driving License Back image available</p>
                @endif
            </div>
        </div>
    </section>
    
@endsection
