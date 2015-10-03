@extends('layouts.default')
@section('content')

    <div class="parallax-container">
        <div class="parallax"><img style="width:80%" src="res/laptop.jpg"></div>
    </div>

    <div class="container">
        <div class="row">
            <h2>An Online Store To Serve Everyone</h2>
        </div>

        <div class="row">
            <div class="col s3">
                <h5>Reasons why use our online store</h5>
            </div>

            <div class="col s9">
                <ul class="collapsible" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header">Reliable</div>
                        <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
                    </li>
                    <li>
                        <div class="collapsible-header">Secure</div>
                        <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
                    </li>
                    <li>
                        <div class="collapsible-header">Convenient</div>
                        <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row center-align">
            <div class="col s6">
                <h4>Log in</h4>
                <form method="post" action="#">
                    <div class="input-field">
                        <input type="text" id="username" name="username"/>
                        <label for="username">Username</label>
                    </div>

                    <div class="input-field">
                        <input type="password" id="password" name="password"/>
                        <label for="password">Password</label>
                    </div>

                    <button class="btn green" type="submit">Log In</button>
                </form>
            </div>

            <div class="col s6">
                <h4>No account yet? </h4>
                <form method="post" action="#">
                    <div class="input-field">
                        <input type="text" id="username" name="username"/>
                        <label for="username">Username</label>
                    </div>

                    <div class="input-field">
                        <input type="password" id="password" name="password"/>
                        <label for="password">Password</label>
                    </div>

                    <div class="input-field">
                        <input type="password" id="retypePassword" name="retypePassword"/>
                        <label for="retypePassword">Retype Password</label>
                    </div>

                    <button class="btn green" type="submit">Sign Up</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
          $('.parallax').parallax();
        });
    </script>
@stop