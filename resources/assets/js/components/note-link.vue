<template>
	<div class="field has-addons">
		<p class="control is-expanded">
			<input class="input" type="text" v-model="url">
		</p>
		<p class="control">
			<button class="button is-primary" v-clipboard="url" @success="copy='Copied!'" >
				<i class='fa fa-clone fa-fw'></i> {{ copy }}
			</button>
		</p>
	</div>
</template>

<script>
	export default {
		props: ['url'],
		data(){
			return {
				copy : 'Copy'
			}
		}
	}
</script>