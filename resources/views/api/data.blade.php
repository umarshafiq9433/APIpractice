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
                    <a class="nav-link active" href="/list">List</a>
                </li>
                </ul>
            </nav>
        </div>
        <div class="container py-5">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="table-body">

                </tbody>
            </table>
        </div>
    </body>
    <script>
        $(document).ready(function(){
            function load(){
            $.get("https://usman-recipes.herokuapp.com/api/recipes",function(data){
                var str = "";
                for(i=0;i<data.length;i++){
                    str += "<tr><td>"+data[i]._id+"</td><td>"+data[i].title+"</td><td>"+data[i].body+"</td><td><a href='/"+data[i]._id+"/edit'><button class='btn btn-warning'>Update</button></a></td><td><button class='btn btn-danger' data-id='"+data[i]._id+"'>Delete</button></td></tr>";
                }
                $("#table-body").html(str);
            });
        }
        load();

        $(document).on("click",".btn-danger",function(){
            $(this).removeClass("btn-danger");
            $(this).addClass("btn-primary");
            $(this).html("Deleting...");
            var id = $(this).data('id');
            $.ajax({url:"https://usman-recipes.herokuapp.com/api/recipes/"+id,type:"DELETE",success:function(data){
                load();
            }});
        });
        //Disable cut copy paste
        });
    </script>
</html>
