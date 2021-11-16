@extends('layouts.master')

@section('title')
    Employees Edit
@endsection

@section('content')
<div class="container mx-auto">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          {{-- table code --}}
          <!-- This example requires Tailwind CSS v2.0+ -->
          <div class="flex flex-col">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
                          <div class="flex justify-start">
                              <a href="" class="py-2 px-4 m-2  bg-green-500 hover:bg-green-300 rounded-md text-gray-50">Back</a>
                          </div>
                      </div>
                  </div>

              <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 bg-gray-200 m-2 p-2 mt-2">
                  <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
                      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                          {{--  form starts here   --}}
                          <div>
                              <div class="md:grid md:grid-cols-3 md:gap-6">
                                <div class="md:col-span-1">
                                  <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Edit Employee</h3>

                                  </div>
                                </div>
                                <div class="mt-5 md:mt-0 md:col-span-2">


                                  <form class="row g-3" action="{{route('employees.update',$employees->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="col-8">
                                      <label for="firstname" class="form-label ml-5 "> First Name</label>
                                      <input type="text" value="{{$employees->firstname}}" name="firstname" class="form-control ml-5" id="name" placeholder="First name">
                                    </div>

                                    <div class="col-8">
                                        <label for="lastname" class="form-label ml-5 mt-2"> Last Name</label>
                                        <input type="text" value="{{$employees->lastname}}" name="lastname" class="form-control ml-5" id="name" placeholder="Last name">
                                      </div>
                                    <div class="col-8">
                                      <label for="email" class="form-label ml-5 mt-2">Email</label>
                                      <input type="email" value="{{$employees->email}}" name="email" class="form-control ml-5" id="name" placeholder="email">
                                    </div>
                                    <div class="col-8">
                                        <label for="Phone" class="form-label ml-5 mt-2">Phone</label>
                                        <input type="number" value="{{$employees->phone}}" name="phone" class="form-control ml-5" min="0" maxlength="11" id="name" placeholder="Phone">
                                      </div>

                                    <div class="col-8">
                                        <label for="name" class="block text-sm font-medium ml-5 mt-2 text-gray-700">
                                            Company
                                            </label>

                                            <select name="company_id" id="">
                                                @foreach (App\Models\Company::all() as $company)

                                                <option  value="{{$company->id}}">{{$company->name}}</option>

                                                @endforeach
                                              </select>

                                    </div>

                                    <div class="col-12">
                                      <button type="submit" class="btn btn-primary ml-5 mt-2">Create</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>

                      </div>
                  </div>
              </div>
          </div>

      </div>
  </div>
</div>

@endsection

@section('scripts')

@endsection




