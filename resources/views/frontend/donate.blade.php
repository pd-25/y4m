@extends('frontend.layout.main')
@section('content')
<section class="support-youth-area">
    <div class="container">
        <div class="row justify-content-lg-between justify-content-center">
            <div class="col-lg-6 col-md-12">
                <div class="support-content-box">
                    <h2 class="secondary-header lower-padding">Support Youth Education Services of America today!
                    </h2>
                    <p class="primary-p"><span class="bold-span">Every child deserves the chance to reach their full
                            potential.</span> Yet, many
                        young people lack access to quality education and the resources they need to succeed. </p>

                    <p class="primary-p"><span class="bold-span">Your tax-deductible donation</span> to our youth
                        education services program can
                        make a real difference in the lives of these children</p>
                    <p class="primary-p"><span class="bold-span">Here's how your contribution will help: </span>
                    </p>
                    <ul class="donate-support-ul">
                        <li class="makes-li">
                            <p class="makes-p primary-p"><span class="bold-span">Bridge the achievement gap:</span>
                                Provide tutoring, after-school
                                programs, and educational resources to ensure all young people have the opportunity
                                to excel in school. </p>
                        </li>
                        <li class="makes-li">
                            <p class="makes-p primary-p"><span class="bold-span">Empower future leaders:</span>
                                Equip young people with essential
                                life skills like communication, problem-solving, and critical thinking, preparing
                                them for success in college, careers, and life. </p>
                        </li>
                        <li class="makes-li">
                            <p class="makes-p primary-p"><span class="bold-span">Cultivate well-rounded
                                    individuals:</span> Promote
                                social-emotional learning, healthy habits, and positive self-esteem, pen spark
                                fostering confident and responsible young citizens. </p>
                        </li>
                        <li class="makes-li">
                            <p class="makes-p primary-p"><span class="bold-span">Strengthen our community:</span> By
                                investing in youth education,
                                we invest in a brighter future for all. Your support helps create a more vibrant and
                                engaged community.</p>
                        </li>

                    </ul>
                    <p class="primary-p"><span class="bold-span">With your generous donation, we can: </span>
                    </p>
                    <ul class="donate-support-ul">
                        <li class="makes-li">
                            <p class="makes-p primary-p"><span class="bold-span">Provide scholarships</span>
                                to deserving students facing financial barriers. </p>
                        </li>
                        <li class="makes-li">
                            <p class="makes-p primary-p"><span class="bold-span">Purchase essential learning
                                    materials</span>
                                and technology to enhance the learning experience. </p>
                        </li>
                        <li class="makes-li">
                            <p class="makes-p primary-p"><span class="bold-span">Expand our programs</span>to reach
                                more young people in need. </p>
                        </li>
                        <li class="makes-li">
                            <p class="makes-p primary-p"><span class="bold-span">Recruit and train qualified
                                    educators </span> to provide the best possible support for our youth. </p>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-md-10">
                <div class="support-img-div">
                    <!-- <img src="{{asset('fassets/images/donate-support.webp"')}} alt="support-image" class="support-donate-img"> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============== support youth area starts ================== -->

<!-- ================= a gift area starts =========== -->
<section class="a-gift-area section-gap">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-7 col-md-10 mb-5">
                <div class="gift-content-box">
                    <h2 class="primary-header-white tag-padding">A gift of any amount can make a lasting monthly
                        impact.
                        Here are some examples of how your donation can be used:
                    </h2>
                    <ul class="donate-support-ul">
                        <li class="makes-li">
                            <p class="makes-p primary-p-white">$70 can help towards daily housekeeping and
                                maintenance.
                            </p>
                        </li>
                        <li class="makes-li">
                            <p class="makes-p primary-p-white">75 can provide a month's worth of after-school
                                enrichment
                                activities for one child. </p>
                        </li>
                        <li class="makes-li">
                            <p class="makes-p primary-p-white">$100 can purchase essential educational materials for
                                a
                                classroom. </p>
                        </li>
                        <li class="makes-li">
                            <p class="makes-p primary-p-white">$120 can provide gas to transport the youth from
                                various
                                communities.</p>
                        </li>
                        <li class="makes-li">
                            <p class="makes-p primary-p-white">$500 can support a scholarship for a deserving
                                student. </p>
                        </li>
                        <li class="makes-li">
                            <p class="makes-p primary-p-white">$ 750 can help support each student special travel
                                programs across other states. </p>
                        </li>
                        <li class="makes-li">
                            <p class="makes-p primary-p-white">$ 1200 can help support mental health and suicide
                                prevention programs. </p>
                        </li>
                        <li class="makes-li">
                            <p class="makes-p primary-p-white">Or be a sponsor for Youth Education Services programs
                                and help the youth discover their potential. </p>
                        </li>

                    </ul>
                    <p class="primary-p-white">Together, we can ensure that all young people have the tools and resources they need to succeed. Please consider making a donation today and help us invest in a brighter future for the youth. </p>
                </div>
            </div>
            <div class="col-lg-5 col-md-10">
                <div class="gift-side-box">
                    <div class="donate-gift-img-box mx-auto">
                        <img src="{{asset('fassets/images/donate-gift-hand.webp')}}" alt="sunrise-image"
                            class="donate-gift-hand-img">
                    </div>
                    <div class="btn-div-large mx-auto">
                        <a href="{{ route('donatenow') }}" class="btn-orange-large">donate today </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
