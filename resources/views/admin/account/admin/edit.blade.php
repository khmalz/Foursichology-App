@extends('admin.layouts.main')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="row">
            <div class="col">
                <!-- Account edit card-->
                <div class="card mb-4">
                    <div class="card-header">Admin Account Edit</div>
                    <div class="card-body">
                        <form action="{{ route('account.admin.update', $user->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="small mb-1" for="inputName">Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" name="name"
                                    id="inputName" type="text" placeholder="Enter your name"
                                    value="{{ old('name', $user->name) }}" />
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control @error('email') is-invalid @enderror" id="inputEmailAddress"
                                    name="email" type="email" placeholder="Enter your email address"
                                    value="{{ old('email', $user->email) }}" />
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputPassword">Password (Optional)</label>
                                <input class="form-control @error('password') is-invalid @enderror" id="inputPassword"
                                    name="password" type="password" placeholder="Enter your password" />
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Submit button-->
                            <button class="btn btn-primary" type="submit">Edit admin</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
