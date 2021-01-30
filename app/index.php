<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- METAS -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Semexe CRUD</title>

    <!-- FONTS AND ICONS -->
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- STYLES -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">

</head>

<body>
    <!-- ALERTS -->
    <section class="alerts" id="alerts">
        <!-- error -->
        <div class="alert fade text-danger alert-dismissible" id="alertError">
            <i class="bi bi-exclamation-triangle"></i>
            <p class="text">Ocorreu um erro ao realizar a operação.</p>
            <button type="button" onclick="dimissAlert()" class="btn-close">
                <i class="bi bi-x"></i>
            </button>
        </div>

        <!-- success -->
        <div class="alert text-success alert-dismissible" id="alertSuccess">
            <i class="bi bi-check-circle"></i>
            <p class="text">Operação realizada com succeso.</p>
            <button type="button" onclick="dimissAlert()" class="btn-close">
                <i class="bi bi-x"></i>
            </button>
        </div>
    </section>

    <!-- CRUD -->
    <section class="crud">

        <!-- search -->
        <header class="my-container search bg-dark">
            <form class="form" id="formFilter">
                <div class="mb-3">
                    <input type="text" class="bg-dark text-white form-control form-control-lg" name="Filter" id="search" placeholder="Procure por algo...">
                </div>
            </form>
        </header>

        <!-- results -->
        <main class="my-container results">
            <!-- card -->
            <article class="card text-white bg-dark">
                <!-- header -->
                <header class="card-header no-scroll">
                    <h5 class="card-subtitle mb-2 text-muted">
                        Minha lista
                    </h5>
                    <!-- button create -->
                    <button onclick="initFormCreate()" type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modalPerson">
                        Criar
                    </button>
                </header>
                <!-- body -->
                <article class="card-body table-responsive">
                    <!-- table -->
                    <table class="table table-dark table-borderless">
                        <!-- header -->
                        <thead>
                            <tr>
                                <th>Ações</th>
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
    <section class="modal" id="modalPerson">
        <div class="modal-dialog modal-dialog-scrollable">
            <!-- content -->
            <form id="formPerson" class="modal-content text-white bg-dark">
                <!-- header -->
                <header class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </header>
                <!-- body -->
                <article class="modal-body">
                    <div class="input-group mb-3">
                        <input id="name" type="text" class="bg-dark text-white form-control" max="150" name="Name" placeholder="Nome">
                        <div class="invalid-feedback">Nome inválido</div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="cpf" type="text" class="bg-dark text-white form-control" maxlength="14" name="CPF" placeholder="CPF">
                        <div class="invalid-feedback">CPF inválido</div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="email" type="email" class="bg-dark text-white form-control" maxlength="255" name="Email" placeholder="Email">
                        <div class="invalid-feedback">Email inválido</div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="phone" type="text" class="bg-dark text-white form-control" maxlength="14" name="Phone" placeholder="Telefone">
                        <div class="invalid-feedback">Telefone inválido</div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="zipcode" type="text" class="bg-dark text-white form-control" maxlength="9" name="Zipcode" placeholder="Cep">
                        <div class="invalid-feedback">Cep inválido</div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="address" type="text" class="bg-dark text-white form-control" maxlength="255" name="Address" placeholder="Endereço">
                        <div class="invalid-feedback">Endereço inválido</div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="number" type="number" class="bg-dark text-white form-control" min="1" name="Number" placeholder="Número">
                        <div class="invalid-feedback">Número inválido</div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="complement" type="text" class="bg-dark text-white form-control" maxlength="150" name="Complement" placeholder="Complemento">
                        <div class="invalid-feedback">Complemento inválido</div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="city" type="text" class="bg-dark text-white form-control" maxlength="100" name="City" placeholder="Cidade">
                        <div class="invalid-feedback">Cidade inválido</div>
                    </div>
                    <div class="input-group mb-3">
                        <select id="state" name="State" class="bg-dark text-muted form-select">
                            <option value="" disabled>Selecione um estado</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                            <option value="DF">Distrito Federal</option>
                        </select>
                        <div class="invalid-feedback">Selecione um estado</div>
                    </div>

                    <input id="id" type="hidden" name="PersonID">
                </article>
                <!-- footer -->
                <footer class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary submit">Criar</button>
                </footer>
            </form>
        </div>
    </section>

    <section class="modal" id="modalDelete">
        <div class="modal-dialog modal-dialog-scrollable">
            <!-- content -->
            <form id="formDelete" class="modal-content text-white bg-dark">
                <!-- header -->
                <header class="modal-header text-danger">
                    <h5 class="modal-title">Exclusão de contato</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </header>
                <!-- body -->
                <article class="modal-body">
                    <p>Certeza que deseja excluir o contato selecionado?</p>

                    <input id="idDelete" type="hidden" name="PersonID">
                </article>
                <!-- footer -->
                <footer class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Não</button>
                    <button type="submit" class="btn btn-danger submit">Sim</button>
                </footer>
            </form>
        </div>
    </section>

    <!-- SCRIPTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>