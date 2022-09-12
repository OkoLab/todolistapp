<template>
    <th class="th">
        <div>
            <span class="nowrap" v-if="isUrgent">urgent </span>
            <span class="nowrap">to do </span>
            <span class="nowrap" v-if="notesCounter > 0" :class="[ isUrgent && notesCounter>=3 ? 'urgent' : 'no_urgent']"> 
                ({{ notesCounter }})
            </span>
        </div>
    </th>
</template>

<script>
    export default {
        props: {
            notesCounter: Number,
            isUrgent: Boolean,
        },
    }
</script>

<style scoped>
    .urgent {
        color: red;
    }
    .no_urgent {
        color: black;
    }
    .th {
        @apply w-128 p-2 border-r text-sm text-gray-500;
    }
</style>