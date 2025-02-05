<footer class="main-footer-area">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-3 col-md-3">
                <div class="footer-content">
                    <img src="{{asset('fassets/images/yesamerica-logo.png')}}" alt="footer-logo" class="footer-logo-img">
                </div>
            </div>
            <div class="col-lg-6 col-md-9">
                <div class="footer-content">
                    <h2 class="footer-h2">
                        subscribe
                    </h2>
                    <p class="footer-p">Sign up with your email address to receive news and updates.</p>
                    <div class="footer-subscribe-form-div">
                        <form>
                            <input type="text" placeholder="Email Address" class="footer-search-input">
                            <button class="btn-white-small footer-btn">sign up</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-content">
                    <h3 class="footer-h3">Email:
                        <span>flaari@youth4america.com</span>
                    </h3>
                    <div class="d-flex g-4 justify-content-center" style="gap:10px">
                        {{-- <a href="https://www.facebook.com/youth4america" target="_blank">
                            <i class="fa fa-facebook footer-social-icon"></i>
                        </a> --}}
                        <a href="https://www.instagram.com/flaariyouth4america/" class="icod" target="_blank">
                            <i class="fa-brands fa-instagram footer-social-icon"></i>
                        </a>
                        <a href="https://x.com/Youth4americ" target="_blank" class="icod">
                            <i class="fa-brands fa-x-twitter footer-social-icon"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-12">
                <div class="copyright-footer d-flex align-items-center  justify-content-between">
                    <p class="copyright-p">
                        &copy; <span id="currentYear"></span> youth4america | All Rights Reserved
                    </p>
                    <p class="copyright-p">
                        Designed and Developed by ♥︎ 
                        <a href="https://sweetdevelopers.com" target="_blank" style="color: white; text-decoration: none;">SweetDevelopers</a>
                    </p>
                </div>
                
                <script>
                    document.getElementById("currentYear").textContent = new Date().getFullYear();
                </script>
                
            </div>
        </div>
    </div>
<style>
    .icod{
    color: white;
    font-size: 24px;
}
    </style>
</footer>