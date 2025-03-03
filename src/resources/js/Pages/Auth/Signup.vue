<script setup>
import { Head } from '@inertiajs/vue3'
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

defineProps({
	errors: Object,
})

const form = reactive({
  name: null,
  email: null,
  password: null,
  password_confirmation: null,
})

function submit() {
  router.post('/register', form)
}
</script>

<template>
    <Head title="Sign Up" />
    <h1>Sign Up</h1>
    <form @submit.prevent="submit">
    	<div>
		    <label for="name">Name:</label>
		    <input id="name" v-model="form.name" />
		    <div v-if="errors.name">{{ errors.name }}</div>
    	</div>
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
    	<div>
		    <label for="password_confirmation">Confirm password:</label>
		    <input id="password_confirmation" v-model="form.password_confirmation" />
    	</div>
	    <button type="submit">Submit</button>
	</form>
</template>