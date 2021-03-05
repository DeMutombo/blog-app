
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
     @if (session('user-deleted'))
         <div class="alert alert-danger">
          {{ session('user-deleted') }}
         </div>
     @endif
     <!-- DataTales Example -->
     @if ($users->count() === 0)
         <div class="text-center">
           <h3>There are no users</h3>
         </div>
       @else
       <div class="card shadow mb-4">
         <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
         </div>
         <div class="card-body">
           <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                 <tr>
                   <th scope="col">Id</th>
                   <th scope="col">Avatar</th>
                   <th scope="col">User name</th>
                   <th scope="col">Name</th>
                   <th scope="col">Role</th>
                   <th scope="col">email</th>
                   <th scope="col">Created at</th>
                   <th scope="col">Updated at</th>
                   <th scope="col">delete</th>
                 </tr>
               </thead>
               <tbody>
                @foreach ($users as $user)
                <tr>
                  <th scope="row">{{ $user->id }}</th>
                  <td class="text-center"><img src="/images/{{ $user->avatar }}" height="40px" alt=""></td>
                  <td>{{ $user->username }}</td>
                  <td>{{ $user->name }}</td>
                  <td>@foreach ($user->roles as $role)
                      {{ $role->name }}
                  @endforeach</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->created_at->diffForHumans() }}</td>
                  <td>{{ $user->updated_at->diffForHumans() }}</td>
                  <td>
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                      @method('DELETE')
                      @csrf
                      <input type="submit"  class="btn btn-danger" value="Delete">
                    </form>
                    
                </tr>             
                @endforeach
             </tbody>
               <tfoot>
                 <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Avatar</th>
                  <th scope="col">User name</th>
                  <th scope="col">Name</th>
                  <th scope="col">Role</th>
                  <th scope="col">email</th>
                  <th scope="col">Created at</th>
                  <th scope="col">Updated at</th>
                  <th scope="col">delete</th>
                 </tr>
               </tfoot>
              
             </table>
           </div>
         </div>
       </div> 
       {{-- <div class="d-flex">
         <div class="mx-auto">
           {{ $users->links() }} 
         </div>
       </div> --}}
     @endif

      {{-- Admin Delete Modal --}}
      <div class="modal fade" id="adminDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              {{-- <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a> --}}
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger" >Logout</button>
              </form>
            </div>
          </div>
        </div>
      </div>
     @endsection
     @section('scripts')
     <script src="vendor/datatables/jquery.dataTables.min.js"></script>
     <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
   
     <!-- Page level custom scripts -->
     {{-- <script src="js/demo/datatables-demo.js"></script> --}}
     @endsection
 </x-admin-master>
 