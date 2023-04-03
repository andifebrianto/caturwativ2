<div class="container-fluid p-0 sticky-top">
  <h1 class="m-0 display-4 text-uppercase text-primary">Caturwati<span class="text-white font-weight-normal">Library</span></h1>
          </a>
  
  <header class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow">
    
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-0">
          <a href="index.php" class="navbar-brand d-block d-lg-none">
  
          <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3 " id="navbarCollapse">
              <div class="navbar-nav mr-auto py-0 " >
                  <a href="/" class="nav-item nav-link {{ ($title === "Home")  ? 'active' : '' }}">Home</a>
                  <a href="/categories" class="nav-item nav-link {{ Request::path() === 'categories' ? 'active':'' }}">Categories</a>
                  
  
                  @auth
                  <a href="/books" class="nav-item nav-link {{ Request::path() === 'books' ? 'active':'' }}">Books</a>
                  <a href="/gallery" class="nav-item nav-link {{ Request::path() === 'gallery' ? 'active':'' }}">Gallery</a>
                  <!-- admin blog -->
                  <a href="/blogadmin" class="nav-item nav-link {{ Request::path() === 'blog' ? 'active':'' }}">Blog</a>
                  <a href="/dashboard" class="nav-item nav-link {{ Request::path() === 'dashboard' ? 'active':'' }}">Dashboard</a>
                  
                  @else
                  <!-- user blog -->
                  <a href="/blog" class="nav-item nav-link {{ Request::path() === 'blog' ? 'active':'' }}">Blog</a>
                  @endauth
  
                  
                  <a href="/about" class="nav-item nav-link {{ Request::path() === 'about' ? 'active':'' }}" >About</a>
              </div>
              @auth
              <div class="" style="width: 100%; max-width: 850px;"> 
                  <form action="/books" class="w-100 rounded-0 border-0">
                      @if (request('kategori'))
                      <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                      @endif
      <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search" name="cari" value="{{ request('cari') }}">
                  </form>
              </div>
              <div class="navbar-nav mr-auto py-0">
                  <form action="/logout" method="post">
                      @csrf
                      <button type="submit" class="nav-item nav-link px-3 text-left bg-dark" style="color:red;">Logout</button>
                  </form>
  </div>
              @else
              <div class="navbar-nav ">
              <a href="/login" class="navbar-nav nav-item nav-link px-3 text-left {{ Request::path() === 'login' ? 'active':'' }}">LOGIN</a>
  </div>
              @endauth
              
  
  </header>