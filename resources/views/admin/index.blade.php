
<x-admin-master>
   @section('content')
   <h1 class="h3 mb-4 text-gray-800">Admin Dashboard</h1>  
   {{-- <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Owner</th>
          <th scope="col">Title</th>
          <th scope="col">Image</th>
          <th scope="col">Created at</th>
          <th scope="col">Updated at</th>
        </tr>
      </thead>
      <tbody>
         @foreach ($posts as $post)
         <tr>
           <th scope="row">{{ $post->id }}</th>
           <td>{{ $post->user->name }}</td>
           <td>{{ $post->title }}</td>
           <td><img src="/images/{{ $post->post_image }}" width="140" height="50" alt=""></td>
           <td>{{ $post->created_at->diffForHumans() }}</td>
           <td>{{ $post->updated_at->diffForHumans() }}</td>
         </tr>             
         @endforeach
      </tbody>
    </table>      --}}


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
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
    @endsection
    @section('scripts')
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    @endsection
</x-admin-master>
