import api from "./api.js";

export default class Todos {

    static async getAll() {
        try {
            let response = await api("/todo");
            return response.data;
        }
        catch (ex) {
            console.log(ex);
        }
    }

    static async getById(idTodo) {
        try {
            const response = await api('/todo/' + idTodo, { method: 'GET' });
            return response.data;
        }
        catch (ex) {
            console.log(ex);
        }
    }
    
    static async createTodo(data) {
        try {
            let response = await api("/todo", { method: 'POST', body: JSON.stringify({ description: data }) });
            return response;
        }
        catch (ex) {
            console.log(ex);
        }
    }

    static async update(id, status) {
        try {
            let response = await api("/todo/" + id, { method: 'PUT', body: JSON.stringify({ completed: status }) });
            return response;
        }
        catch (ex) {
            console.log(ex);
        }
    }

    static async delete(id) {
        try {
            let response = await api('/todo/' + id, { method: 'DELETE' });
            return response;
        }
        catch (ex) {
            console.log(ex);
        }
    }
}