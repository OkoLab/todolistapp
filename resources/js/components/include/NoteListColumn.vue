<template>
    <td class="td">
        <ul class="ul">
            <template v-for="(note, index) in notes" :key="index">
                <li class="li" v-if="note.urgent == isUrgent">
                    <node-list-row :note="note" v-on:reloadlist="$emit('reloadlist')" />
                </li>
            </template>
        </ul>
        <add-note-form v-if="!isUrgent" v-on:reloadlist="$emit('reloadlist')"/>
    </td>
</template>

<script>

import addNoteForm from "./AddNoteForm.vue";
import nodeListRow from "./NoteListRow.vue";

export default {
    props: ["notes" , "isUrgent"],
        components: {
            addNoteForm,
            nodeListRow,
        },
};

</script>

<style scoped>
  .td {
    @apply border-r align-top;
  }
  .ul {
    @apply list-disc;
  }
  .li {
    @apply ml-7 mr-7;
  }
</style>