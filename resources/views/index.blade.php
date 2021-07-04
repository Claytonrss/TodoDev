<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TodoDev</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>

<body>

    <!-- Content -->
    <div class="container">
        <header>
            <img src="{{ asset('images/logo.svg') }}" alt="Logo da Lista de Tarefas">
            <h1 class="mt-3">TodoDev</h1>
            <h3>A sua lista de tarefas</h3>
            <section class="add-item">
                <input type="text" placeholder="Adicione um item...">
                <button>+</button>
            </section>
        </header>
        <main class="mx-auto">
            <section class="todo-list">
                
            </section>
        </main>
    </div>

    <!-- Loading -->
    <div class="loading hide">
        <div class="spinner-grow" role="status">
            <span class="visually-hidden"></span>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalAlert" tabindex="-1" role="dialog" aria-labelledby="modalAlertTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalAlertLongTitle">Problema 😐</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="alert alert-danger" role="alert">
                    <p id="msg-error" class="mb-0"></p>
                </div>
            </div>
            <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div> -->
        </div>
        </div>
    </div>


    <!-- Scripts -->
    <script>
        const IconDelete = `<div class="delete"><img src="{{ asset('images/delete.svg')}}" alt="Ícone deletar"></div>`;
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    
</body>

</html>
