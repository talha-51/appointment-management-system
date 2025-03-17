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
                    <label for="">Duration</label>
                    <table>
                        <tr>
                            <td>
                                <input type="number" id="" aria-describedby="" name="duration"
                                    class="form-control @error('duration') is-invalid @enderror" style="width: 200px">
                            </td>
                            <td><label>&nbsp;&nbsp;&nbsp;Hour</label></td>
                        </tr>
                    </table>
                </div>

                @error('duration')
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

                <button type="submit" class="btn bg-sidebar text-white" name="submit">Submit</button>
            </form>
        </form>
    </div>
@endsection
