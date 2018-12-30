@extends('master')

@section('title')
    <title>Resto Cookies</title>
@endsection

@section('css')
    <!--css file-->
    <link rel="stylesheet" href="{{ asset('css/cookies.css') }}">
@endsection

@section('content')
    <main>
        @if($type != 'edit')
        <article>
            <h1>Cookies Policies</h1>
                    <section>
                        <h2>Use of cookies on this site.</h2>
                        <p>We use cookies to collect information about store your online preference. Cookies are small pieces of information sent by a web server to a web browser which allows the server to uniquely identify the browser on each page.</p>
                    </section>
                    <section>
                        <h2>Strictly Necessary Cookies</h2>
                        <p>These cookies are essential in order to enable you to move around the website and use its features. Without these cookies, services you have asked for such as remembering your form data would not work.</p>
                    </section>
                    <section>
                        <h2>Functionality Cookies</h2>
                        <p>These cookies remember choices you make such as whether we should start the animation or not. These can then be used to provide you with an experience more appropriate to your selections and to make the visits more tailored and pleasant. The information these cookies collect may be anonymised and they cannot track your browsing activity on other websites.</p>
                    </section>
                    <section>
                        <a href="{{ url('cookies/edit') }}" class="button" id="edit">edit cookies</a>
                        <a href="{{ url('cookies/accept') }}" class="button" id="accept">accept cookies</a>
                    </section>
        </article>
        @else
        <article id="edit">
                <h1>Edit Cookies Policies</h1>
                <form action="{{ url('cookies/edit') }}" method="post">
                    @csrf
                    <section>
                            <h2>Strictly Necessary Cookies</h2>
                            <div>
                                <span>Remember user inputted data</span>
                                <input type="checkbox" name="save_user_input" id="save_user_input" checked>
                                <label for="save_user_input"></label>
                            </div>
                        </section>
                        <section>
                            <h2>Functionality Cookies</h2>
                            <div>
                                <span for="animation">Enable animation on startscreen</span>
                                <input id="animation" name="animation" type="checkbox" checked/>
                                <label for="animation"></label>
                            </div>
                        </section>
                        <section>
                            <a href="{{ url('cookies/cancel') }}" class="button">Cancel</a>
                            <input type="submit" id="save" class="button" value="save cookies">
                        </section>
                </form>
        </article>
        @endif
    </main>
@endsection

@section('scripts')
    <!--jquery-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!--vue js-->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!--script src="{{ asset('js/vue.js') }}"></script-->

    <!--polyfill-->
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>

    <!--my scripts-->
    <script src="{{ asset('js/script.js') }}"></script>
@endsection