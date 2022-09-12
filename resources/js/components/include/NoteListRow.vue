<template>
  <div @mouseover="selectItem(note)" @mouseleave="unSelectItem()">
    <span :class="[note.done ? 'completed' : '']">{{ note.name }}</span>
    <div v-if="note === selectedNote">
    <!-- //TODO 1 multi language support -->
    <!-- //TODO 2 buttons design -->
    <!-- //TODO 2 multi display size support -->
        <button @click="setDone" class="done btn">
            <span v-if="note.done == true">Undone</span>            
            <span v-if="note.done == false">Done</span>
        </button>
        <button @click="setUrgent" class="urgent btn">
            <span v-if="note.urgent == true">Not urgent</span>            
            <span v-if="note.urgent == false">Urgent</span>
        </button>
        <button @click="removeNote" class="remove btn">
            Remove
        </button>
    </div>
  </div>
</template>

<script>
    export default {
        props: ["note"],

        data: function () {
            return {
                selectedNote: false,
            }
        },

        methods: {
            selectItem(note) {
                this.selectedNote = note;
            },
            unSelectItem() {
                this.selectedNote = false;
            },

            setDone() {
                axios.put('api/note/' + this.note.id + '/done')
                .then( response => {
                    if( response.status == 200 ) {
                        this.$emit('reloadlist');
                    }
                })
                .catch( error => {
                    console.log( error);
                })

            },

            setUrgent() {
                axios.put('api/note/' + this.note.id + "/urgent", {
                    note: this.note
                })
                .then( response => {
                    if( response.status == 200 ) {
                        this.$emit('reloadlist');
                    }
                })
                .catch( error => {
                    console.log( error);
                })

            },

            removeNote() {
                axios.delete('api/note/' + this.note.id)
                .then( response => {
                    if( response.status == 200 ) {
                        this.$emit('reloadlist');
                    }
                })
                .catch ( error => {
                    console.log( error );
                })
            }
        },
    };
</script>

<style scoped>
    .completed {
        text-decoration: line-through;
    }

    .done {
        @apply bg-green-500 hover:bg-green-700;
    }

    .urgent {
        @apply bg-blue-500 hover:bg-blue-700;
    }

    .remove {
        @apply bg-red-500 hover:bg-red-700;
    }
</style>