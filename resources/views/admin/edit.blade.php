<x-admin-master>
    @section('content')
    <h1 class="h3 mb-4 text-gray-800">Update post</h1> 
    <div class="row">
        <div class="col-7">
            <form method="post" action="{{ route('admin.update', $post->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" name="title" class="form-control" aria-describedby="emailHelp" value="{{ $post->title }}" >
                  @error('title')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Post body</label>
                    <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="12">{{ $post->body }}</textarea>
                    @error('body')
                    <div class="text-danger">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Excert</label>
                  <input type="text" name="slug" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{  $post->slug   }}">
                  @error('slug')
                    <div class="text-danger">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <div><img src="/images/{{ $post->post_image }}" width="120" height="60" alt="{{ $post->title}} image"></div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                          <input type="file" name="post_image" class="custom-file-input" id="inputGroupFile01">
                          <label class="custom-file-label" for="post_image">Choose file</label>
                        </div>
                      </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form> 
        </div>
    </div>

    @endsection
 </x-admin-master>