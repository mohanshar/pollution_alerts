<div class="container text-center text-md-start">
    <div class="footer-wrap">
        <div class="about">

            <img src="{{ Session::get('sitesetting') ? Session::get('sitesetting')->logo : '' }}" alt=""
                width="auto" height="100"
                title="{{ Session::get('sitesetting') ? Session::get('sitesetting')->site_name : '' }}"
                style="border: 2px solid rgb(222, 247, 180);border-radius:15px;">

            <p class="text-muted py-4">

            </p>
            <div class="social-media">
                <p class="fw-bold">Social media handles</p>
                <a href="{{ Session::get('sitesetting') ? Session::get('sitesetting')->messenger : '' }}"
                    class="me-2 text-reset" target="_blank">
                    <img src="https://scontent.fsif1-1.fna.fbcdn.net/v/t1.6435-9/121144316_4235843479868633_1561909311908486242_n.png?_nc_cat=1&ccb=1-5&_nc_sid=973b4a&_nc_ohc=RW5ZPpQjetEAX-1PMCc&_nc_oc=AQn7Uno91LydAp8V8PARHLnaiWm1XhLPL8QhaKebCcQDXCKF-1-mFWOSmn3GGr3O4Q8Y9_G57wNf4gF8WkGgPxNz&_nc_ht=scontent.fsif1-1.fna&oh=00_AT8ciIECirj6kDaNBkmydaBQMb_7VY8i8oWsSzJibkIEzw&oe=62865FC2"
                        alt="">
                </a>

                <a href="{{ Session::get('sitesetting') ? Session::get('sitesetting')->whatsapp : '' }}"
                    class="me-2 text-reset" target="_blank">
                    <img src="https://is1-ssl.mzstatic.com/image/thumb/Purple122/v4/75/79/58/7579582d-16c0-e69e-6a5d-61802067b465/electron.png/1200x630bb.png"
                        alt="">
                </a>

            </div>
        </div>

        <div class="company">
            <p class="fw-bold" href="{{ url('/') }}"
                title="{{ Session::get('sitesetting') ? Session::get('sitesetting')->site_name : '' }}">
                {{ Session::get('sitesetting') ? Session::get('sitesetting')->site_name : '' }}</p>
            <p><a href="{{ url('/about') }}">About</a></p>
            <p><a href="{{ url('/post') }}">User Posting</a></p>
            <p>
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}">Login</a>
                    @endif
                @else
                    <a href="{{ route('logout') }}">Logout</a>
                @endguest
            </p>
        </div>

        <div class="useful-links">
            <p class="fw-bold">Useful links</p>
            <p>
                <img src="https://yt3.ggpht.com/dW6to0x5Crmeh7yi-YPLcQRqVrBtx2BSh8eoKTJbE8NbjloQ0sqlmdszIlxokJU_97-ndOt_=s900-c-k-c0x00ffffff-no-rj"
                    width="15px" alt="">
                <a href="https://w3schools.com/" target="_blank">W3Schools</a>
            </p>
            <p>
                <img src="https://laravel.com/img/logomark.min.svg" width="15px" alt=""> &nbsp;
                <a href="https://laravel.com/docs/5.8" target="_blank">Laravel 5.8 Documentation</a>
            </p>
            <p>
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Octicons-mark-github.svg/2048px-Octicons-mark-github.svg.png"
                    width="15px" alt="">
                <a href="https://github.com/mohanshar/pollution-control" target="_blank">GitHub Profile</a>
            </p>
            <p>
                <img src="https://res.cloudinary.com/postman/image/upload/t_team_logo/v1629871894/team/d489837a033d4490b12f0f3a7f1ab88017547b618b94b687feb1b5b738ee9893"
                    width="15px" alt="">
                <a href="https://console.twilio.com/?frameUrl=%2Fconsole%3Fx-target-region%3Dus1" target="_blank">Twilio
                    Account</a>
            </p>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-5 col-xl-4 ms-auto mt-5">

                    <label for="news" style="font-size: 18px;"><b>Get your update <span>news</span></b></label>

                    <div class="news-form">

                        <form action="{{ route('send.mail') }}" method="post">

                            @csrf

                            <input type="text" name="name" value="" placeholder="Enter your name" required="true">

                            <input type="email" name="email" value="" placeholder="Enter your email" required="true">

                            <button type="submit" class="button" style="margin-left: 30px;"><span>Send
                                </span></button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="copyright">
        <p>
            Copyrights &copy; {{ Session::get('sitesetting') ? Session::get('sitesetting')->copyright : '' }}
            Pollution Control System | Created by PCS Group
        </p>
    </div>

</div>
