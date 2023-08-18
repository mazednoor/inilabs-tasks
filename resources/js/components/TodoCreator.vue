<script setup>
import { ref } from "vue";
import TodoButton from "./TodoButton.vue";

const emit = defineEmits(["create-todo"]);

const todo = ref("");
const invalid = ref(null);
const errMsg = ref("");

const createTodo = () => {
    invalid.value = null;
    if (todo.value !== "") {
        emit("create-todo", todo.value);
        todo.value = "";
        return;
    }

    invalid.value = true;
    errMsg.value = "This input is incorret";
};
</script>

<template>
    <div class="input_wrap" :class="{ input_err: invalid }">
        <input type="text" v-model="todo" />
        <TodoButton @click="createTodo" />
    </div>
    <p v-show="invalid" class="err_msg">{{ errMsg }}</p>
</template>

<style lang="scss" scoped>
.input_wrap {
    display: flex;
    transition: 250ms ease;
    border: 2px solid #41b080;

    &.input_err {
        border-color: red;
    }
    &:focus-within {
        box-shadow: 0 -4px 6px -1px rgb(0 0 0 / 0.1),
            0 -2px 4px -2px rgb(0 0 0 / 0.1);
    }
    input {
        width: 100%;
        padding: 8px 6px;
        border: none;
        &:focus {
            outline: none;
        }
    }
}

.err_msg {
    margin-top: 6px;
    font-size: 12px;
    text-align: center;
    color: red;
}
</style>
