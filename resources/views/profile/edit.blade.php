@extends('template.master')
@section('title', 'Edit Profile')
@section('content')
    <form action="{{ route('profile.update') }}" method="post">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Update Informasi Pribadi</h6>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value={{ old('name', $user->name) }}>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value={{ old('email', $user->email) }}>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a class="btn btn-secondary mr-2" href="{{ route('dashboard') }}">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="{{ route('password.update') }}" method="post">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Update Password</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="current_password">Password Saat Ini</label>
                            <input type="password" class="form-control @if($errors->updatePassword->get('current_password')) is-invalid @endif"
                                id="current_password" name="current_password">
                                @if ($errors->updatePassword->get('current_password'))
                            @foreach ($errors->updatePassword->get('current_password') as $error)
                                <div class="text-sm-left text-danger">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Password Baru</label>
                            <input type="password" class="form-control @if($errors->updatePassword->get('password')) is-invalid @endif"
                                id="password" name="password">
                                @if ($errors->updatePassword->get('password'))
                                @foreach ($errors->updatePassword->get('password') as $error)
                                    <div class="text-sm-left text-danger">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control @if($errors->updatePassword->get('password_confirmation')) is-invalid @endif"
                                id="password_confirmation" name="password_confirmation">
                                @if ($errors->updatePassword->get('password_confirmation'))
                                @foreach ($errors->updatePassword->get('password_confirmation') as $error)
                                    <div class="text-sm-left text-danger">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="card-footer d-flex  justify-content-end">
                        <a class="btn btn-secondary mr-2" href="{{ route('dashboard') }}">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
