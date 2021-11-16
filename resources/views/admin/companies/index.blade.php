@extends('layouts.master')

@section('title')
    Companies
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Companies Table</h4>
                    <a href="{{route('companies.create')}}" class="btn btn-success pull-right">Add Company</a>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th class="text-right">Logo</th>
                                <th class="text-right">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)


                                <tr>
                                    <td>{{$company->name}}</td>
                                    <td>{{$company->email}}</td>
                                    <td>{{$company->website}}</td>
                                    <td class="text-right">
                                        <img src="{{Storage::url($company->logo)}}" width="40px" height="40px" alt="">
                                    </td>

                                    <td>
                                        <a href="{{route('companies.edit',$company->id)}}" class="btn btn-primary ml-3">Edit</a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{route('companies.destroy',$company->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-danger" href="{{route('companies.destroy',$company->id)}}"
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
                        {{$companies->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')

@endsection
