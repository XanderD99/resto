@extends('master')
@section('title')
    <title>Resto || Official page</title>
@endsection

@section('css')
    <!--css file-->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<nav>
    <span id="nav-btn">
        <i></i>
        <i></i>
        <i></i>
    </span>

    <section class="nav-wrapper">
        <ul>
            <li>
                <a href="#team" data-target="team">The Team</a>
                <figure class="">
                    <img src="{{ asset('img/user.jpeg') }}" alt="">
                </figure>
            </li>
            <li>
                <a href="#menu" data-target="menu">Suggestions</a>
                <figure class="">
                    <img src="{{ asset('img/user.jpeg') }}" alt="">
                </figure>
            </li>
            <li>
                <a href="#contact" data-target="contact">Contact</a>
                <figure class="">
                    <img src="{{ asset('img/user.jpeg') }}" alt="">
                </figure>
            </li>
            <li>
                <a href="#reviews" data-target="review">Reviews</a>
                <figure class="">
                    <img src="{{ asset('img/user.jpeg') }}" alt="">
                </figure>
            </li>
        </ul>
    </section>
</nav>

<header>
    <figure>
        <img src="{{ asset('img/logo_with_slogan_transparent.png') }}" alt="">
    </figure>

    <a href="#" class="button"><span>discover our menu</span></a>

    <div id="play_button">
        <span class="bar bar-1"></span>
        <span class="bar bar-2"></span>
    </div>

    <canvas width="800" height="800" id="board"></canvas>
</header>

