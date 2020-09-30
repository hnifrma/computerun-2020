<!DOCTYPE html>
<html>
    <head>
        @component("components.meta", ["title" => "Home"])
        @endcomponent
    </head>
    <body>
        <!-- bg-home == ini gua matiin dulu soalnya nabrak dia hart ama navbar. -->
        <div class="container-2 content-top bg-home">
            @component("components.navbar")
            @endcomponent
            @component("components.navbar-mobile")
            @endcomponent
            <div class="margin-2">
                <h1 class="tagline">
                    <p>BEYOND</p>
                    <p>INSIGHT.</p>
                </h1>
                <!--img class="runner-mobile" src="/img/backgrounds/HomeBG-1a.png"-->
                <div class="post-tagline">
                    <h4 class="subtagline">Interconnecting Business-IT Through Technology</h4>
                    <div class="himsisfo-himti-container">
                        <img src="/img/icons/HIMSISFO Logo.png">
                        <img src="/img/icons/HIMTI Logo.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-1">
            <img class="container-clip" src="/img/backgrounds/2.png">
            <div class="about-container margin-2 after-container-clip">
                <div>
                    <h2 class="partial-underline custom">what is<br><span>COMPUTERUN?</span>
                        <div class="guide"><span>COMPUTE</span></div>
                    </h2>
                </div>
                <div>
                    <p class="h5">
                        COMPUTERUN is a brand new joint-venture event organized by HIMSISFO and HIMTI BINUS University.<br><br>
                        In our first edition, we aim to provide a place to think, create, and share ideas through the business IT insights.<br><br>
                        <b>Starts <span class="blue-text">online</span> in October - December 2020</b>
                    </p>
                </div>
            </div>
            <div class="with-computerun-background">
                <h1>core values</h1>
            </div>
        </div>
        <div class="container-0">
            <img class="container-clip" src="/img/backgrounds/5.png">
            <div class="icons-container items-2 after-container-clip">
                <div>
                    <img src="/img/icons/Compute with intelligent.png"><br>
                    <span class="h3">Compute with intelligence</span>
                </div>
                <div>
                    <img src="/img/icons/Run with innovation.png"><br>
                    <span class="h3">Run with innovation</span>
                </div>
            </div>

            {{-- <h1 class="full-underline after-icons-container">events</h1>
            <div class="card-container margin-1 content-divider">
                <div class="card image-card">
                    <div>
                        <img src="/img/icons/Events - Webinar.png">
                    </div>
                    <div>
                        <span class="h4 font-800">Webinar</span>
                        <p>
                            An online seminar to share new knowledge about Technology in Business
                        </p>
                    </div>
                </div>
                <div class="card image-card">
                    <div>
                        <img src="/img/icons/Events - Business-IT Case.png">
                    </div>
                    <div>
                        <span class="h4 font-800">Business-IT Case</span>
                        <p>
                            National-scale business case competition to train synergy in solving a real case in a company
                        </p>
                    </div>
                </div>
                <div class="card image-card">
                    <div>
                        <img src="/img/icons/Events - Mobile Apps.png">
                    </div>
                    <div>
                        <span class="h4 font-800">Mobile Apps</span>
                        <p>
                            A competition where you can develop an application for a mobile platform
                        </p>
                    </div>
                </div>
            </div> --}}
            <h1 class="full-underline after-icons-container">events</h1>
            <div class="about-container margin-2 content-divider">
                <div>
                    <h2 class="partial-underline custom">
                        <img src="/img/icons/Events - Business-IT Case.png" class="about-image"><br>
                        Business-IT Competitions.</span>
                        <div class="guide"><span>BusinessIT&#45;</span></div>
                    </h2>
                </div>
                <div>
                    <div class="card-container items-2">
                        <div class="card image-card">
                            <div>
                                <img src="/img/icons/Events - Business-IT Case.png">
                            </div>
                            <div>
                                <span class="h4 font-800">Business-IT Case</span>
                                <p>
                                    Solve real-life business cases and provide solutions for a better business.
                                </p>
                                <a href="/bcase" class="button button-gradient">MORE INFO</a>
                            </div>
                        </div>
                        <div class="card image-card">
                            <div>
                                <img src="/img/icons/Events - Mobile Apps.png">
                            </div>
                            <div>
                                <span class="h4 font-800">Mobile Application Development</span>
                                <p>
                                    Create and develop mobile applications as fast as possible.
                                </p>
                                <a href="/moapps" class="button button-gradient">MORE INFO</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <h2 class="partial-underline custom">
                        <img src="/img/icons/Events - E-Sport.png" class="about-image"><br>
                        Mini E-Sports Competitions.</span>
                        <div class="guide"><span>MiniESports-&nbsp;</span></div>
                    </h2>
                </div>
                <div>
                    <div class="card-container">
                        <div class="card image-card">
                            <div>
                                <img src="/img/icons/Mobile Legends Logo.png">
                            </div>
                            <div>
                                <span class="h4 font-800">Mobile Legends: Bang Bang</span>
                                <p>Up to 2 slots/team</p>
                                <a href="/ml" class="button button-gradient">MORE INFO</a>
                            </div>
                        </div>
                        <div class="card image-card">
                            <div>
                                <img src="/img/icons/PUBG Mobile Logo.png">
                            </div>
                            <div>
                                <span class="h4 font-800">PUBG Mobile</span>
                                <p>
                                    Erangel TPP + Miramar TPP + Vikendi TPP + Sanhok TPP<br><br>Up to 2 slots/team
                                </p>
                                <a href="/pubg" class="button button-gradient">MORE INFO</a>
                            </div>
                        </div>
                        <div class="card image-card">
                            <div>
                                <img src="/img/icons/Valorant Logo.png">
                            </div>
                            <div>
                                <span class="h4 font-800">Valorant</span>
                                <p>Random Map, up to 2 slots/team</p>
                                <a href="/valorant" class="button button-gradient">MORE INFO</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <h2 class="partial-underline custom">
                        <img src="/img/icons/Events - Webinar.png" class="about-image"><br>
                        Webinars.</span>
                        <div class="guide"><span>Webinars</span></div>
                    </h2>
                </div>
                <div>
                    <div class="card-container">
                        <div class="card image-card">
                            <div>
                                <img src="/img/icons/Events - Webinar.png">
                            </div>
                            <div>
                                <span class="h5 font-800">How business can survive the COVID 19 pandemic?</span>
                                <a href="#" class="button button-gradient-2">COMING SOON</a>
                            </div>
                        </div>
                        <div class="card image-card">
                            <div>
                                <img src="/img/icons/Events - Webinar.png">
                            </div>
                            <div>
                                <span class="h5 font-800">Digital Startup: How to create your own masterpiece</span>
                                <a href="#" class="button button-gradient-2">COMING SOON</a>
                            </div>
                        </div>
                        <div class="card image-card">
                            <div>
                                <img src="/img/icons/Events - Webinar.png">
                            </div>
                            <div>
                                <span class="h5 font-800">How mobile apps can meet and even exceed the user's expectation</span>
                                <a href="#" class="button button-gradient-2">COMING SOON</a>
                            </div>
                        </div>
                        {{-- <div class="card image-card">
                            <div>
                                <img src="/img/icons/Events - Webinar.png">
                            </div>
                            <div>
                                <span class="h5 font-800">Blockchain: The Next Digital Revolution in Every Industry</span>
                                <p>
                                    Coming Soon
                                </p>
                                <a href="/webinar-bchain" class="button button-gradient">MORE INFO</a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <h1 class="full-underline content-divider">our partners</h1>
            <h3 class="text-center">SPONSORS</h3>
            <div class="content-divider-short text-center placeholder-sponsors margin-1">
                @component('components.sponsorship-invite-message', ['is_empty' => true, 'id' => rand(0,7)])
                @endcomponent
            </div>
            <h3 class="text-center">MEDIA PARTNERS</h3>
            <div class="content-divider-short text-center placeholder-sponsors margin-1">
                @component('components.sponsorship-invite-message', ['is_empty' => true, 'id' => rand(0,7)])
                @endcomponent
            </div>
            <img class="container-clip for-footer" src="/img/backgrounds/7.png">
        </div>
        @component('components.footer')
        @endcomponent
    </body>
</html>
