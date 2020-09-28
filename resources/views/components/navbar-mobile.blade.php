@if (preg_match('/Mac OS/', app('request')->header('User-Agent')) == 1)
<nav class="navbar-mobile allow-blur {{$is_bootstrap ?? ''}}">
@else
<nav class="navbar-mobile {{$is_bootstrap ?? ''}}">
@endif
    @if (isset($template))
    {{-- For "Event Details" template --}}
        @if (parse_url(app('request')->headers->get('referer'), PHP_URL_HOST) == parse_url(app('request')->url(), PHP_URL_HOST))
            <div class="action-global">
                <a class="navbar-link" onClick="window.history.back()">
                    @component ('components.bootstrap-icons', ['icon' => 'arrow-left', 'size' => 32])
                    @endcomponent
                    <br>Back
                </a>
            </div>
        @else
            <div class="action-global">
                <a href="/" class="navbar-link">
                    @component ('components.bootstrap-icons', ['icon' => 'house-door', 'size' => 32])
                    @endcomponent
                    <br>Home
                </a>
            </div>
        @endif
        <div>
        </div>
        @switch ($template)
            @case ("event-details")
                <div>
                    @if (isset($event['register']))
                        <a href="{{$event['register']}}" class="navbar-link">
                            <div class="action-primary">
                                @component ('components.bootstrap-icons', ['icon' => 'person-plus-fill', 'size' => 36, 'optical' => 'right'])
                                @endcomponent
                                Register
                            </div>
                        </a>
                    @endif
                </div>
                <div>
                    <a href="#rules" class="navbar-link">
                        @component ('components.bootstrap-icons', ['icon' => 'patch-exclamation', 'size' => 32])
                        @endcomponent
                        <br>Rules
                    </a>
                </div>
                <div>
                    <a href="#contact" class="navbar-link">
                        @component ('components.bootstrap-icons', ['icon' => 'chat-left-quote', 'size' => 32, 'optical' => 'right'])
                        @endcomponent
                        <br>Contact
                    </a>
                </div>
                @break
            @case ("login-page")
                <div></div>
                <div></div>
                <div></div>
                @break
        @endswitch
    {{-- For others --}}
    @else
        <div>
            @if (app('request')->path() == '/')
                <a class="navbar-link selected">
                    @component ('components.bootstrap-icons', ['icon' => 'house-door-fill', 'size' => 32])
                    @endcomponent
                    <br>Home
                </a>
            @else
                <a href="/" class="navbar-link">
                    @component ('components.bootstrap-icons', ['icon' => 'house-door', 'size' => 32])
                    @endcomponent
                    <br>Home
                </a>
            @endif
        </div>
        <div>
            @if (app('request')->path() == 'events')
                <a class="navbar-link selected">
                    @component ('components.bootstrap-icons', ['icon' => 'calendar-date-fill', 'size' => 32])
                    @endcomponent
                    <br>Events
                </a>
            @else
                <a href="/events" class="navbar-link">
                    @component ('components.bootstrap-icons', ['icon' => 'calendar-date', 'size' => 32])
                    @endcomponent
                    <br>Events
                </a>
            @endif
        </div>
        <div>
            <a href="/regist" class="navbar-link">
                <div class="action-primary">
                    @component ('components.bootstrap-icons', ['icon' => 'person-plus-fill', 'size' => 36, 'optical' => 'right'])
                    @endcomponent
                    Register
                </div>
            </a>
        </div>
        <div>
            @if (app('request')->path() == 'contact')
                <a class="navbar-link selected">
                    @component ('components.bootstrap-icons', ['icon' => 'chat-left-quote-fill', 'size' => 32])
                    @endcomponent
                    <br>Contact
                </a>
            @else
                <a href="/contact" class="navbar-link">
                    @component ('components.bootstrap-icons', ['icon' => 'chat-left-quote', 'size' => 32])
                    @endcomponent
                    <br>Contact
                </a>
            @endif
        </div>
        <div>
            @guest
                <a href="/home" class="navbar-link">
                    @component ('components.bootstrap-icons', ['icon' => 'box-arrow-in-right', 'size' => 32, 'optical' => 'right'])
                    @endcomponent
                    <br>Login
                </a>
            @else
                @if (app('request')->path() == 'home')
                    <a class="navbar-link selected">
                        @component ('components.bootstrap-icons', ['icon' => 'person-badge-fill', 'size' => 32])
                        @endcomponent
                        <br>Profile
                    </a>
                @else
                    <a href="/login" class="navbar-link">
                        @component ('components.bootstrap-icons', ['icon' => 'person-badge', 'size' => 32])
                        @endcomponent
                        <br>Profile
                    </a>
                @endif
            @endguest
        </div>
    @endif
</nav>
