@extends('dashboard.layouts.main')
@section('title', 'Employees')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Hello, Admin</h1>
</div>
<a class="btn btn-success mb-3" href="{{ route('employees.create')}}">Add +</a>
<br>
<div class="table-responsive">
    <table id="myTable" class="table table-striped table-bordered table-sm">
        <thead>
            <tr class="table-success align-middle">
                <th>No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Company</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Profile Picture</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $item)
                <tr>
                    <td class="align-middle">{{$loop->iteration}}</td>
                    <td class="align-middle">{{$item->first_name}}</td>
                    <td class="align-middle">{{$item->last_name}}</td>
                    <td class="align-middle">{{$item->companies['name']??'-- Belum memilih Perusahaan --'}}</td>
                    <td class="align-middle">{{$item->email}}</td>
                    <td class="align-middle">{{$item->phone}}</td>
                    <td class="text-center" style="width:10%;"><img src="{{$image = Storage::disk('private')->get("uploads/users_image.jpg");}}" height="100" width="100">
                    </td>
                    <td>
                        <a href="{{route('employees.edit', $item->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('employees.destroy', $item->id)}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus ?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
</div>
@endsection