<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <style type="text/css">

        body{
            font-family: sans-serif;
            margin-top: 150px;
            background-color: #ffffff;
        }

        i{
            font-size:90px !important;
            color:rgb(213, 89, 36);
            margin-top:20px;
        }

        .error-main{
            background-color: #fff;
            border: 2px solid rgb(213, 89, 36);
            box-shadow: 0px 10px 10px -10px #5D6572;
        }

        .error-main h1{
            font-weight: bold;
            color: rgb(213, 89, 36);
            font-size: 100px;
            text-shadow: 2px 4px 5px #6E6E6E;
        }
        .error-main h6{
            color:rgb(213, 89, 36);
        }
        .error-main p{
            color: rgb(213, 89, 36);
            font-size: 14px; 
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-6 offset-lg-3 col-sm-6 offset-sm-3 col-12 p-3 error-main">
                <div class="row">
                    <div class="col-lg-8 col-12 col-sm-10 offset-lg-2 offset-sm-1">
                        <div>
                            <i class="fa fa-frown-o" aria-hidden="true"></i>
                            <h1 class="m-0">409</h1>
                            <h6>Esiste già un prodotto con questo nome</h6>
                            <a class="nav-link" href="{{ url('admin/products/create') }}"><img
                                src="https://cdn.discordapp.com/attachments/1043196087617470534/1072087578813153320/logo-deliveboo-removebg-preview.png"
                                alt="Deliveboo" width="250px"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
