@extends('layouts.master')

@section('title')
   Employees
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Employees Table</h4>
                    <a href="{{route('employees.create')}}" class="btn btn-success pull-right">Add Employee</a>
                    <div>
                        @if (Session('message'))
                        <div class="alert alert-primary" role="alert">{{Session('message')}}</div>
                    @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th >Company</th>
                                <th class="text-right">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)


                                <tr>
                                    <td>{{$employee->firstname}}</td>
                                    <td>{{$employee->lastname}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->phone}}</td>
                                    <td class="text-right">{{$employee->company_id}}</td>


                                <td>
                                    <a href="{{route('employees.edit',$employee->id)}}" class="btn btn-primary ml-3">Edit</a>
                                </td>
                                <td>
                                    <form method="POST" action="{{route('employees.destroy',$employee->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-danger" href="{{route('employees.destroy',$employee->id)}}"
                                         onclick="event.preventDefault();
                                         this.closest('form').submit();">

                                        Delete

                                        </a>

                                        </form>
                                </td>
                            </tr>

                                @endforeach
                            </tbody>
                        </table>
                        {{$employees->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')

@endsection
