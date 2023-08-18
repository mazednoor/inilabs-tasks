<script setup>
import { Icon } from "@iconify/vue";
import axios from "axios";
import { computed, ref } from "vue";
import TodoCreator from "./TodoCreator.vue";
import TodoItem from "./TodoItem.vue";

const todoList = ref([]);

// function getTodo() {
//     axios.get("http://127.0.0.1:8000/api/todos").then((response) => {
//         todoList.value = response.data;
//         console.log(todoList.value[1].is_completed);
//     });
// }

// getTodo();

const getTodo = () => {
    axios.get("http://127.0.0.1:8000/api/todos").then((response) => {
        todoList.value = response.data;
        for (let i = 0; i < todoList.value.length; i++) {
            if (todoList.value[i].is_completed == true) {
                todoList.value[i].isCompleted = true;
                console.log(todoList.value[i].isCompleted);
            }
        }
    });
};

getTodo();

const createTodo = (todo) => {
    axios
        .post("http://127.0.0.1:8000/api/store-todo", {
            todo: todo,
        })
        .then(() => {
            todo = "";
        });

    todoList.value.push({
        todo,
        isCompleted: null,
        isEditing: null,
    });
};

const toggleTodoComplete = (todoPos) => {
    if (todoList.value[todoPos].isCompleted != true) {
        axios.post("http://127.0.0.1:8000/api/complete-todo", {
            id: todoList.value[todoPos].id,
        });

        todoList.value[todoPos].isCompleted = true;
    } else {
        axios.post("http://127.0.0.1:8000/api/uncomplete-todo", {
            id: todoList.value[todoPos].id,
        });
        todoList.value[todoPos].isCompleted = false;
    }
};

const toggleEditTodo = (todoPos) => {
    todoList.value[todoPos].isEditing = !todoList.value[todoPos].isEditing;
};

const updateTodo = (todoVal, todoPos) => {
    axios.post("http://127.0.0.1:8000/api/update-todo", {
        id: todoList.value[todoPos].id,
        todo: todoVal,
    });
    todoList.value[todoPos].todo = todoVal;
};

const deleteTodo = (todoID) => {
    axios
        .post("http://127.0.0.1:8000/api/delete-todo", {
            id: todoID,
        })
        .then(() => getTodo());
};

const todoCompleted = computed(() => {
    return todoList.value.every((todo) => todo.isCompleted);
});
</script>

<template>
    <main>
        <h1>Create Todo</h1>
        <TodoCreator @create-todo="createTodo" />
        <ul class="todo-list" v-if="todoList.length > 0">
            <TodoItem
                v-for="(todo, index) in todoList"
                :todo="todo"
                :index="index"
                @toggle-complete="toggleTodoComplete"
                @edit-todo="toggleEditTodo"
                @updated-todo="updateTodo"
                @delete-todo="deleteTodo"
            />
        </ul>
        <p class="todos-msg" v-else>
            <Icon icon="noto-v1:sad-but-relieved-face" width="22" />
            <span>You have no todo's to Completed! Add one!</span>
        </p>
        <p v-if="todoCompleted && todoList.length > 0" class="todos-msg">
            <Icon icon="noto-v1:party-popper" />
            <span>You have completed all your todos!</span>
        </p>
    </main>
</template>

<style lang="scss" scoped>
main {
    display: flex;
    flex-direction: column;
    max-width: 500px;
    width: 100%;
    margin: 0 auto;
    padding: 40px 16px;
    h1 {
        margin-bottom: 16px;
        text-align: center;
    }
    .todo-list {
        display: flex;
        flex-direction: column;
        list-style: none;
        margin-top: 24px;
        gap: 20px;
    }
    .todos-msg {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        margin-top: 24px;
    }
}
</style>
