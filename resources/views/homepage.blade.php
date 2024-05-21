@include('includes.init')
@include('includes.navbar')

<h1>Homepage </h1>


<div class="row">
    @forelse ( $books as $book )
  
    <div class="card col-6 col-md-3 gx-3">
      <img src="{{$book->img}}" class="card-img-top" alt="...">
      <div class="card-body">
          <a href=" {{ route('books.show', ['book' => $book]) }} "> <h5 class="card-title">{{$book->title}}</h5></a>
        <p class="card-text">{{$book->description}}</p>
        <p>{{$book->price}}</p>
        @auth
        @if (Auth::user()->id === $book->user_id)
        <a class="btn btn-warning" href="{{ route('books.edit', ['book' => $book]) }}">Edit</a>
        <form method="POST" action=" {{ route('books.destroy', ['book' => $book]) }}">
          @method('DELETE') 
          @csrf
          <button class="btn btn-danger">Delete</button>
          @endif
        @endauth
        
          </form>
      </div>
    </div>
        
    @empty
  
    <p>No books</p>
        
    @endforelse
  
  </div>

@include('includes.footer')