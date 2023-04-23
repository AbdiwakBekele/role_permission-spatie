<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Index</title>
    </head>

    <body>

        @role('admin')
        <h1>This is Admin</h1>
        <p>Welcome {{Auth::user()->name}}</p>
        @endrole

        <a href="/role">Roles</a><br>
        <a href="/permission"> Permission </a><br>
        <a href="/user"> Users </a>

        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>

        <hr>


    </body>

</html>