<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Login Page</title>
  </head>
  <body>
    
    <div class="container mt-3">
        <h2>Registration Page</h2>
    </div>
    
    <div class="container">
        @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
        @endif
    </div>

    <div class="container mt-4">
        * Required
    </div>
    
    <form action="/registration" method="post">
    @csrf
        <div class="container">
            <div class="row mt-2">
                <div class="col">
                    First Name*
                    <input type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" placeholder="First Name">
                    @error('firstName')
                                <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    Last Name*
                    <input type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" placeholder="Last Name">
                    @error('lastName')
                                <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    Address*
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address">
                    @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    Email*
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email">
                    @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    Phone Number*
                    <input type="Number" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone Number">
                    @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    Password*
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                    @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    Confirm Password*
                    <input type="password" class="form-control @error('confirmPassword') is-invalid @enderror" name="confirmPassword" placeholder="Password">
                    @error('confirmPassword')
                                <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <button type="submit" class="btn btn-primary">Create Account</button>
                </div>
            </div>
        </div>
    </form>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
