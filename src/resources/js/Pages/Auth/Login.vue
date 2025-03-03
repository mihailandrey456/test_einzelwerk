<script setup>
import { Head } from '@inertiajs/vue3'
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

defineProps({ errors: Object })

const form = reactive({
  email: null,
  password: null
})

function submit() {
  router.post('/login', form)
}
</script>

<template>
    <Head title="Login" />
    <h1>Login</h1>
    <form @submit.prevent="submit">
    	<div>
		    <label for="email">Email:</label>
		    <input id="email" v-model="form.email" />
		    <div v-if="errors.email">{{ errors.email }}</div>
    	</div>
    	<div>
		    <label for="password">Password:</label>
		    <input id="password" v-model="form.password" />
		    <div v-if="errors.password">{{ errors.password }}</div>
    	</div>
	    <button type="submit">Submit</button>
	</form>
</template>