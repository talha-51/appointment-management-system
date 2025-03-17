@extends('admin.dashboard')

@section('content')
    <h4>Edit Appointments</h4>
    <hr>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Serial</th>
                <th>Name</th>
                <th>Meeting Topic</th>
                <th>Meeting With</th>
                <th>Start Time</th>
                <th>Meeting Status</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            <?php $id = 0; ?>
            @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ $id += 1 }}</td>
                    <td>{!! $appointment->name !!}</td>
                    <td>{!! $appointment->topic !!}</td>
                    <td>{!! $appointment->meeting_with !!}</td>
                    <td>{!! $appointment->start_time !!}</td>
                    <td>{!! $appointment->status !!}</td>


                    <td><a href="{{ route('appointment.edit', $appointment->id) }}"
                            class="btn bg-sidebar text-white">Update</a></td>
                    <td>
                        <form action="{{ route('appointment.destroy', $appointment->id) }}" method="post">
                            {{ csrf_field() }}
                            @method('delete')
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
