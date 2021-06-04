<!------------Navbar start------------->
<div id="nav">
    <nav class="navbar navbar-expand-lg navbar-light">
        <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button">
            <span class="navbar-toggler-icon">
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">
                        Home
                        <span class="sr-only">
                            (current)
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('aboutUs') }}">
                        About us
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdown" role="button">
                        Category
                    </a>
                    <div aria-labelledby="navbarDropdown" class="dropdown-menu ">
                        <?php 
                        $cat_publish =DB::table('food_categories')->
                        get();

                        foreach($cat_publish as $cat) {?>
                        <a class="dropdown-item" href="{{route('category_by_food',$cat->id)}}">
                            {{$cat->name}}
                        </a>
                        <?php }?>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{route('Contactus')}}">
                        Contact US
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('cart')}}">
                        Food Cart
                    </a>
                </li>

                @if(session('student_id'))

                <li class="nav-item dropdown">
                    <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarDropdown" role="button">
                        {{ session('student_name') }}
                    </a>
                    <div aria-labelledby="navbarDropdown" class="dropdown-menu ">
                        <a class="dropdown-item" href="{{route('profile')}}">
                            Profile
                        </a>
                        
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('student_logout')}}">
                        Logout
                    </a>
                </li>

                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('student.register')}}">
                        Register
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login.page')}}">
                        Login
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </nav>
</div>
<!-----------Navbar end-------------->
