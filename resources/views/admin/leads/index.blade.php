@extends('layouts.my-admin')

@section('content')
    <div class="container mt-3">
        <h1>Index leads</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leads as $lead)
                    <tr>
                        <th scope="row">{{ $lead->id }}</th>
                        <td>{{ $lead->name }}</td>
                        <td>{{ $lead->lastname }}</td>
                        <td>{{ $lead->email }}</td>
                        <td>
                          <form class="ms-form" action="{{route('admin.leads.update', ['lead' => $lead->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select class="status-select form-select" aria-label="Default select example" name="status">
                                <option @selected($lead->status === 'penning') value="penning">Penning</option>
                                <option @selected($lead->status === 'running') value="running">Running</option>
                                <option @selected($lead->status === 'closed') value="closed">Closed</option>
                            </select>
                          </form>
                        </td>
                        <td>
                            <a href="{{ route('admin.leads.show', $lead->id) }}" class="btn btn-success">Show</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
