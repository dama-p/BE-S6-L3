@include('includes.init')
@include('includes.navbar')

<img src=" {{ $book->img }}"></img>
<h1>{{ $book->title }}</h1>




@include('includes.footer')