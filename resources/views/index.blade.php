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


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    
</body>

</html>
