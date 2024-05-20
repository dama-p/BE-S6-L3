@include('includes.init')
@include('includes.navbar')
  {{--  {{dd($books)}}  --}}


    <div class="row">
  @forelse ( $books as $book )

  <div class="card col-6 col-md-3 gx-3">
    <img src="{{$book->img}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{$book->title}}</h5>
      <p class="card-text">{{$book->description}}</p>
      <p>{{$book->price}}</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
      
  @empty

  <p>No books</p>
      
  @endforelse

</div>
@include('includes.footer')
