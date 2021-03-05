<x-admin-master>
    @section('content')
    <h1 class="h3 mb-4 text-gray-800">Create a Post</h1> 
    <div class="row">
        <div class="col-7">
            <form method="post" action="{{ route('admin.store') }}" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" class="form-control @error('title') border border-danger @enderror" placeholder="Enter title" value="{{ old('title') }}" required>
                  @error('title')
                    <div class="text-danger">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Post body</label>
                    <textarea class="form-control @error('body') border border-danger @enderror" name="body" id="exampleFormControlTextarea1" rows="12" required>{{ old('body') }}</textarea>
                    @error('body')
                        <div class="tex-danger">
                          {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="excert">Excert</label>
                  <input type="text" name="slug" class="form-control @error('body') border border-danger @enderror" id="exampleInputEmail1"  placeholder="Enter excert" value="{{ old('slug') }}">
                  @error('slug')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                          <label for="post_image">Post Image</label>
                          <input type="file" name="post_image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form> 
        </div>
    </div>

    @endsection
 </x-admin-master>