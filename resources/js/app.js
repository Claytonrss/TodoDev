require("./bootstrap");

$(window).on("load", () => {
    loadTodos();

    $(".add-item button").on("click", addTodo);

    $(".add-item input").on("keydown", ({ key }) => {
        if (key === "Enter") {
            addTodo();
        }
    });
});

function addTodo() {
    const description = $(".add-item input").val();
    const status = 0;

    $(".add-item input").val("");

    axios
        .post("/api/todos", {
            description,
            status
        })
        .then(function({ data }) {
            if (typeof data.type != "undefined" && data.type == "success") {
                loadTodos();
            }
        })
        .catch(function(error) {
            console.log(error);
        });
}

function updateTodo(event) {
    event.preventDefault();

    const idTodo = $(event.currentTarget)
        .find("input")
        .attr("id")
        .replace("todo-", "");

    const isDone = $(event.currentTarget)
        .parent()
        .hasClass("done");
    const status = isDone ? 0 : 1;

    axios
        .put(`/api/todos/${idTodo}`, { status })
        .then(function({ data }) {
            if (typeof data.type != "undefined" && data.type == "success") {
                loadTodos();
            }
        })
        .catch(function(error) {
            console.log(error);
        });
}

function loadTodos() {
    //verificar se exitem Tarefas e carregar
    axios
        .get("/api/todos")
        .then(function(response) {
            const { data } = response;
            if (typeof data.type != "undefined" && data.type == "success") {
                const todos = data.todos;
                const todoList = $(".todo-list");

                if (todos.length == 0) {
                    todoList.append(
                        '<p class="empty">Sua lista de tarefas está vazia 😄</p>'
                    );
                    return false;
                }

                todoList.empty();

                todos.forEach(todo => {
                    const todoDone = todo.status ? "done" : "";

                    todoList.append(`<div class="todo ${todoDone}">
                                        <label for="todo-${todo.id}">
                                            <input type="checkbox" id="todo-${todo.id}">
                                            <p>${todo.description}</p>
                                        </label>
                                    </div>`);
                });

                $(".todo label").on("click", updateTodo);
            }
        })
        .catch(function(error) {
            const todoList = $(".todo-list");
            todoList.append(
                '<p class="empty">Falha ao tentar buscar as tarefas 🤕</p>'
            );
        });
}
