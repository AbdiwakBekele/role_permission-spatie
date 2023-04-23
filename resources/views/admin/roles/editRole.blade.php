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
        <title>Roles</title>
    </head>

    <body>
        <h1>Edit Roles </h1>

        <div class="container">
            <form action="/role/{{$role->id}}" method="post">
                @csrf
                @method('PUT')
                Role Name: <input type="text" name="role_name" value="{{$role->name}}">
                <input type="submit" class="btn btn-success">
            </form>

            <hr>

            <h3>Role Permissions</h3>

            @foreach($role->permissions as $permission)

            <div class="alert alert-info"> {{$permission->name}}</div>

            @endforeach

            <hr>

            <h3>Assign Role</h3>
            <form action="/role/{{$role->id}}/permission" method="post">
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