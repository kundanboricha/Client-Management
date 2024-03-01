@extends('Layouts.main')
@section('details')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">Dashboard/Edit Client</h4>

        <div class="col-md mb-4 mb-md-2">

            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Client Details</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $users->id }}">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-fullname">Name <span
                                                style="color:red">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                    class="ti ti-user"></i></span>
                                            <input type="text" class="form-control" name="name"
                                                id="basic-icon-default-fullname" placeholder=" Name" aria-label="John Doe"
                                                aria-describedby="basic-icon-default-fullname2" value="{{ $users->name }}">
                                        </div>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-company">Mobile Number<span
                                                style="color:red">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-company2" class="input-group-text"><i
                                                    class="ti ti-phone"></i></span>
                                            <input type="text" id="basic-icon-default-company" class="form-control"
                                                name="mobile_number" placeholder=" MobileNumber" aria-label="ACME Inc."
                                                aria-describedby="basic-icon-default-company2"
                                                value="{{ $users->mobile_number }}"readonly>
                                        </div>
                                        @error('mobile_number')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-email">Email</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="ti ti-mail"></i></span>
                                            <input type="text" id="basic-icon-default-email" name="email"
                                                class="form-control" placeholder=" Email" aria-label="john.doe"
                                                aria-describedby="basic-icon-default-email2" value="{{ $users->email }}">
                                            {{-- <span id="basic-icon-default-email2" class="input-group-text">@gmail.com</span> --}}
                                        </div>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-email">Gender<span style="color:red">*</span></label><br>
                                        <div class="form-check form-check-inline mt-2">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male"
                                                   @if (old('gender', $users->gender) == '1') checked @endif disabled>
                                            <label class="form-check-label" for="inlineRadio1">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female"
                                                   @if (old('gender', $users->gender) == '2') checked @endif disabled>
                                            <label class="form-check-label" for="inlineRadio2">Female</label>
                                        </div>
                                    
                                        @error('gender')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="user-city">City<span class="text-danger">
                                            *</span></label>
                                    <select id="user-city" class="select2 form-select" name="city" disabled style="background-color: unset">
                                        <option value="">Select City</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city }}"
                                                @if (old('city', $users->city) == $city) selected @endif>
                                                {{ $city }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('city')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="user-state">State<span class="text-danger">
                                            *</span></label>
                                    <select id="user-state" class="select2 form-select" name="state" disabled style="background-color: unset">
                                        <option value="">Select State</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state }}"
                                                @if (old('state', $users->state) == $state) selected @endif>
                                                {{ $city }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('state')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-fullname">Password<span
                                                class="text-danger"> *</span></label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="alignment-password" name="password"
                                                class="form-control" placeholder="············"
                                                aria-describedby="alignment-password2">
                                            <span class="input-group-text cursor-pointer" id="alignment-password2"><i
                                                    class="ti ti-eye-off"></i></span>
                                        </div>
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="basic-icon-default-fullname">Confirm Password<span
                                            class="text-danger"> *</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="alignment-password-confirmation"
                                            name="password_confirmation" class="form-control" placeholder="············"
                                            aria-describedby="alignment-password2">
                                        <span class="input-group-text cursor-pointer" id="alignment-password2"><i
                                                class="ti ti-eye-off"></i></span>
                                    </div>
                                    @error('password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-message">Address</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-message2" class="input-group-text"><i
                                            class="ti ti-message-dots"></i></span>
                                    <textarea id="basic-icon-default-message" name="address" class="form-control" placeholder="Enter Your Address"
                                        aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2" disabled style="background-color:white">
                                        {{ $users->address }}
                                    </textarea>
                                </div>
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                            <a href="{{ route('users.index') }}"
                                class="btn btn-danger text-white waves-effect waves-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
