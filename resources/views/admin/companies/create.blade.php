@extends('layouts.master')

@section('title')
    create
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
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Create New Company</h3>

                                  </div>
                                </div>
                                <div class="mt-5 md:mt-0 md:col-span-2">
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                  <form class="row g-3" action="{{route('companies.index')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="col-8">
                                      <label for="name" class="form-label ml-5 ">Name</label>
                                      <input type="text" name="name" class="form-control ml-5" id="name" placeholder="company name">
                                    </div>
                                    <div class="col-8">
                                      <label for="email" class="form-label ml-5 mt-2">Email</label>
                                      <input type="email" name="email" class="form-control ml-5" id="name" placeholder="company email">
                                    </div>
                                    <div class="col-8">
                                        <label for="website" class="form-label ml-5 mt-2">Website</label>
                                        <input type="text" name="website" class="form-control ml-5" id="name" placeholder="www.xyz.com">
                                      </div>

                                    <div class="col-8">
                                      <label for="logo" class="form-label ml-5 mt-2" >Image</label>
                                      <input type="file" name="logo" class="m-3">
                                    </div>

                                    <div class="col-12">
                                      <button type="submit" class="btn btn-primary ml-5">Create</button>
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




