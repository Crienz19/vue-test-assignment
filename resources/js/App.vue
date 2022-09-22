<script setup>
import { QuillEditor } from "@vueup/vue-quill";
import "@vueup/vue-quill/dist/vue-quill.snow.css";

import { onUpdated, ref } from "vue";
import FileMenu from "./components/FileMenu.vue";
import NoteListModal from "./components/NoteListModal.vue";

const isLoadList = ref(false);
const quill = ref(null);
const input = ref({});
const title = ref("");
const noteId = ref(0);

const handleNewNote = () => {
    input.value = {};
    title.value = "";
    noteId.value = 0;
};

const handleOpenNote = () => {
    isLoadList.value = true;
    $("#note-list").modal("show");
};

const handleSaveNote = async () => {
    if (!title.value) {
        var noteTitle = prompt("Enter a note title: ");
        if (noteTitle) {
            await fetch("http://localhost:8000/api/note/store", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    title: noteTitle,
                    note: JSON.stringify(input.value),
                }),
            });
        }
    } else {
        await fetch(`http://localhost:8000/api/note/${noteId.value}/update`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                _method: "PATCH",
                note: JSON.stringify(input.value),
            }),
        });
    }
};

const handleSaveAsNote = async () => {
    var noteTitle = prompt("Enter a note title: ");
    if (noteTitle) {
        await fetch("http://localhost:8000/api/note/store", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                title: noteTitle,
                note: JSON.stringify(input.value),
            }),
        });
    }
};

const handleSelectedNote = (id) => {
    noteId.value = id;
    isLoadList.value = false;
    getContent(id);
    $("#note-list").modal("hide");
};

const getContent = async (id) => {
    const response = await fetch(
        `http://localhost:8000/api/note/${id}/show`
    );
    const json = await response.json();
    input.value = JSON.parse(json);
}; 
</script>

<template>
    <div class="container">
        <FileMenu
            @handleNew="handleNewNote"
            @handleOpen="handleOpenNote"
            @handleSave="handleSaveNote"
            @handleSaveAs="handleSaveAsNote"
        />
        <QuillEditor
            v-model:content="input"
            theme="snow"
            toolbar="essential"
        />
        <NoteListModal
            @select-note="handleSelectedNote"
            :loadList="isLoadList"
        />
    </div>
</template>
