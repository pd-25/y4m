@extends('frontend.layout.main')
@section('content')
<section class="program-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="program-content-box">
                    <h2 class="secondary-header tag-padding">Mental Health Awareness</h2>
                    <p class="primary-p">Youth mental health awareness campaigns aim to achieve several objectives
                        focused on improving young people's well-being and fostering a more supportive environment.
                        Here's a breakdown of some key goals:</p>
                        <div class="program-image-box d-lg-none">
                            <img src="{{asset('fassets/images/mental-health-image.webp')}}" alt="mental-health-photo" class="program-img">
                        </div>
                    <div class="program-collapsible-div mb-3">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="increaseOne">
                                    <button class="accordion-button  collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse-increase"
                                        aria-expanded="true" aria-controls="collapse-increase">
                                        INCREASED AWARENESS & UNDERSTANDING
                                    </button>
                                </h2>
                                <div id="collapse-increase" class="accordion-collapse collapse"
                                    aria-labelledby="increaseOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="accordion-body-inner">
                                            <ul class="makes-program-ul">
                                                <li class="makes-li">
                                                    <p class="makes-p primary-p"><span class="makes-span">Reduce
                                                            stigma:
                                                        </span>
                                                        A major goal is to fight the stigma surrounding mental
                                                        illness and reduce the stigma surrounding mental health
                                                        issues in young people. By openly discussing mental health,
                                                        the campaign aims to normalize seeking help and create a
                                                        more understanding environment. This encourages people to
                                                        seek help without fear of judgment or discrimination. </p>
                                                </li>
                                                <li class="makes-li">
                                                    <p class="makes-p primary-p"><span class="makes-span">Increase
                                                            understanding:</span> Educating the public about mental
                                                        health conditions, their signs and symptoms, and available
                                                        treatments is crucial. </p>
                                                </li>
                                                <li class="makes-li">
                                                    <p class="makes-p primary-p"><span class="makes-span">Promote
                                                            help-seeking behaviors: </span> By raising awareness,
                                                        people are more likely to recognize the signs of mental
                                                        health struggles in themselves or others, encouraging them
                                                        to seek professional help. </p>
                                                </li>
                                                <li class="makes-li">
                                                    <p class="makes-p primary-p"><span class="makes-span">Normalize
                                                            mental health: </span> Talking openly about mental
                                                        health helps to normalize it as a normal part of life, just
                                                        like physical health. </p>
                                                </li>
                                                <li class="makes-li">
                                                    <p class="makes-p primary-p"><span class="makes-span">Educate
                                                            Youth and Adults:</span>
                                                        The campaign can educate both young people and adults about
                                                        common mental health issues in youth, their signs and
                                                        symptoms. This empowers youth to recognize potential
                                                        challenges in themselves or their peers and encourages
                                                        adults to be more supportive. </p>
                                                </li>
                                                <li class="makes-li">
                                                    <p class="makes-p primary-p"><span class="makes-span">Promote
                                                            Help-Seeking Behavior: </span>
                                                        The campaign aims to encourage young people who might be
                                                        struggling to reach out for help. This can involve promoting
                                                        resources like hotlines, mental health professionals, or
                                                        trusted adults. </p>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="resilienceOne">
                                    <button class="accordion-button  collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse-resilience"
                                        aria-expanded="true" aria-controls="collapse-resilience">
                                        EMPOWERING YOUTH AND BUILDING RESILIENCE
                                    </button>
                                </h2>
                                <div id="collapse-resilience" class="accordion-collapse collapse"
                                    aria-labelledby="resilienceOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="accordion-body-inner">
                                            <ul class="makes-program-ul">
                                                <li class="makes-li">
                                                    <p class="makes-p primary-p"><span class="makes-span">Develop
                                                            Coping Mechanisms:
                                                        </span>
                                                        The campaign can raise awareness about healthy coping
                                                        mechanisms for dealing with stress, anxiety, or other mental
                                                        health challenges. This equips young people with tools to
                                                        manage their mental well-being.
                                                    </p>
                                                </li>
                                                <li class="makes-li">
                                                    <p class="makes-p primary-p"><span class="makes-span">Promote
                                                            Self-Care: </span> Mental health awareness campaigns can
                                                        encourage young people to prioritize self-care practices
                                                        like healthy eating, regular exercise, and getting enough
                                                        sleep. These practices contribute to overall mental and
                                                        emotional well-being. </p>
                                                </li>
                                                <li class="makes-li">
                                                    <p class="makes-p primary-p"><span class="makes-span">Build
                                                            Self-Esteem and Confidence:</span>
                                                        By acknowledging the challenges young people face and
                                                        promoting help-seeking behavior, the campaign can empower
                                                        youth and boost their self-esteem. </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="systemOne">
                                    <button class="accordion-button  collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse-system"
                                        aria-expanded="true" aria-controls="collapse-system">
                                        ADVOCACY & SYSTEMS CHANGE
                                    </button>
                                </h2>
                                <div id="collapse-system" class="accordion-collapse collapse"
                                    aria-labelledby="systemOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="accordion-body-inner">
                                            <ul class="makes-program-ul">
                                                <li class="makes-li">
                                                    <p class="makes-p primary-p"><span class="makes-span">Increased
                                                            Resources:</span>
                                                        Mental health awareness campaigns can raise awareness about
                                                        the need for increased resources for youth mental health
                                                        services in schools, communities, and healthcare systems.
                                                    </p>
                                                </li>
                                                <li class="makes-li">
                                                    <p class="makes-p primary-p"><span class="makes-span">Improved
                                                            Access to Care: </span> The campaign might advocate for
                                                        policies that improve access to affordable and quality
                                                        mental health care for young people.
                                                    </p>
                                                </li>
                                                <li class="makes-li">
                                                    <p class="makes-p primary-p"><span class="makes-span">Supportive
                                                            School
                                                            Environments:</span>
                                                        Campaigns can promote the creation of supportive school
                                                        environments that prioritize mental health and well-being
                                                        alongside academic achievement. </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="overallOne">
                                    <button class="accordion-button  collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse-overall"
                                        aria-expanded="true" aria-controls="collapse-overall">
                                        OVERALL OBJECTIVES
                                    </button>
                                </h2>
                                <div id="collapse-overall" class="accordion-collapse collapse"
                                    aria-labelledby="overallOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="accordion-body-inner">
                                            <p class="primary-p"><span class="makes-span">Improved Youth Mental
                                                    Health Outcomes:</span> By achieving
                                                the goals mentioned above, youth mental health awareness campaigns
                                                aim to improve the overall mental health outcomes of young people.
                                                This leads to a happier, healthier, and more productive generation.
                                            </p>
                                            <ul class="makes-program-ul">
                                                <li class="makes-li">
                                                    <p class="makes-p primary-p"><span class="makes-span">Create a
                                                            Culture of Support:</span>
                                                        The campaign strives to create a culture of support where
                                                        mental health is openly discussed, help is readily
                                                        available, and young people feel empowered to prioritize
                                                        their well-being. </p>
                                                </li>
                                                <li class="makes-li">
                                                    <p class="makes-p primary-p"><span class="makes-span">Break the
                                                            Cycle:
                                                        </span>By addressing mental health issues early on, these
                                                        campaigns can potentially break cycles of mental illness and
                                                        promote long-term well-being for young people.
                                                    </p>
                                                </li>

                                            </ul>
                                            <p class="primary-p">It's important to note that youth mental health
                                                awareness campaigns are just one piece of the puzzle. However, by
                                                achieving these objectives, they can play a significant role in
                                                creating a more positive and supportive environment for young
                                                people's mental health. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-10 offset-lg-1">
                <div class="program-image-box d-none d-lg-block">
                    <img src="{{asset('fassets/images/mental-health-image.webp')}}" alt="mental-health-photo" class="program-img">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
