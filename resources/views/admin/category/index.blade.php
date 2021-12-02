@extends('admin.layout.sidebar',['title'=>"Category"])
@section('content')
    <div class="col-md-12">
        <form action="{{ route('admin.product.listview') }}" name="sortingForm" id="sortingForm" method="GET">
            <div class="col-md-12 row my-4">
                <div class="col-md-2">
                    <div class="float-left mx-3">Latest Product <a
                            href="{{ route('admin.product.listview') }}">Here</a>.
                    </div>
                </div>
                <div class="col-md-1">
                    <lable for="sorting">Sort By:</lable>
                </div>
                <div class="col-md-1">
                    <x-Sorting sorting="{{ $request['sorting'] ?? '0' }}"/>
                </div>
                <div class="col-md-1">
                    <lable for="orderBy">Number of Product:</lable>
                </div>
                <div class="col-md-1">
                    <x-NumberOfRow record="{{ $request['no_of_record'] ?? 10}}"/>
                </div>
                <div class="col-md-6 float-right">
                    <a href="{{ route('admin.product.deleted') }}">
                        <button type="button" class="float-right btn btn-outline-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                <path fill-rule="evenodd"
                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                            </svg>
                            Deleted Product
                        </button>
                    </a>
                </div>
            </div>
            <div class="col-md-12 row">
                <div class="col-md-2">
                    <x-Category category="{{ $request['category'] ?? null }}"/>
                </div>
                <div class="col-md-2">
                    <x-Brand brand="{{ $request['brands'] ?? null }}"/>
                </div>
                <div class="col-md-2">
                    <x-ProductRating selectedRating="{{ $request['rating'] ?? null }}"/>
                </div>
                <div class="col-md-4 float-right pl-5">
                    <div class="col-md-12 text-lg-right">
                        <input type="search" name="search" id="search"
                               class="form-control float-right"
                               placeholder="Search..." value="{{ $request['search'] ?? null }}"
                               aria-label="Search">
                    </div>
                </div>
                <div class="col-md-2 float-right">
                    <div class="col-md-12 text-lg-right">
                        <a href="" class="ml-4">
                            <input type="submit" class="px-5 btn btn-primary"/>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
        <table class="table table-custom table-lg mb-0" id="customers">
            <thead>
            <tr>
                <th></th>
                {{--                <th>--}}
                {{--                    <input class="form-check-input select-all" type="checkbox" data-select-all-target="#customers" id="defaultCheck1">--}}
                {{--                </th>--}}
                <th>ID</th>
                <th>Photo</th>
                <th>Fullname</th>
                <th>Email</th>
                <th>Country</th>
                <th>Date</th>
                <th>Status</th>
                <th class="text-end">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <input class="form-check-input" type="checkbox">
                </td>
                <td>
                    <a href="https://vetra.laborasyon.com/demos/default/customers.html#">#1</a>
                </td>
                <td>
                    <div class="avatar avatar-info">
                        <span class="avatar-text rounded-circle">A</span>
                    </div>
                </td>
                <td>Arlan Pond</td>
                <td>apond0@nytimes.com</td>
                <td>Brazil</td>
                <td>1/11/2021</td>
                <td>
                    <span class="badge bg-success">Active</span>
                </td>
                <td class="text-end">
                    <div class="d-flex">
                        <div class="dropdown ms-auto">
                            <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                               data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Show</a>
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Edit</a>
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Delete</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="form-check-input" type="checkbox">
                </td>
                <td>
                    <a href="https://vetra.laborasyon.com/demos/default/customers.html#">#2</a>
                </td>
                <td>
                    <div class="avatar avatar-secondary">
                        <span class="avatar-text rounded-circle">B</span>
                    </div>
                </td>
                <td>Billi Cicero</td>
                <td>bcicero1@wiley.com</td>
                <td>Indonesia</td>
                <td>11/20/2020</td>
                <td>
                    <span class="badge bg-danger">Passive</span>
                </td>
                <td class="text-end">
                    <div class="d-flex">
                        <div class="dropdown ms-auto">
                            <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                               data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Show</a>
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Edit</a>
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Delete</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="form-check-input" type="checkbox">
                </td>
                <td>
                    <a href="https://vetra.laborasyon.com/demos/default/customers.html#">#3</a>
                </td>
                <td>
                    <div class="avatar avatar-warning">
                        <span class="avatar-text rounded-circle">T</span>
                    </div>
                </td>
                <td>Thorpe Hawksley</td>
                <td>thawksley2@senate.gov</td>
                <td>France</td>
                <td>10/20/2020</td>
                <td>
                    <span class="badge bg-success">Active</span>
                </td>
                <td class="text-end">
                    <div class="d-flex">
                        <div class="dropdown ms-auto">
                            <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                               data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Show</a>
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Edit</a>
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Delete</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="form-check-input" type="checkbox">
                </td>
                <td>
                    <a href="https://vetra.laborasyon.com/demos/default/customers.html#">#4</a>
                </td>
                <td>
                    <div class="avatar avatar-danger">
                        <span class="avatar-text rounded-circle">H</span>
                    </div>
                </td>
                <td>Horacio Versey</td>
                <td>hversey3@illinois.edu</td>
                <td>China</td>
                <td>1/15/2021</td>
                <td>
                    <span class="badge bg-success">Active</span>
                </td>
                <td class="text-end">
                    <div class="d-flex">
                        <div class="dropdown ms-auto">
                            <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                               data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Show</a>
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Edit</a>
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Delete</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="form-check-input" type="checkbox">
                </td>
                <td>
                    <a href="https://vetra.laborasyon.com/demos/default/customers.html#">#5</a>
                </td>
                <td>
                    <div class="avatar avatar-success">
                        <span class="avatar-text rounded-circle">R</span>
                    </div>
                </td>
                <td>Raphael Dampney</td>
                <td>rdampney4@reference.com</td>
                <td>Portugal</td>
                <td>8/17/2020</td>
                <td>
                    <span class="badge bg-success">Active</span>
                </td>
                <td class="text-end">
                    <div class="d-flex">
                        <div class="dropdown ms-auto">
                            <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                               data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Show</a>
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Edit</a>
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Delete</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="form-check-input" type="checkbox">
                </td>
                <td>
                    <a href="https://vetra.laborasyon.com/demos/default/customers.html#">#6</a>
                </td>
                <td>
                    <div class="avatar avatar-info">
                        <span class="avatar-text rounded-circle">A</span>
                    </div>
                </td>
                <td>Arlan Pond</td>
                <td>apond0@nytimes.com</td>
                <td>Brazil</td>
                <td>1/11/2021</td>
                <td>
                    <span class="badge bg-success">Active</span>
                </td>
                <td class="text-end">
                    <div class="d-flex">
                        <div class="dropdown ms-auto">
                            <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                               data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Show</a>
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Edit</a>
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Delete</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="form-check-input" type="checkbox">
                </td>
                <td>
                    <a href="https://vetra.laborasyon.com/demos/default/customers.html#">#7</a>
                </td>
                <td>
                    <div class="avatar avatar-secondary">
                        <span class="avatar-text rounded-circle">B</span>
                    </div>
                </td>
                <td>Billi Cicero</td>
                <td>bcicero1@wiley.com</td>
                <td>Indonesia</td>
                <td>11/20/2020</td>
                <td>
                    <span class="badge bg-danger">Passive</span>
                </td>
                <td class="text-end">
                    <div class="d-flex">
                        <div class="dropdown ms-auto">
                            <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                               data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Show</a>
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Edit</a>
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Delete</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="form-check-input" type="checkbox">
                </td>
                <td>
                    <a href="https://vetra.laborasyon.com/demos/default/customers.html#">#8</a>
                </td>
                <td>
                    <div class="avatar avatar-warning">
                        <span class="avatar-text rounded-circle">T</span>
                    </div>
                </td>
                <td>Thorpe Hawksley</td>
                <td>thawksley2@senate.gov</td>
                <td>France</td>
                <td>10/20/2020</td>
                <td>
                    <span class="badge bg-success">Active</span>
                </td>
                <td class="text-end">
                    <div class="d-flex">
                        <div class="dropdown ms-auto">
                            <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                               data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Show</a>
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Edit</a>
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Delete</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="form-check-input" type="checkbox">
                </td>
                <td>
                    <a href="https://vetra.laborasyon.com/demos/default/customers.html#">#9</a>
                </td>
                <td>
                    <div class="avatar avatar-danger">
                        <span class="avatar-text rounded-circle">H</span>
                    </div>
                </td>
                <td>Horacio Versey</td>
                <td>hversey3@illinois.edu</td>
                <td>China</td>
                <td>1/15/2021</td>
                <td>
                    <span class="badge bg-success">Active</span>
                </td>
                <td class="text-end">
                    <div class="d-flex">
                        <div class="dropdown ms-auto">
                            <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                               data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Show</a>
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Edit</a>
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Delete</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="form-check-input" type="checkbox">
                </td>
                <td>
                    <a href="https://vetra.laborasyon.com/demos/default/customers.html#">#10</a>
                </td>
                <td>
                    <div class="avatar avatar-success">
                        <span class="avatar-text rounded-circle">R</span>
                    </div>
                </td>
                <td>Raphael Dampney</td>
                <td>rdampney4@reference.com</td>
                <td>Portugal</td>
                <td>8/17/2020</td>
                <td>
                    <span class="badge bg-success">Active</span>
                </td>
                <td class="text-end">
                    <div class="d-flex">
                        <div class="dropdown ms-auto">
                            <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                               data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Show</a>
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Edit</a>
                                <a href="https://vetra.laborasyon.com/demos/default/customers.html#"
                                   class="dropdown-item">Delete</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
@push('style')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
@endpush
