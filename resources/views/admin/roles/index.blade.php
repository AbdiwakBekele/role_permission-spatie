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
        <h1> Roles </h1>

        <div class="container">
            <a class="btn btn-primary" href="/role/create"> Add Role </a>
            <table class="table">
                <tr>
                    <td>Name</td>
                    <td>Action</td>
                </tr>

                @foreach($roles as $role)
                <tr>
                    <td>{{$role->name}}</td>
                    <td>
                        <a href="role/{{$role->id}}/edit">Edit</a>
                        <a href="#">Delete</a>
                    </td>
                </tr>

                @endforeach

            </table>
        </div>



    </body>

</html>