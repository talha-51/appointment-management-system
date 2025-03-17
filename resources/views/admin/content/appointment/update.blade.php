@extends('admin.dashboard')

@section('content')
    <h4>Update Appointment</h4>
    <hr>

    <div>
        <form action="{{ route('appointment.update', $appointment->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('put')
            <form>
                <div class="form-group">
                    <label for="">Enter Name</label>
                    <input type="text" id="" aria-describedby="" name="name"
                        class="form-control @error('name') is-invalid @enderror" value="{{ $appointment->name }}">
                </div>

                @error('name')
                    <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="">Meeting Topic</label>
                    <input type="text" id="" aria-describedby="" name="topic"
                        class="form-control @error('topic') is-invalid @enderror" value="{{ $appointment->topic }}">
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
                        class="form-control @error('start_time') is-invalid @enderror" style="width: 15%"
                        value="{{ $appointment->start_time }}">
                </div>

                @error('start_time')
                    <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="">Meeting Status</label>

                    <select class="form-control" aria-label="Default select example" name="status">
                        <option value="checked_in">Checked In</option>
                        <option value="missed">Missed</option>
                    </select>
                </div>


                <button type="submit" class="btn bg-sidebar text-white" name="submit">Submit</button>
            </form>
        </form>
    </div>
@endsection
