<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container-fluid shadow">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <header class="d-flex align-items-center justify-content-between py-4">
              <div class="logo">
                <a href="#" class="text-dark text-decoration-none fs-5 fw-bold">Company Logo</a>
              </div>
              <div class="user">
                <div class="dropdown">
                  <button class="btn btn-dark dropdown-toggle text-capitalize" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Hello, {{Auth::user()->name}}
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('account.logout') }}">Log Out</a></li>
                  </ul>
                </div>
              </div>
            </header>
          </div>
        </div>
      </div>
        
    </div>
    <div class="container">
      <h1>Customer dashboard</h1>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>