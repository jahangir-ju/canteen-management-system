<!DOCTYPE html>
<html>
    <head>
        <title>
        </title>
        <link href="{{asset('Frontend/css/login.css')}}" rel="stylesheet" type="text/css">
            <link href="{{asset('Frontend/css/bootstrap.min.css')}}" rel="stylesheet">
            </link>
        </link>
    </head>
    <body>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
        @endif
        <form action="{{route('student-login')}}" method="post">
            @csrf
            <div class="login">
                <div class="loginHeader">
                    Canteen management Sytem Login Form
                </div>
                <div class="loginHeader">
                    Student Login
                </div>
                <div class="LoginContainer">
                    <table>
                        <tr>
                            <td>
                                Student Email
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <input name="user_email" type="text" value=""/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Password
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <input name="user_password" type="password"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                                <button class="addBtn" name="login" type="submit">
                                    Login
                                </button>
                                <button class="addBtn">
                                    <a href="{{ route('home')}}">
                                        Back
                                    </a>
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    </body>
</html>