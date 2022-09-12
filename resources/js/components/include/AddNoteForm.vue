<template>
    <input type="text" v-model="note.name" class="input" @keyup.enter="addNote()" required autofocus>
    <button @click="addNote()" class="btn" :disabled='!note.name' :class="[ note.name ? 'active' : 'inactive']" >Add note</button>
    <div v-if="name_errors" class="errors">
        <div v-for="(v, k) in name_errors" :key="k">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                note: {
                    name: ""
                },
                name_errors: "",
            }
        },
        methods: {
            addNote() {
                this.name_errors="";
                axios.post('api/note/store', {
                    note: this.note
                })
                .then( response => {
                    if( response.status === 201 ) {
                        this.note.name = "";
                        this.$emit('reloadlist');
                    }
                })
                .catch( e => {
                    if(e.response.status === 422)
                    {
                        this.name_errors = e.response.data.errors;
                    }
                })
            },
        }
    }
</script>

<style scoped>
    .active {
        background: #9c27b0;
    }

    .inactive {
        background: grey;
    }

    .input {
        @apply border rounded-lg py-2 mt-5 mb-5 mx-4 w-48 md:w-96 md:ml-4 md:mr-0 pl-2;
    }
    .errors {
        @apply bg-red-500 text-white py-2 px-4 pr-0 rounded font-bold mt-4 mb-4 shadow-lg;
    }
</style>
