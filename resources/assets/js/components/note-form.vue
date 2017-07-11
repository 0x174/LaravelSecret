<template>
	<form>
		<div class="columns">
			<div class="column is-three-quarters">
				<note-textbox v-model="note.note"></note-textbox>
			</div>
			<div class="column">
				<note-email v-model="note.email"></note-email>
				<note-save-button @got-response="notify" @error="displayError" :note-data="note"></note-save-button>
			</div>
		</div>
	</form>
</template>

<script>
	import noteSave from './note-save-button.vue';
	import noteTextbox from './note-textbox.vue';
	import noteEmail from './note-email.vue';

	export default {
		components: {
			'note-save-button': noteSave,
			'note-textbox': noteTextbox,
			'note-email': noteEmail
		},
		data() {
			return {
				note: {
					note: '',
					email: ''
				}
			}
		},
		methods: {
			notify(response) {
				this.$emit('link-generated', response);
			},
			displayError(errorMessages) {
				this.$notify({
					type: 'error',
			  		title: 'Uhm, something went wrong..',
			  		text: errorMessages[Object.keys(errorMessages)[0]][0]
				});
			}
		}
	}
</script>