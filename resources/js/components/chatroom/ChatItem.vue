<template>
	<!-- <div class="message" :class="{'is-current-user': $root.currentUserLogin.id === message.user.id}"> -->
	<div class="message is-current-user">
		<div class="message-item user-name">
			{{ messages.name}}
		</div>
		<div class="message-item timestamp">
			| {{ messages.created_at.split(' ')[1] }}:
		</div>
		<div class="message-item text-message">
			{{ messages.message }}
		</div>
	</div>
</template>

<script>
	export default {
        props: {
          messages: {
            type: Object,
            default: {}
          }
        }
	}
</script>

<style lang="scss" scoped>
	.message {
		display: flex;
		color: #00b8ff;
		.message-item:not(:last-child) {
			margin-right: 5px;
		}
	}
	.message:not(:last-child) {
		padding-bottom: 20px;
	}
	.is-current-user {
		color: #a900ff;
	}
</style>
