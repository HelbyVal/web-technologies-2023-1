import api from "./api.js";

export default class Todos {

    static async getAll() {
        let response = await api("/todo");
        return response.data;
    }

    static async getById(idTodo) {
        const response = await api('/todo/' + idTodo, { method: 'GET' });
        return response.data;
    }
    
    static async createTodo(data) {
        let response = await api("/todo", { method: 'POST', body: JSON.stringify({ description: data }) });
        return response;
    }

    static async update(id, status) {
        let response = await api("/todo/" + id, { method: 'PUT', body: JSON.stringify({ completed: status }) });
        return response;
    }

    static async delete(id) {
        let response = await api('/todo/' + id, { method: 'DELETE' });
        return response;
    }
}