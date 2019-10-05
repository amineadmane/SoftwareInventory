<nav class="navbar sticky-top navbar-dark bg-dark navbar-expand-sm" id="navbar">
    <a class="navbar-brand" href="#">
        <img id="imglogo" src="{{asset('Images/Elbaraka.png')}}" style="border-radius: 20px;">
    </a>
    <p class="navbar-brand" href="" id="softwareinventory">Software Inventory</p>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav ml-auto Ulitem">
            <a id="Home"  class="nav-item nav-link ml-1"  style="color: white;" href="{{ url('/') }}"><span class="fas fa-home" style="color: darkorange"></span> Acceuil </a>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle ml-3" href="#" style="color: white;" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span class="fas fa-user" style="color: darkorange;margin-right: 6px;"></span>{{ Auth::user()->nom }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                            {{ __('Deconnexion') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
        </ul>
    </div>
</nav>
<script src="{{asset('js/jquery-3.4.1.js')}}"></script>
<script src="{{asset('/js/bootstrapjs/bootstrap.js')}}" ></script>