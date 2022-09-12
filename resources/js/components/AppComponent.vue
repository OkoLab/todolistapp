<template>
        <div>          
            <note-list-table
                :notes="notes"
                v-on:reloadlist="getList()"
                />
        </div>
</template>

<script>
    import noteListTable from "./include/NoteListTable.vue"

    export default {
        components: {
            noteListTable,
        },
        
        data: function () {
            return {
                notes: []
            }
        },

        methods: {
            getList() {
                axios.get('api/notes')
                .then( response => {
                    this.notes = response.data;
                })
                .catch ( error => {
                    console.log( error );
                })
            }
        },

        created() {
            this.getList();
        }
    }
</script>

<style>
    .btn {
        @apply text-white font-bold py-2 px-4 rounded mx-4 mt-3;
    }
</style>
