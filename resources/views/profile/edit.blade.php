@extends('admin.layouts.main', ['title' => 'Account Siswa'])

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="row">
            <div class="col">
                <!-- Account edit card-->
                <div class="card mb-4">
                    <div class="card-header">Edit Profile</div>
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <h4>Account</h4>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputName">Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" name="name"
                                    id="inputName" type="text" placeholder="Enter name"
                                    value="{{ old('name', $student->user->name) }}" />
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control @error('email') is-invalid @enderror" id="inputEmailAddress"
                                    name="email" type="email" placeholder="Enter email address"
                                    value="{{ old('email', $student->user->email) }}" />
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputPassword">Password (Optional)</label>
                                <input class="form-control @error('password') is-invalid @enderror" id="inputPassword"
                                    name="password" type="password" placeholder="Enter password" />
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-check mt-1">
                                    <input type="checkbox" class="form-check-input" id="showPasswordCheckbox">
                                    <label class="form-check-label" for="showPasswordCheckbox">Show Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <h4>Detail Account</h4>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputNis">NIS</label>
                                <input class="form-control @error('nis') is-invalid @enderror" name="nis" id="inputNis"
                                    type="number" placeholder="Enter NIS" value="{{ old('nis', $student->nis) }}" />
                                @error('nis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="seletJurusan">Jurusan</label>
                                <select class="form-control @error('jurusan') is-invalid @enderror"
                                    aria-label="Select Jurusan" id="selectJurusan" name="jurusan">
                                    <option selected disabled>Pilih</option>
                                    <option {{ old('jurusan', $student->jurusan) == 'akl 1' ? 'selected' : null }}
                                        value="akl 1">AKL 1
                                    </option>
                                    <option {{ old('jurusan', $student->jurusan) == 'akl 2' ? 'selected' : null }}
                                        value="akl 2">AKL 2
                                    </option>
                                    <option {{ old('jurusan', $student->jurusan) == 'bdp 1' ? 'selected' : null }}
                                        value="bdp 1">BDP 1
                                    </option>
                                    <option {{ old('jurusan', $student->jurusan) == 'bdp 2' ? 'selected' : null }}
                                        value="bdp 2">BDP 2
                                    </option>
                                    <option {{ old('jurusan', $student->jurusan) == 'otkp 1' ? 'selected' : null }}
                                        value="otkp 1">OTKP 1
                                    </option>
                                    <option {{ old('jurusan', $student->jurusan) == 'otkp 2' ? 'selected' : null }}
                                        value="otkp 2">OTKP 2
                                    </option>
                                    <option {{ old('jurusan', $student->jurusan) == 'dkv' ? 'selected' : null }}
                                        value="dkv">DKV</option>
                                    <option {{ old('jurusan', $student->jurusan) == 'rpl' ? 'selected' : null }}
                                        value="rpl">RPL</option>
                                </select>
                                @error('jurusan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="seletKelas">Kelas</label>
                                <select class="form-control @error('kelas') is-invalid @enderror" aria-label="Select Kelas"
                                    id="selectKelas" name="kelas">
                                    <option selected disabled>Pilih</option>
                                    <option {{ old('kelas', $student->kelas) == '10' ? 'selected' : null }} value="10">
                                        10
                                    </option>
                                    <option {{ old('kelas', $student->kelas) == '11' ? 'selected' : null }} value="11">
                                        11
                                    </option>
                                    <option {{ old('kelas', $student->kelas) == '12' ? 'selected' : null }} value="12">
                                        12
                                    </option>
                                </select>
                                @error('kelas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="seletGender">Jenis Kelamin</label>
                                <select class="form-control @error('gender') is-invalid @enderror"
                                    aria-label="Select Jenis Kelamin" id="selectGender" name="gender">
                                    <option selected disabled>Pilih</option>
                                    <option {{ old('gender', $student->gender) == 'L' ? 'selected' : null }}
                                        value="L">
                                        Laki-laki
                                    </option>
                                    <option {{ old('gender', $student->gender) == 'P' ? 'selected' : null }}
                                        value="P">
                                        Perempuan
                                    </option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Submit button-->
                            <button class="btn btn-primary" type="submit">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Saat checkbox "Show Password" diubah
            $("#showPasswordCheckbox").change(function() {
                var passwordInput = $("#inputPassword");
                if (this.checked) {
                    passwordInput.attr("type", "text"); // Ubah tipe input menjadi teks
                } else {
                    passwordInput.attr("type", "password"); // Ubah tipe input menjadi password
                }
            });
        });
    </script>
@endpush
