<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <section class="vh-100"
        style="background: linear-gradient(rgba(20, 20, 31, .3), rgba(20, 20, 31, .3)), url({{asset('public/interface')}}/img/bg123.jpg);">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                    <form action="{{route('ht.login')}}" method="post">
                        @csrf
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <h3 class="mb-5">Admin</h3>

                                <div class="form-outline mb-4">
                                    <label class="form-label d-flex" for="typeEmailX-2">Email</label>
                                    <input type="email" name="email" value="{{old('email')}}" class="form-control form-control-lg" />
                                    {!!$errors->first('email','<div class="d-flex has-error text-danger ">:message</div>')!!}
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label d-flex" for="typePasswordX-2">Password</label>
                                    <input type="password" name="password" class="form-control form-control-lg" />
                                    {!!$errors->first('password','<div class="d-flex has-error text-danger">:message</div>')!!}
                                </div>
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Đăng nhập</button>



                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>