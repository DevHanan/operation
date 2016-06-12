@extends('layouts.layout')
<section id="home">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10 wow fadeIn" data-wow-delay="0.3s">
                    <h1 class="text-upper">SaaS Application</h1>
                    <p class="tm-white">Software as a service (SaaS) is a software distribution model in which a third-party provider hosts applications and makes them available to customers over the Internet. SaaS is one of three main categories of cloud computing, alongside infrastructure as a service (IaaS) and platform as a service (PaaS). <a rel="nofollow" href="http://www.facebook.com/templatemo" target="_parent">templatemo</a>. Images by <a rel="nofollow" href="http://pixabay.com" target="_blank">Pixabay</a></p>
                    <img src="{{ url('images/software-img.png')}}" class="img-responsive" alt="home img">
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
</section>

<br><br>
<!-- start pricing -->
<section id="pricing">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow bounceIn">
                <h2 class="text-uppercase">Our Plans</h2>
            </div>
            <div class="col-md-4 wow fadeIn" data-wow-delay="0.6s">
                <div class="pricing text-uppercase">
                    <div class="pricing-title">
                        <h4>Basic Plan</h4>
                        <p>$0</p>
                        <small class="text-lowercase">Free</small>
                    </div>
                    <ul>
                        <li>6 GB Space</li>
                        <li>600 GB Bandwidth</li>
                        <li>Lifetime Support</li>
                    </ul>
                    <button class="btn btn-primary text-uppercase">Sign up</button>
                </div>
            </div>
            <div class="col-md-4 wow fadeIn" data-wow-delay="0.6s">
                <div class="pricing active text-uppercase">
                    <div class="pricing-title">
                        <h4>CRM Gold</h4>
                        <p>$20.00</p>
                        <small class="text-lowercase">Weekly</small>
                    </div>
                    <ul>
                        <li>35 GB space</li>
                        <li>3,500 GB bandwidth</li>
                        <li>Lifetime Support</li>
                    </ul>
                    <button class="btn btn-primary text-uppercase">Sign up</button>
                </div>
            </div>
            <div class="col-md-4 wow fadeIn" data-wow-delay="0.6s">
                <div class="pricing text-uppercase">
                    <div class="pricing-title">
                        <h4>CRM Silver</h4>
                        <p>$10.00</p>
                        <small class="text-lowercase">Weekly</small>
                    </div>
                    <ul>
                        <li>15 GB space</li>
                        <li>1,500 GB Bandwidth</li>
                        <li>Lifetime Support</li>
                    </ul>
                    <button class="btn btn-primary text-uppercase">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end pricing -->