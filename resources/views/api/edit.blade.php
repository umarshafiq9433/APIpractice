<!DOCTYPE html>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <!-- A grey horizontal navbar that becomes vertical on small screens -->
            <nav class="navbar navbar-expand-sm navbar-light">
                <!-- Links -->
                <ul class="navbar-nav col-md-4 float-right">
                <li class="nav-item">
                    <a class="nav-link" href="/">Add Recipe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/list">List</a>
                </li>
                </ul>
            </nav>
        </div>
        <div class="container py-5">
            <form action="" method="post">
                <input type="hidden" name="_method" value="put">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label for="desciption">Description</label>
                    <textarea id="description" class="form-control" name="body"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success float-right" id="submit">
                </div>
            </form>
        </div>
        <script>
        $(document).ready(function(){
            function load(){
                $.get("https://usman-recipes.herokuapp.com/api/recipes/{{ $id }}",function(data){
                    var title = data.title;
                    var description = data.body;
                    $("#title").val(title);
                    $("#description").val(description);
                });
            }
            load();

            $("#submit").on("click",function(){
                event.preventDefault();
                var title = $("#title").val();
                var description = $("#description").val();
                $.ajax({
                    url:"https://usman-recipes.herokuapp.com/api/recipes/{{ $id }}",
                    type:'put',
                    data:{title:title,desciption:description},
                    success:function(data){
                        document.location = "/list";
                    }
                });
            });
        });
        </script>
    </body>
</html>
