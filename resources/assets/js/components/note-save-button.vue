<template>
    <div class="field">
        <p class="control">
            <button class="button is-primary" @click.prevent="storeNote" :class="{'is-loading' : isLoading}">Store note</button>
        </p>
    </div>
</template>

<script>
    export default {
        props: ['note-data'],
        data() {
            return {
                isLoading: false
            };
        },
        methods: {
            startLoading() {
                this.$Progress.start();
                this.isLoading = true;
            },
            stopLoading () {
                this.$Progress.fail();
                this.isLoading = false;
            },
            storeNote () {
                this.startLoading();
                let vt = this;
                axios.post('/store', vt.noteData)
                    .then(function (response) {
                        vt.$emit('got-response', response.data);
                        vt.$Progress.finish();
                    })
                    .catch(function (error) {
                        vt.$emit('error', error.response.data);
                        vt.stopLoading();
                    });
            }
        }
    }
</script>
