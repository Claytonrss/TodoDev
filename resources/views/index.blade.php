<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TodoDev</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>

<body>
    <div class="container">
        <header class="mt-5">
            <img src="{{ asset('images/logo.svg') }}" alt="Logo da Lista de Tarefas">
            <h1 class="mt-3">TodoDev</h1>
            <h3>A sua lista de tarefas</h3>
        </header>
        <main class="mt-5 mx-auto">
            <section class="add-item">
                <input type="text" placeholder="Adicione um item...">
                <button>+</button>
            </section>
            <section class="task-list mt-5">
                <div class="task">
                    <label for="task-1">
                        <input type="checkbox" id="task-1">
                        <p>Lavar a louça</p>
                    </label>
                </div>
                <div class="task done">
                    <label for="task-2">
                        <input type="checkbox" id="task-2">
                        <p>Lavar a louça</p>
                    </label>
                </div>
            </section>
        </main>

    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    
</body>

</html>
