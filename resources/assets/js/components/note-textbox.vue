<template>
    <div class="field">
        <label class="label">Note</label>
        <p class="control">
            <textarea class="textarea" placeholder="Your note" :value="value" @input="updateNote($event.target.value)"></textarea>
        </p>
    </div>
</template>

<script>
    export default {
        props: ['value'],
        methods: {
            updateNote(note){
                this.$emit('input', note)
            }
        }
    }
</script>
