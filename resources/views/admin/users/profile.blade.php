<x-admin-master>
    @section('content')
    <div class="row">
        <div class="col-6">
            <div class="card mb-3" style="max-width: 600px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="https://source.unsplash.com/QAB-WJcbgJk/60x60" class="card-img" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h6 class="card-title">Welcome {{ $user->name }}</h6>
                      <p class="card-text">Name: {{ $user->name }}</p>
                      <p class="card-text">Email: {{ $user->email }}</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="custom-file">
                <input type="file">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <form method="post" action="" enctype="multipart/form-data">
                @csrf
                  <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" name="name" class="form-control @error('name') border border-danger @enderror" value="{{ $user->name }}" required>
                    @error('title')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="title">Email</label>
                    <input type="text" name="email" class="form-control @error('email') border border-danger @enderror" value="{{ $user->email }}" required>
                    @error('title')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="title">Password</label>
                    <input type="password" name="password" class="form-control @error('password') border border-danger @enderror" value="{{ $user->password }}" required>
                    @error('title')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary">Update</button>
              </form>
        </div>
    </div>


    @endsection
</x-admin-master>