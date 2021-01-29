<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- METAS -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Semexe CRUD</title>

    <!-- FONTS AND ICONS -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="shortcut icon" href="img/icon.png">

    <!-- STYLES -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">

</head>

<body>

    <!-- CRUD -->
    <section class="crud">

        <!-- search -->
        <header class="my-container search">
            <h1 class="title text-white">Minha lista de contatos</h1>

            <form class="form" action="" method="get">
                <div class="mb-3">
                    <input type="text" class="bg-dark text-white form-control form-control-lg" id="search" placeholder="Procure por algo...">
                </div>
            </form>
        </header>

        <!-- results -->
        <main class="my-container results">
            <!-- card -->
            <article class="card text-white bg-dark table-responsive">
                <!-- header -->
                <header class="card-header">
                    <h5 class="card-subtitle mb-2 text-muted">
                        Minha lista
                    </h5>
                    <button onclick="initFormCreate()" type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modalPerson">
                        Criar
                    </button>
                </header>
                <!-- body -->
                <article class="card-body">
                    <!-- table -->
                    <table class="table table-dark table-borderless">
                        <!-- header -->
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>CEP</th>
                                <th>Endereço</th>
                                <th>Numero</th>
                                <th>Complemento</th>
                                <th>Cidade</th>
                                <th>Estado</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <!-- body -->
                        <tbody class="table-body text-white">
                        </tbody>
                    </table>
                </article>
                <!-- footer -->
                <footer class="card-footer text-muted">
                    <p><strong id="records">0</strong> pessoa(s) encontrada(s)</p> 
                </footer>
            </article>
        </main>
    </section>

    <!-- MODALS -->
    <section class="modal" role="dialog" id="modalPerson">
        <div class="modal-dialog modal-dialog-scrollable">
            <!-- content -->
            <form id="formPerson" class="modal-content text-white bg-dark">
                <!-- header -->
                <header class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </header>
                <!-- body -->
                <article class="modal-body">
                    <div class="input-group mb-3">
                        <input id="name" type="text" class="bg-dark text-white form-control" name="Name" placeholder="Nome">
                    </div>
                    <div class="input-group mb-3">
                        <input id="cpf" type="text" class="bg-dark text-white form-control" name="CPF" placeholder="CPF">
                    </div>
                    <div class="input-group mb-3">
                        <input id="email" type="email" class="bg-dark text-white form-control" name="Email" placeholder="Email">
                    </div>
                    <div class="input-group mb-3">
                        <input id="phone" type="text" class="bg-dark text-white form-control" name="Phone" placeholder="Telefone">
                    </div>
                    <div class="input-group mb-3">
                        <input id="zipcode" type="text" class="bg-dark text-white form-control" name="Zipcode" placeholder="Cep">
                    </div>
                    <div class="input-group mb-3">
                        <input id="address" type="text" class="bg-dark text-white form-control" name="Address" placeholder="Endereço">
                    </div>
                    <div class="input-group mb-3">
                        <input id="number" type="text" class="bg-dark text-white form-control" name="Number" placeholder="Número">
                    </div>
                    <div class="input-group mb-3">
                        <input id="complemento" type="text" class="bg-dark text-white form-control" name="Complement" placeholder="Complemento">
                    </div>
                    <div class="input-group mb-3">
                        <input id="cidade" type="text" class="bg-dark text-white form-control" name="City" placeholder="Cidade">
                    </div>
                    <div class="input-group mb-3">
                        <input id="state" type="text" class="bg-dark text-white form-control" name="State" placeholder="Estado">
                    </div>

                    <input id="id" type="hidden" name="PersonID">
                </article>
                <!-- footer -->
                <footer class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary submit">Criar</button>
                </footer>
            </form>
        </div>
    </section>

    <!-- SCRIPTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.com/libraries/jquery.mask"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>