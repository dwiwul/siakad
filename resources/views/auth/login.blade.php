
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIAKAD - Masuk</title>

    <!-- Custom fonts for this template-->
    <link href="{{ url ('vendor/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet')}}" type="text/css">
    <link
        href="{{ url ('vendor/sbadmin/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i')}}"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url ('vendor/sbadmin/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="{{url('vendor/sbadmin/img/siakad.png')}}" >
                                            <h4 class="m-3 font-weight-bold text-primary">Masuk</h4>
                                    </div>
                                    @if (session('message'))
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-danger" role="alert">
                                                {{ session('message') }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                     @endif
                                     <form method="post" action="{{ url('/checklogin') }}">
                                            @csrf
                                     <br />
                                            <div class="form-group">
                                                <label class="small mb-1" for="username">Username</label>
                                                <input class="form-control py-4" id="username" name="username" type="text"
                                                    placeholder="Enter username" required />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4 {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                    id="inputPassword" type="password" placeholder="Enter password" name="password">
                                                @if ($errors->has('password'))
                                                    <div class="invalid-feedback"> {{ $errors->first('password') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                {{-- <a class="small" href="{{ route('password.request') }}">Lupa Password?</a> --}}
                                                <button class="btn btn-primary" type="submit">Masuk</a>
                                            </div>
                                        <hr>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ url('vendor/sbadmin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ url ('vendor/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ url ('vendor/sbadmin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ url ('vendor/sbadmin/js/sb-admin-2.min.js')}}"></script>

</body>

</html>