<main id="app">
    <aside>

    </aside>
    <article id="team">
        <h2>The team</h2>
        <figure>
            <img src="{{ asset('img/user.jpeg') }}" alt="user">
            <figcaption>
                <h3>Title</h3>
                <h4>subtitle</h4>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis, beatae.
                </p>
            </figcaption>
        </figure>
        <figure>
            <img src="{{ asset('img/user.jpeg') }}" alt="user">
            <figcaption>
                <h3>Title</h3>
                <h4>subtitle</h4>
                <p>
                    Lorem ipsum dolor sit.
                </p>
            </figcaption>
        </figure>
        <figure>
            <img src="{{ asset('img/user.jpeg') }}" alt="user">
            <figcaption>
                <h3>Title</h3>
                <h4>subtitle</h4>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. A, illo?
                </p>
            </figcaption>
        </figure>
    </article>
    <aside>

    </aside>
    <article id="menu">
        <h2>menu</h2>
        <div class="grid">
            <section v-for="cat in menu" class="item suggestions">
                <h3> @{{ cat.cat }}</h3>
                <ul>
                    <li v-for="item in cat.items">
                        @{{ item }}
                    </li>
                </ul>
            </section>
        </div>
    </article>
    <aside>

    </aside>
    <article id="contact">
        <h2>Contact us</h2>
        <section>
            <div class="details">
                <div class="adress">
                    <h3>adress</h3>
                    <p>
                        1509 Rose Street
                    </p>
                    <p>
                        Oakland, California, 94612
                    </p>
                </div>
                <div class="contact">
                    <h3>contact info</h3>
                    <p>
                        <i class="icon-envelope"></i>mail: resto@gmail.com
                    </p>
                    <p>
                        <i class="icon-telephone"></i>phone: 707-969-4533
                    </p>
                </div>
                <div class="socials">
                    <a href="#"><i class="icon-facebook"></i></a>
                    <a href="#"><i class="icon-twitter"></i></a>
                    <a href="#"><i class="icon-google-plus"></i></a>
                    <a href="#"><i class="icon-tripadvisor"></i></a>
                    <a href="#"><i class="icon-instagram"></i></a>
                </div>
            </div>
            <figure>
                <svg height="512pt" viewBox="0 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg">
                    <path d="m316 260c-5.519531 0-10 4.480469-10 10s4.480469 10 10 10 10-4.480469 10-10-4.480469-10-10-10zm0 0" />
                    <path d="m102.167969 369.785156-100 126c-2.386719 3.003906-2.839844 7.109375-1.171875 10.5625 1.667968 3.457032 5.167968 5.652344 9.003906 5.652344h492c3.835938 0 7.335938-2.195312 9.003906-5.652344 1.671875-3.453125 1.214844-7.558594-1.171875-10.5625l-100-126c-1.894531-2.390625-4.78125-3.785156-7.832031-3.785156h-87.597656l74.785156-117.296875c17.542969-26.300781 26.8125-56.972656 26.8125-88.703125 0-88.222656-71.773438-160-160-160s-160 71.777344-160 160c0 31.730469 9.269531 62.398438 26.8125 88.703125l74.785156 117.296875h-87.597656c-3.050781 0-5.933594 1.394531-7.832031 3.785156zm-37.335938 79.214844h60.464844l-34.125 43h-60.46875zm145.519531-63 27.414063 43h-71.0625l34.128906-43zm91.300782 0h9.519531l34.125 43h-71.058594zm59.519531 63 34.125 43h-278.59375l34.128906-43zm59.660156 43-34.128906-43h60.46875l34.125 43zm10.464844-63h-60.464844l-34.128906-43h60.46875zm-291.789063-191.3125c-15.378906-23.023438-23.507812-49.886719-23.507812-77.6875 0-77.195312 62.804688-140 140-140s140 62.804688 140 140c0 27.800781-8.128906 54.664062-23.503906 77.6875-.042969.058594-.078125.117188-.117188.175781-6.566406 10.300781-111.320312 174.605469-116.378906 182.535157-12.722656-19.957032-103.421875-162.214844-116.378906-182.535157-.035156-.058593-.074219-.117187-.113282-.175781zm35.789063 148.3125-34.125 43h-60.46875l34.128906-43zm0 0" />
                    <path d="m256 260c54.898438 0 100-44.457031 100-100 0-55.140625-44.859375-100-100-100s-100 44.859375-100 100c0 55.558594 45.117188 100 100 100zm0-180c44.113281 0 80 35.886719 80 80 0 44.523438-36.175781 80-80 80-43.835938 0-80-35.476562-80-80 0-44.113281 35.886719-80 80-80zm0 0" />
                    <path d="m298.121094 294.125c-4.726563-2.851562-10.875-1.328125-13.726563 3.402344l-36.960937 61.320312c-2.851563 4.730469-1.328125 10.875 3.402344 13.726563 4.75 2.863281 10.886718 1.308593 13.726562-3.402344l36.960938-61.320313c2.851562-4.730468 1.328124-10.875-3.402344-13.726562zm0 0" /></svg>
            </figure>
        </section>

        <div class="messages">
            @if (session('contactSucces'))
                <p class='succes'>Reservation has been sent succesfully!</p>
            @elseif (session('contactFail'))
                @foreach (session('contactFail') as $message)
                    <p class="error">This is user {{ $message }}</p>
                @endforeach
            @endif
        </div>

        @if (!session('contactSucces'))
        <form id="contact-form" action="{{ route('contact.store') }}" method="POST">
            @csrf
            <input type="text" name="name" id="name" placeholder="name">
            <input type="email" name="email" id="email" placeholder="email">
            <input type="tel" name="phonenumber" id="phonenumber" placeholder="phonenumber">
            <input type="date" name="date" id="date">
            <textarea name="info" id="info" cols="30" rows="10" placeholder="additional information (optional)"></textarea>
            <input type="submit" value="send">
        </form>
        @endif
    </article>
    <aside>

    </aside>
    <article id="review">
        <h2>Reviews</h2>

        <a href="#" class="button" id="write_review"><span>write review</span></a>

        <div class="messages">

        </div>
        
        <div class="reviews">
            <ul>
                <li v-for="review in reviews" class="review">
                    <div class="header">
                        <h3>@{{ review.author }}</h3>
                        <p>@{{ review.date }}</p>
                    </div>
                    <div class="content">
                        <p>@{{ review.text }}</p>
                    </div>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
        <div class="modal_container hidden">
            <div class="modal">
                <div class="modal_header">
                    <h1>Write Review</h1>
                    <span class="close"><i></i></span>
                </div>
                <div class="modal_body">
                    <div class="messages"></div>
                    <review-form action='{{ route('review.store') }}' csrf='{{ csrf_token() }}'></review-form>
                </div>
            </div>
        </div>
    </article>
    <aside>

    </aside>
</main>

<footer>
    <p>Made by <a href="https://www.sandaa-web.com">Xander D.</a></p>
</footer>

@endsection
    
@section('scripts')
    <!--jquery-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!--polyfill-->
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>

    <!--vue js-->
    <script src="{{ asset('js/app.js') }}"></script>

    <!--helper script with global functions-->
    <script src="{{ asset('js/helpers.js') }}"></script>

    <!--socket js-->
    <script src="{{ asset('js/reviewSocket.js') }}"></script>

    <!--animation-->
    <script src="{{ asset('js/animation.js') }}"></script>

    <!--page scripts-->
    <script src="{{ asset('js/index.js') }}"></script>
@endsection