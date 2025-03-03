<script setup>
import { Head } from '@inertiajs/vue3'
import { reactive, useTemplateRef } from 'vue'
import { router, useForm } from '@inertiajs/vue3'

defineProps({ data: Object, errors: Object })

const dialog = useTemplateRef('dialog')

const form = useForm({
	inn: null,
})

function submit() {
	form.post('/counterparties', {
		onSuccess: () => {
			closeModal()
			form.reset()
		}
	})
}

function closeModal() {
	dialog.value.close()
}

</script>

<template>
    <Head title="Counterparties" />
    
    <template v-if="data.data.length">
    	<button @click="dialog.showModal()">Добавить</button>
	    <h1>Добавленные контрагенты</h1>
	    <table>
	    	<tr>
	    		<th>ИНН</th>
	    		<th>Наименование</th>
	    		<th>ОГРН</th>
	    		<th>Адрес</th>
	    	</tr>
	    	<tr v-for="item in data.data">
	    		<td>{{ item.inn }}</td>
	    		<td>{{ item.name }}</td>
	    		<td>{{ item.ogrn }}</td>
	    		<td>{{ item.address }}</td>
	    	</tr>
	    </table>
    </template>
    
    <template v-else>
    	<h1>Контрагенты еще не добавлены</h1>
    	<h2>Добавьте первого контрагента</h2>
    	<button @click="dialog.showModal()">Добавить</button>
    </template>

    <dialog ref="dialog">
    	<form @submit.prevent="submit">
	    	<button type="button" autofocus @click="closeModal()">X</button>
	    	<h2>Добавление контрагента</h2>
	    	<h3>Введите ИНН, чтобы добавить контрагента</h3>
	    	<div>
		    	<input name="inn" v-model="form.inn" placeholder="ИНН">
			    <div v-if="errors.inn">{{ errors.inn }}</div>
	    	</div>
	    	<h3>После нажатия на кнопку «Добавить», данные автоматически подгрузятся в таблицу</h3>
	    	<button type="submit">Добавить</button>
    	</form>
    </dialog>
</template>