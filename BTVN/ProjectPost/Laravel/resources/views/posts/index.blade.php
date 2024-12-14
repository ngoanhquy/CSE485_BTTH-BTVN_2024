<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Manage Posts</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
        crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand h1" href="{{ route('posts.index') }}">CRUDPosts</a>
      <div class="justify-content-end">
        <a class="btn btn-sm btn-success" href="{{ route('posts.create') }}">
          <i class="bi bi-plus-circle"></i> Add Post
        </a>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4>Manage <strong>Posts</strong></h4>
    </div>

    <!-- Table Section -->
    <div class="table-responsive">
      <table class="table table-striped table-bordered align-middle">
        <thead class="table-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->body }}</td>
            <td>
              <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">
                <i class="bi bi-pencil"></i> Edit
              </a>
              <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                  <i class="bi bi-trash"></i> Delete
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
          integrity="sha384-w76AqAovpFkFfRrnhFbUsCiWljhoYB4Xxj3M9pwQV12hXHn0hJw7dM86dKHPPc/G" 
          crossorigin="anonymous"></script>
</body>

</html>








































<!-- <!DOCTYPE html> 
<html lang="en"> 
<head> 
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial
scale=1.0"> 
  <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0
alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384
GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
crossorigin="anonymous"> 
  <title>Posts</title> 
</head> 
<body> 
  
  <nav class="navbar navbar-expand-lg navbar-light bg-warning"> 
    <div class="container-fluid"> 
      <a class="navbar-brand h1" href={{ route('posts.index') 
}}>CRUDPosts</a> 
      <div class="justify-end "> 
        <div class="col "> 
          <a class="btn btn-sm btn-success" href={{ 
route('posts.create') }}>Add Post</a> 
        </div> 
      </div> 
    </div> 
  </nav> 
  <div class="container mt-5"> 
    <div class="row"> 
      @foreach ($posts as $post) 
        <div class="col-sm"> 
          <div class="card"> 
            <div class="card-header"> 
              <h5 class="card-title">{{ $post->title }}</h5> 
            </div> 
            <div class="card-body"> 
              <p class="card-text">{{ $post->body }}</p> 
            </div> 
            <div class="card-footer"> 
              <div class="row"> 
                <div class="col-sm"> 
                  <a href="{{ route('posts.edit', $post->id) }}" 
            class="btn btn-primary btn-sm">Edit</a> 
                </div> 
                <div class="col-sm"> 
                    <form action="{{ route('posts.destroy', $post->id) 
}}" method="post"> 
                      @csrf 
                      @method('DELETE') 
                      <button type="submit" class="btn btn-danger btn
sm">Delete</button> 
                    </form> 
                </div> 
              </div> 
            </div> 
</div> 
</div> 
@endforeach 
</div> 
</div> 
</body> 
</html> -->