@extends('admin.dashboard')

@section('content')
    <h4>Add Appointment</h4>
    <hr>
    <div>
        <form action="{{ route('appointment.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <form>

                <div class="form-group">
                    <label for="">Enter Name</label>
                    <input type="text" id="" aria-describedby="" name="name"
                        class="form-control @error('name') is-invalid @enderror">
                </div>

                @error('name')
                    <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="">Meeting Topic</label>
                    <input type="text" id="" aria-describedby="" name="topic"
                        class="form-control @error('topic') is-invalid @enderror">
                </div>

                @error('topic')
                    <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="">Meeting With</label>

                    <select class="form-control" aria-label="Default select example" name="meeting_with">
                        <option value="Steve">Steve</option>
                        <option value="John">John</option>
                        <option value="Clark">Clark</option>
                    </select>
                </div>

                @error('meeting_with')
                    <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="">Start Time</label>
                    <input type="datetime-local" id="" aria-describedby="" name="start_time"
                        class="form-control @error('start_time') is-invalid @enderror" style="width: 15%">
                </div>

                @error('start_time')
                    <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                @enderror

                <input type="hidden" id="" aria-describedby="" name="status" value="pending">

                <button type="submit" class="btn bg-sidebar text-white" name="submit">Submit</button>
            </form>
        </form>
    </div>
@endsection
