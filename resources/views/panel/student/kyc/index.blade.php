@extends('panel.student.layouts.master')
@section('title', @$data['title'])
@section('content')
    <section>
        <form action="{{ route('student.kyc.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-item">
            <h3>Aadhar Card</h3>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Front Side</label>
                    <input type="file" name="aadhar_front" id="aadhar_front" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="">Back Side</label>
                    <input type="file" name="aadhar_back" id="aadhar_back" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-item">
            <h3>PAN Card</h3>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Front Side</label>
                    <input type="file" name="pan_front" id="pan_front" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="">Back Side</label>
                    <input type="file" name="pan_back" id="pan_back" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-item">
            <h3>Driving License</h3>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Front Side</label>
                    <input type="file" name="driving_license_front" id="driving_license_front" class="form-control">
                </div>
                <div class="col-md-6">
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
            <div class="col-md-12">Aadhar card</div>
            <div class="col-md-6">
                <label for="">Aadhar Front</label>
                <img src="{{ url('storage/uploads/kyc/'.$mykyc->aadhar_front) }}" alt="{{ $mykyc->aadhar_front }}" width="300px" height="400px">
            </div>
            <div class="col-md-6">
                <label for="">Aadhar Back</label>
                <img src="{{ url('storage/uploads/kyc/'.$mykyc->aadhar_back) }}" alt="{{ $mykyc->aadhar_back }}" width="300px" height="400px">
            </div>
            <div class="col-md-12">Pan card</div>
            <div class="col-md-6">
                <label for="">Pan Front</label>
                <img src="{{ url('storage/uploads/kyc/'.$mykyc->pan_front) }}" alt="{{ $mykyc->pan_front }}" width="300px" height="400px">
            </div>
            <div class="col-md-6">
                <label for="">Pan Back</label>
                <img src="{{ url('storage/uploads/kyc/'.$mykyc->pan_back) }}" alt="{{ $mykyc->pan_back }}" width="300px" height="400px">
            </div>
            <div class="col-md-12"></div>
            <div class="col-md-6">
                <label for="">Pan Front</label>
                <img src="{{ url('storage/uploads/kyc/'.$mykyc->driving_license_front) }}" alt="{{ $mykyc->driving_license_front }}" width="300px" height="400px">
            </div>
            <div class="col-md-6">
                <label for="">Pan Back</label>
                <img src="{{ url('storage/uploads/kyc/'.$mykyc->driving_license_back) }}" alt="{{ $mykyc->driving_license_back }}" width="300px" height="400px">
            </div>
        </div>
    </section>
@endsection
