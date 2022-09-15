@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row flex-nowrap h-100">
            @include('layouts.sidebar')
            <div class="col px-4 py-4 ">
                <section class="p-4 shadow-sm bg-white rounded">
                    <table id="table_id" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Position</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Age</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($officials as $official)
                                <td>{{ $official->position }}</td>
                                <td>{{ $official->name }}</td>
                                <td>{{ $official->email }}</td>
                                <td>{{ $official->address }}</td>
                                <td>{{ $official->age }}</td>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
@endsection
