<!DOCTYPE html>
<html lang="en">
<head>
    <title>Авторизация</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Meta -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/8a553633d6.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
          integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link id="theme-style" rel="stylesheet" href="/css/admin.css">

</head>

<body class="app app-login p-0">
<div class="row g-0 app-auth-wrapper">
    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
        <div class="d-flex flex-column align-content-end">
            <div class="app-auth-body mx-auto">
                <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon mr-2"
                                                                                               src="/app-logo.svg"
                                                                                               alt="logo"></a></div>
                <h2 class="auth-heading text-center mb-5">Админ панель</h2>
                <div class="auth-form-container text-left">
                    <form method="post" action="{{ route("admin.login") }}" class="auth-form login-form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <div class="email mb-3">
                            <label class="sr-only" for="signin-email">Login</label>
                            <input id="signin-email" name="login" type="text" class="form-control signin-email"
                                   placeholder="Логин" required="required">
                        </div><!--//form-group-->
                        <div class="password mb-3">
                            <label class="sr-only" for="signin-password">Password</label>
                            <input id="signin-password" name="password" type="password"
                                   class="form-control signin-password" placeholder="Пароль" required="required">
                        </div><!--//form-group-->
                        <div style="color: red;">
                            @error('login')
                                {{$message}}
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn app-btn-primary btn-block theme-btn mx-auto">Авторизация
                            </button>
                        </div>
                    </form>
                </div><!--//auth-form-container-->

            </div><!--//auth-body-->

            <footer class="app-auth-footer">
                <div class="container text-center py-3">
                    <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->

                </div>
            </footer><!--//app-auth-footer-->
        </div><!--//flex-column-->
    </div><!--//auth-main-col-->
    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
        <div class="auth-background-holder">
        </div>
        <div class="auth-background-mask"></div>

    </div><!--//auth-background-col-->

</div><!--//row-->


</body>
</html>

