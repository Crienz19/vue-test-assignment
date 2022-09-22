<script setup>
import { QuillEditor } from '@vueup/vue-quill';
import '@vueup/vue-quill/dist/vue-quill.snow.css';

defineProps(['note'])
defineEmits(['update:note'])

</script>

<template>
    <QuillEditor 
        theme="snow" 
        :value="note"
        @input="$emit('update:note', $event.target.value)"
    />
</template>