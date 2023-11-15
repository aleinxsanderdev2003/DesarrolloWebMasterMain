<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body style="background-repeat:no-repeat;background-size:cover;
background-image: url('https://images.unsplash.com/photo-1581299327801-faeb40ea459e?q=80&w=1610&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') ">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Login</h2>
                    </div>
                    <div class="card-body">
                        <form class="form">
                            <p class="form-title">Ingrese sesion para continuar</p>
                             <div class="input-container">
                               <input type="email" placeholder="Enter email">
                               <span>
                               </span>
                           </div>
                           <div class="input-container">
                               <input type="password" placeholder="Enter password">
                             </div>
                              <button type="submit" class="submit">
                             Iniciar Sesión
                           </button>

                           <p class="signup-link">
                             Olvidaste tu contraseña?
                             <a href="">Recuperar contraseña</a>
                           </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
