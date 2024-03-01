@extends('Layouts.main')
@section('details')
<div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="py-3 mb-4">Dashboard/User</h4>

                    <div class="col-md mb-4 mb-md-2">

                        <form action="{{ route('users.index') }}">

                            <div class="accordion mt-3" id="accordionExample">
                                <div class="card accordion-item active">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button type="button" class="accordion-button" data-bs-toggle="collapse"
                                            data-bs-target="#accordionOne" aria-expanded="true" aria-controls="accordionOne">
                                            Filter User
                                        </button>
                                    </h2>

                                    <div id="accordionOne" class="accordion-collapse collapse show m-2"
                                        data-bs-parent="#accordionExample">
                                        <div class="row">
                                            <div class="accordion-body col-md-6">
                                                <label class="form-label">Name</label></br>
                                                <input type="text" class="form-control" placeholder="Name"name="name"
                                                    value="{{ $request->name ?? '' }}">
                                            </div>
                                            <div class="accordion-body col-md-6">
                                                <label class="form-label">Mobile Number</label></br>
                                                <input type="text" class="form-control" placeholder="Mobile Number"
                                                    name="mobile_number" value="{{ $request->mobile_number ?? '' }}">
                                            </div>

                                            <div class="accordion-body col-md-3">
                                                <label class="form-label">State</label><br>
                                                <select class="form-select" name="state">
                                                    <option value="">Select State</option>
                                                    @foreach ($states as $state)
                                                        <option value="{{ $state }}"
                                                            {{ $request->state == $state ? 'selected' : '' }}>
                                                            {{ $state }}</option>
                                                        {{-- <option value="{{ $state }}">{{ $state }} --}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="accordion-body col-md-3">
                                                <label class="form-label">City</label><br>
                                                <select class="form-select" name="city">
                                                    <option value="">Select City</option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city }}"
                                                            {{ $request->city == $city ? 'selected' : '' }}>{{ $city }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="accordion-body col-md-3">
                                                <label class="form-label">Start Date</label><br>
                                                <input type="datetime-local" class="form-control" name="start_date"
                                                    value="{{ old('start_date', $request->start_date) }}">
                                            </div>
                                            <div class="accordion-body col-md-3">
                                                <label class="form-label">End Date</label><br>
                                                <input type="datetime-local" class="form-control" name="end_date"
                                                    value="{{ old('end_date', $request->end_date) }}">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 mb-2">
                                                    <button type="submit" class=" btn btn-info m-2">
                                                        Submit
                                                    </button>
                                                    <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                        </form>
                        <div class="card mt-4">
                            <div class="row">
                                <div class="col-md-10">
                                    <h5 class="card-header">User Management</h5>
                                </div>
                                <div class=" col-md-2 mt-3 float-end">
                                    <a href="#" class="btn btn-info">Add User</a>
                                </div>
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><b>@sortablelink('name', 'Name')</b></th>
                                            <th><b>@sortablelink('mobile_number', 'Mobile Number')</b></th>
                                            <th><b>@sortablelink('email', 'Email')</b></th>
                                            <th><b>@sortablelink('city', 'City')</b></th>
                                            <th><b>@sortablelink('address', 'Address')</b></th>
                                            <th><b>@sortablelink('state', 'State')</b></th>
                                            <th><b>@sortablelink('gender', 'Gender')</b></th>
                                            <th><b>Actions</b></th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->mobile_number }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->city }}</td>
                                                <td class="address" onclick="copyToClipboard(this.textContent)">
                                                    {{ $user->address }}</td>
                                                <td>{{ $user->state }}</td>
                                                <td>
                                                    @if ($user->gender == 1)
                                                        <span class="badge bg-label-primary">Male</span>
                                                    @elseif($user->gender == 2)
                                                        <span class="badge bg-label-success">Female</span>
                                                    @elseif($user->gender == 3)
                                                        <span class="badge bg-label-info">Other</span>
                                                    @else
                                                        Unknown
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('users.edit', $user->id) }}">
                                                                <i class="ti ti-pencil me-1"></i> Edit
                                                            </a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('users.delete', $user->id) }}">
                                                                <i class="ti ti-trash me-1"></i> Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                            <div class="mt-5 m-3">
                                {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->
               </div>

@endsection
