<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>
        <title>User</title>
    </head>

    <body>
        <h1>Edit User </h1>

        <div class="container">
            <form action="/user/{{$user->id}}" method="post">
                @csrf
                @method('PUT')
                User Name: <input type="text" name="user_name" value="{{$user->name}}">
                User Email: <input type="text" name="user_email" value="{{$user->email}}">
                <input type="submit" class="btn btn-success">
            </form>

            <hr>

            <h3>Roles</h3>

            @foreach($user->roles as $role)

            <div class="alert alert-info"> {{$role->name}} </div>

            @endforeach

            <h3>Assign Role</h3>
            <form action="/user/{{$user->id}}/role" method="post">
                @csrf
                <select name="assign_role">
                    <option value="">Select</option>
                    @foreach($roles as $role)

                    <option value="{{$role->name}}">{{$role->name}}</option>
                    @endforeach
                </select>

                <input class="btn btn-success" type="submit">
            </form>

            <hr>
            <h3>Permission</h3>
            @foreach($user->permissions as $permission)

            <div class="alert alert-info"> {{$permission->name}} </div>

            @endforeach

            <h3>Assign Permission</h3>
            <form action="/user/{{$user->id}}/permission" method="post">
                @csrf
                <select name="assign_permission">
                    <option value="">Select</option>
                    @foreach($permissions as $permission)

                    <option value="{{$permission->name}}">{{$permission->name}}</option>
                    @endforeach
                </select>

                <input class="btn btn-success" type="submit">
            </form>
        </div>



    </body>

</html>