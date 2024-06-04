import Auth from "../services/auth.js";
import location from "../services/location.js";
import loading from "../services/loading.js";
import Todos from "../services/todos.js";
import Form from "../components/form.js";

const init = async () => {
    const { ok: isLogged } = await Auth.me()

    if (!isLogged) {
        return location.login()
    } else {
        loading.stop()
    }

    async function loadTodos() {
        loading.start();
        let todos = await Todos.getAll();
        var doc = document.querySelector(".todos");
        doc.innerHTML = "";
        todos.forEach(element => {
            doc.insertAdjacentElement("beforeend", createTodo(element))
        });
        loading.stop();
    }

    async function updateTodo(e, todoId) {
        loading.start();
        const value = e.target.checked;
        e.target.checked = !e.target.checked;
        const response = await Todos.update(todoId, value);
        loading.stop();
        if (response) {
            e.target.checked = !e.target.checked;
        } else {
            alert("Ошибка запроса");
        }
    } 


    //Инициализация элементов todo записи
    function createTodo(todo) {
        let div = document.createElement("div");
        div.classList.add("todoItem");
        
        let сheckBox = document.createElement("input");
        сheckBox.setAttribute("type", "checkbox");
        сheckBox.checked = todo.completed;
        сheckBox.onchange = async function(event) {
            await updateTodo(event, todo.id);
        }
        div.insertAdjacentElement("beforeend", сheckBox);

        let description = document.createElement("span");
        description.innerText = todo.description;
        div.insertAdjacentElement("beforeend", description);


        let deleteButton = document.createElement("button");
        deleteButton.innerText = "Удалить";
        deleteButton.addEventListener("click", async () => {
            await Todos.delete(todo.id);
            await loadTodos();
        })
        div.insertAdjacentElement("beforeend", deleteButton);
        
        return div;
    }

    async function addTodo(desc) {
        loading.start();
        const response = await Todos.createTodo(desc);
        loading.stop();
        if (response) {
            await loadTodos();
        } else {
            alert("Ошибка добавления");
        }
    }

    async function UpdateLoadTodo(value) {
        await addTodo(value.description);
        await loadTodos();
    }

    const form = document.getElementById("formAdding");
    new Form(form, {
        "description": () => false,
    }, async (values) => {
        await UpdateLoadTodo(values);
    })

    await loadTodos();
}


    // create POST /todo { description: string }
    // get get /todo/1 - 1 это id
    // getAll get /todo
    // update put /todo/1 - 1 это id { description: string }
    // delete delete /todo/1 - 1 это id

if (document.readyState === 'loading') {
    document.addEventListener("DOMContentLoaded", init)
} else {
    init()
}
