<x-admin-master>
    @section('content')
    <h1 class="h3 mb-4 text-gray-800">Create a Post</h1> 
    <div class="row">
        <div class="col-7">
            <form method="post" action="{{ route('admin.store') }}" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter title" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Post body</label>
                    <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="12" required></textarea>
                </div>
                <div class="form-group">
                  <label for="excert">Excert</label>
                  <input type="text" name="excert" class="form-control" id="exampleInputEmail1"  placeholder="Enter excert">
                </div>
                <div class="form-group">
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
                <button type="submit" class="btn btn-primary">Create</button>
            </form> 
        </div>
    </div>

    @endsection
 </x-admin-master>