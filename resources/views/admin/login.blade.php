<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto my-5">
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
                <div class="form_wrapper shadow rounded overflow-hidden">
                    <div class="text-center py-2 bg-dark text-white"><h2>Login</h2></div>
                    <form class="p-4" action="{{ route('admin.authenticate')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="Email" class="form-label">Email address</label>
                            <input type="email" value="{{ old ('email')}}" class="form-control shadow-none @error('email') is-invalid @enderror" id="Email" name="email">
                            @error('email')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password" value="{{ old ('password')}}" class="form-control shadow-none @error('password') is-invalid @enderror" id="Password" name="password">
                            @error('password')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-dark w-100">Login</button>
                        <div class="text-center mt-2"><a href="{{ route('account.register')}}" class="btn">Create new account</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

  </body>
</html>