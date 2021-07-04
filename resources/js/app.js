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
    showLoading();
    const description = $(".add-item input").val();
    const status = "0";

    if (description == "") {
        showError("O título da tarefa não pode estar vazio.");
        return false;
    }

    $(".add-item input")
        .val("")
        .trigger("focus");

    axios
        .post("/api/todos", {
            description,
            status
        })
        .then(({ data }) => {
            if (typeof data.type != "undefined" && data.type == "success") {
                loadTodos();
            } else {
                showError(
                    "Falha ao gravar a tarefa. Por favor tente novamente mais tarde."
                );
            }
        })
        .catch(error => {
            showError(
                "Falha ao gravar a tarefa. Por favor tente novamente mais tarde."
            );
        })
        .then();
}

function updateTodo(event) {
    event.preventDefault();
    showLoading();

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
            } else {
                showError(
                    "Falha ao atualizar a tarefa. Por favor tente novamente mais tarde."
                );
            }
        })
        .catch(function(error) {
            showError(
                "Falha ao atualizar a tarefa. Por favor tente novamente mais tarde."
            );
        });
}

function deleteTodo(event) {
    showLoading();
    const idTodo = $(event.currentTarget)
        .next()
        .find("input")
        .attr("id")
        .replace("todo-", "");

    axios
        .delete(`/api/todos/${idTodo}`)
        .then(function({ data }) {
            if (typeof data.type != "undefined" && data.type == "success") {
                loadTodos();
            } else {
                showError(
                    "Falha ao excluir a tarefa. Por favor tente novamente mais tarde."
                );
            }
        })
        .catch(function(error) {
            showError(
                "Falha ao excluir a tarefa. Por favor tente novamente mais tarde."
            );
        });
}

function loadTodos() {
    //verificar se exitem Tarefas e carregar
    showLoading();
    const todoList = $(".todo-list");
    axios
        .get("/api/todos")
        .then(function(response) {
            const { data } = response;
            if (typeof data.type != "undefined" && data.type == "success") {
                const todos = data.todos;

                todoList.empty();

                if (todos.length == 0) {
                    todoList.append(
                        '<p class="empty">Sua lista de tarefas está vazia 😄</p>'
                    );
                    return false;
                }

                todos.forEach(todo => {
                    const todoDone = todo.status ? "done" : "";

                    todoList.append(
                        `<div class="todo ${todoDone}">` +
                            IconDelete +
                            `<label for="todo-${todo.id}">
                                <input type="checkbox" id="todo-${todo.id}">
                                <p>${todo.description}</p>
                            </label>
                        </div>`
                    );
                });

                $(".todo label").on("click", updateTodo);
                $(".todo .delete").on("click", deleteTodo);
            } else {
                todoList.append(
                    '<p class="empty alert alert-danger">Falha ao tentar buscar as tarefas 🤕</p>'
                );
            }
        })
        .catch(function(error) {
            todoList.append(
                '<p class="empty alert alert-danger">Falha ao tentar buscar as tarefas 🤕</p>'
            );
        })
        .then(function() {
            hideLoading();
        });
}

function showLoading() {
    $(".loading").css("height", $(document).height());
    $(".loading").removeClass("hide");
}

function hideLoading() {
    $(".loading").addClass("hide");
}

function showError(message) {
    hideLoading();
    $("#msg-error").text(message);
    $("#modalAlert").modal();
}
