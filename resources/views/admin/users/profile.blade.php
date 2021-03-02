<x-admin-master>
    @section('content')
    <div class="row">
        <div class="col-6">
            <div class="card mb-3" style="max-width: 680px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="/images/{{ $user->avatar }}" class="card-img" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      {{-- <h6 class="card-title">Welcome {{ $user->username }}</h6> --}}
                      <p><span class="fw-bold mr-3"> Username:</span>  {{ $user->username }}</p>
                      <p><span class="fw-bold mr-3">Name: </span>{{ $user->name }}</p>
                      <p class="card-text">Email: {{ $user->email }}</p>
                      <p class="card-text">Role: @foreach ($user->roles as $role)
                        {{ $role->name }}
                      @endforeach</p>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <form method="post" action="{{ route('user.profile.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                  <div class="form-group">
                    <label for="avatar">Avator</label>
                    <input type="file" name="avatar" class="form-control pb-2">
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control @error('username') border border-danger @enderror" value="{{ $user->username }}" required>
                    @error('username')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control @error('name') border border-danger @enderror" value="{{ $user->name }}" required>
                    @error('title')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control @error('email') border border-danger @enderror" value="{{ $user->email }}" required>
                    @error('email')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control @error('password') border border-danger @enderror" value="{{ $user->password }}" required>
                    @error('password')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  </div>
                  <button type="submit" class="btn btn-primary">Update</button>
              </form>
        </div>
    </div>


    @endsection
</x-admin-master>