<template>
    <div>
        <notifications position="bottom right" />
        <vue-progress-bar></vue-progress-bar>
        <section class="section">
            <div class="container">
                <h1 class="title">
                    New note
                </h1>
                <h2 class="subtitle">
                    <div v-if="isFinished">Note link is ready, go share it with the world!</div>
                    <div v-else>Use the form below to enter your sensitive information and retrieve a URL</div>
                </h2>
                <note-form @link-generated="linkGenerated" v-if="! isFinished"></note-form>
                <div v-if="isFinished">
                    <note-link :url="link"></note-link>
                    Have another secret? <a @click="clear">click here to create a new one</a>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import noteForm from './components/note-form'
    import noteLink from './components/note-link'
    export default {
        components: {
            'note-form': noteForm,
            'note-link': noteLink
        },
        data(){
            return {
                isFinished: false,
                link: ''
            }
        },
        methods: {
            linkGenerated(event) {
              this.isFinished = true,
              this.link = event.url
            },
            clear() {
                this.isFinished = false
            }
        }
    }
</script>