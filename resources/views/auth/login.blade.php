<!DOCTYPE html>
<html lang="en" class="body-full-height">

<!-- Tieu Long Lanh Kute -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <style>
        ::-webkit-input-placeholder {
            /* Chrome/Opera/Safari */
            color: pink;
        }

        ::-moz-placeholder {
            /* Firefox 19+ */
            color: pink;
        }

        :-ms-input-placeholder {
            /* IE 10+ */
            color: pink;
        }

        :-moz-placeholder {
            /* Firefox 18- */
            color: pink;
        }
    </style>
    <!-- META SECTION -->
    <title>Atlant - Responsive Bootstrap Admin Template</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="{{ url('/') }}/admin/favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" id="theme" href="{{ url('/') }}/admin/css/theme-default.css" />
    <!-- EOF CSS INCLUDE -->

</head>

<body>

    <div class="login-container">

        <div class="login-box animated fadeInDown">
            <div class="login-logo"></div>
            <div class="login-body">
                <div class="login-title" style="text-align:center"><strong>Xin chào</strong>, Mời Đăng Nhập</div>
                {{-- hiện thị lỗi sửa --}}
                @if (session('thongbao'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{!!session('thongbao')!!}</li>
                    </ul>
                </div>
                @endif
                <form method="POST" class="form-horizontal" action="">
                    @csrf
                    <div class="form-group">
                        {{-- <div class="form-group row">
                            <div class="col-md-4">
                            <label for="email" class=" col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                        </div> --}}
                        <div class="col-md-12">
                            <input placeholder="Tên đăng nhập" type="name"
                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                            value="{{ old('name') }}" required>

                            @if ($errors->has('name'))
                            <span class="error-text">
                                {{ $errors->first('name') }}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                {{-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            --}}

                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="Mật khẩu"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" style="color:#ec971f" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6">
                                <a class="btn btn-link" style="text-align:right" href="{{ route('password.request') }}">
                                    {{ __('Quên mật khẩu?') }}
                                </a>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn btn-warning btn-block">
                                    {{ __('Đăng nhập') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
        {{-- <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2015 AppName
                    </div>
                    <div class="pull-right">
                        <a href="#">About</a> |
                        <a href="#">Privacy</a> |
                        <a href="#">Contact Us</a>
                    </div>
                </div> --}}
            </div>

        </div>

        <!-- COUNTERS // NOT INCLUDED IN TEMPLATE -->
        <!-- GOOGLE -->
        <script type="text/javascript">
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
              m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-36783416-1', 'aqvatarius.com');
          ga('send', 'pageview');
      </script>
      <!-- END GOOGLE -->

      <!-- YANDEX -->
      <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter25836617 = new Ya.Metrika({id:25836617,
                        webvisor:true,
                        accurateTrackBounce:true});
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript>
        <div><img src="http://mc.yandex.ru/watch/25836617" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- END YANDEX -->
    <!-- END COUNTERS // NOT INCLUDED IN TEMPLATE -->

</body>

<!-- Tieu Long Lanh Kute -->

</html>