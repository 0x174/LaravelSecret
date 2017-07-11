<template>
    <div class="field">
      <label class="label">Notify when note is read (optional)</label>
      <p class="control has-icons-left">
        <input class="input" type="email" placeholder="Email" :value="value" @input="updateEmail($event.target.value)">
        <span class="icon is-small is-left">
          <i class="fa fa-envelope"></i>
        </span>
      </p>
    </div>
</template>

<script>
    export default {
        props: ['value'],
        methods: {
            updateEmail(email){
                this.$emit('input', email)
            }
        }
    }
</script>
