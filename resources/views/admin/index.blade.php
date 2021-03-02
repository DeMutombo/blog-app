
<x-admin-master>
   @section('content')
   <h1 class="h3 mb-4 text-gray-800">Admin Dashboard</h1>    
    <!-- Page Heading -->
    @if (session('status'))
      <div class="alert alert-danger" role="alert">
        {{ session('status') }}
      </div> 
    @endif
    @if (session('update-success'))
      <div class="alert alert-success" role="alert">
        {{ session('update-success') }}
      </div> 
    @endif
    <!-- DataTales Example -->
    @if ($posts->count() === 0)
        <div class="text-center">
          <h3>You currently do not have any posts to see</h3>
        </div>
      @else
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">All Posts</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Owner</th>
                  <th scope="col">Title</th>
                  <th scope="col">Image</th>
                  <th scope="col">Created at</th>
                  <th scope="col">Updated at</th>
                  <th scope="col">delete</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Owner</th>
                  <th scope="col">Title</th>
                  <th scope="col">Image</th>
                  <th scope="col">Created at</th>
                  <th scope="col">Updated at</th>
                  <th scope="col">delete</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($posts as $post)
                <tr>
                  <th scope="row">{{ $post->id }}</th>
                  <td>{{ $post->user->name }}</td>
                  <td> <a href="/admin/{{ $post->id }}/edit">{{ $post->title }}</a></td>
                  <td><img src="/images/{{ $post->post_image }}" width="140" height="50" alt=""></td>
                  <td>{{ $post->created_at->diffForHumans() }}</td>
                  <td>{{ $post->updated_at->diffForHumans() }}</td>
                  <td>
                    <form action="/admin/{{ $post->id }}" method="POST">
                      @method('DELETE')
                      @csrf
                      <input type="submit"  class="btn btn-danger" value="Delete">
                    </form>
                    
                </tr>             
                @endforeach
             </tbody>
            </table>
          </div>
        </div>
      </div> 
      <div class="d-flex">
        <div class="mx-auto">
          {{ $posts->links() }} 
        </div>
      </div>
    @endif

    @endsection
    @section('scripts')
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  
    <!-- Page level custom scripts -->
    {{-- <script src="js/demo/datatables-demo.js"></script> --}}
    @endsection
</x-admin-master>
