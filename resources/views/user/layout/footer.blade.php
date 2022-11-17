    {{-- footer --}}
    <footer>
        <div class="top-footer container">
            <div class="col-3 footer-content">
                <h3 class="h3-footer">Follow Us On:</h3>
                <div>
                    <a href="#"><i class="fa-brands fa-facebook-f IC"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter IC"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin-in IC"></i></a>
                    <a href="#"><i class="fa-solid fa-basketball IC"></i></a>
                </div>
                <p class="footer-para">Duis rutrum nisl urna. Maecenas vel libero faucibus nisi venenatis hendrerit a
                    id lectus. Suspendissendt molestie turpis nec lacinia vehicula.</p>
            </div>
            <div class="col-3 footer-content">
                <h3 class="h3-footer">Quick Link</h3>
                <a class="quick-link" href="{{url('/')}}">Home</a>
                <a class="quick-link" href="{{url('ReligiousTours')}}">Tours</a>
                <a class="quick-link" href="{{url('BlogsHome')}}">Blogs</a>
                <a class="quick-link" href="#">Contact us</a>
            </div>
            <div class="col-3 footer-content">
                <h3 class="h3-footer">Tour Type</h3>
                <a class="quick-link" href="{{url('ReligiousTours')}}">Religious</a>
                <a class="quick-link" href="{{url('CulturalTours')}}">Cultural</a>
                <a class="quick-link" href="{{url('LeisureTours')}}">Leisure</a>
                <a class="quick-link" href="{{url('MedicalTours')}}">Medical</a>

            </div>
            <div lass="col-3 footer-content" style="width:25%">
                <h3 class="h3-footer">Gallery</h3>
                <div class="footer-image-div container">
                    <div class="row">
                        <img src="{{asset('user/images/footer-images/fg-1.png')}}" class="footer-image col-4" />
                        <img src="{{asset('user/images/footer-images/fg-2.png')}}" class="footer-image col-4" />
                        <img src="{{asset('user/images/footer-images/fg-3.png')}}" class="footer-image col-4" />
                        <img src="{{asset('user/images/footer-images/fg-4.png')}}" class="footer-image col-4" />
                        <img src="{{asset('user/images/footer-images/fg-5.png')}}" class="footer-image col-4" />
                        <img src="{{asset('user/images/footer-images/fg-6.png')}}" class="footer-image col-4" />
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer">
            <p class="copyright" style="color:white ;">Copyright 2021 TourXPro | Design By Egens Lab</p>
            <div class="footer-logo">
                <a style="color:white ; display: inline-block;" class="navbar-brand" href="{{url('/')}}"><img
                        src="{{asset('user/images/home-images/airplane-57-48.ico')}}" style="width:50px" /> Palestine <span
                        style="color:#ff4838 ;">Tourism</span></a>
            </div>
            <p class="bottom-footer-para" style="color:white ;">Terms & Condition <span class="vir-line"> |
                </span>Privacy Policy</p>
        </div>
    </footer>
