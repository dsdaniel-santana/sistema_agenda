<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Docente</title>
    <!--Bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--Font Awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <div class="col-md-6">
        <h2>Cadastrar Docente</h2>
        <form action="authservice" method="post">
            <div class="mb-3">
                <label for="new_nome">Nome</label>
                <input type="text" class="form-control" id="new_nome" name="new_nome" required>
            </div>

            <div class="mb-3">
                <label for="new_email" class="form-label">Email</label>
                <input type="email" class="form-control" id="new_email" name="new_email" required>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>


        </form>
    </div>

</body>

</html>