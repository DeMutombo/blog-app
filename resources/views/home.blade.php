<x-home-master>
    @section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
             {{ session('success') }}
        </div>
    @endif
    
    @if (session('user-deleted'))
      <div class="alert alert-danger" role="alert">
        {{ session('user-deleted') }}
      </div> 
    @endif
    <h1 class="my-4">Page Heading
        <small>Secondary Text</small>
    </h1>

    <!-- Blog Post -->
    @foreach ($posts as $post)
    <div class="card mb-4">
        <img class="card-img-top" src="/images/{{$post->post_image }}" alt="Card image cap">
        <div class="card-body">
        <h2 class="card-title">{{ $post->title }}</h2>
        <p class="card-text">{{ $post->slug }}</p>
        <a href="post/{{ $post->id}}" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
        Posted on {{ Carbon\Carbon::parse($post->created_at)->toDateString() }} by
        <a href="#">{{ $post->user->name }}</a>
        </div>
    </div>        
    @endforeach

    <!-- Pagination -->
    {{-- <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
        <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
        <a class="page-link" href="#">Newer &rarr;</a>
        </li>
    </ul> --}}
    <ul class="pagination justify-content-center mb-4">
        {{ $posts->links() }} 
    </ul>
    
        
        
    
    @endsection
</x-home-master>