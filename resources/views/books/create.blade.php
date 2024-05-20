@include('includes.init')
@include('includes.navbar')
<h1>Books create</h1>
<form method="POST" action="{{ route('books.store') }}">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description">
    </div>
    <div class="mb-3">
        <label for="author" class="form-label">Author</label>
        <input type="text" class="form-control" id="author" name="author">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="price">
    </div>
    <div class="mb-3">
        <label for="img" class="form-label">Image url</label>
        <input type="text" class="form-control" id="img" name="img">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

</form>

  @include('includes.footer')