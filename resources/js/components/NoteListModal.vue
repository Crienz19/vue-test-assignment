<script setup>
import { ref, onUpdated } from "vue";

const props = defineProps(["loadList"]);

const notes = ref([]);

const loadNoteList = async () => {
    await fetch(`http://localhost:8000/api/note`)
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            notes.value = data;
        });
};

onUpdated(() => {
    if (props.loadList === true && notes.value.length == 0) {
        loadNoteList();
    }
});
</script>

<template>
    <div
        class="modal fade"
        id="note-list"
        tabindex="-1"
        role="dialog"
        aria-labelledby="note-list-label"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        Note List
                    </h5>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li class="my-2" v-for="note in notes" :key="note.id">
                            <div>
                                {{ note.title }}
                                <button @click="$emit('select-note', note.id)" class="btn btn-primary btn-sm">
                                    Select
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>
