<template>
    <table class="tbl">
      <thead>
        <tr class="tr">
          <th-table :isUrgent="false" :notesCounter="notesCounter(false)" />
          <th-table :isUrgent="true" :notesCounter="notesCounter(true)" />
        </tr>
      </thead>
      <tbody>
          <tr class="">            
            <note-list-column :notes="notes" :isUrgent=false v-on:reloadlist="$emit('reloadlist')"/>
            <note-list-column :notes="notes" :isUrgent=true v-on:reloadlist="$emit('reloadlist')"/>
          </tr>
      </tbody>
    </table>
</template>

<script>
import addNoteForm from "./AddNoteForm.vue";
import nodeListRow from "./NoteListRow.vue";
import thTable from "./table/ThTable.vue";
import noteListColumn from "./NoteListColumn.vue";

export default {
  props: ["notes"],

  methods: {
    urgentNotesCounter() {
      length = this.notes.filter(n=>(n.urgent && !n.done)).length;
      return length;
    },

    notesCounter(isUrgent) {
      length = this.notes.filter(n=>((n.urgent == isUrgent)  && !n.done)).length;
      return length;
    }
  },

  components: {
    addNoteForm,
    nodeListRow,
    thTable,
    noteListColumn,
  },
};
</script>

<style scoped>
  .tbl {
    @apply border;
  }
  .tr {
    @apply bg-gray-50 border-b;
  }
  .td {
    @apply border-r py-5;
  }
  .ul {
    @apply list-disc my-5;
  }
  .li {
    @apply ml-7 mr-7;
  }
</style>