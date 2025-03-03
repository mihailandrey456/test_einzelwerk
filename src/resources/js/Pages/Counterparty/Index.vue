<script setup>
import { reactive, useTemplateRef } from 'vue'
import { router, useForm } from '@inertiajs/vue3'
import { Button } from '@/components/ui/button'
import {
  Table,
  TableBody,
  TableCaption,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from '@/components/ui/table'
import { Input } from '@/components/ui/input'

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
    <template v-if="data.data.length">
    	<div class="m-10">
	    	<div class="flex justify-between">
				<p class="text-2xl">Добавленные контрагенты</p>
	      		<Button @click="dialog.showModal()" class="w-min">Добавить</Button>
	    	</div>
		    <Table class="border mt-4">
		    	<TableHeader>
		    		<TableRow>
		    			<TableHead>ИНН</TableHead>
		    			<TableHead>Наименование</TableHead>
		    			<TableHead>ОГРН</TableHead>
		    			<TableHead>Адрес</TableHead>
		    		</TableRow>
		    	</TableHeader>
		    	<TableBody>
		    		<TableRow v-for="item in data.data">
		    			<TableCell>{{ item.inn }}</TableCell>
		    			<TableCell>{{ item.name }}</TableCell>
		    			<TableCell>{{ item.ogrn }}</TableCell>
		    			<TableCell>{{ item.address }}</TableCell>
		    		</TableRow>
		    	</TableBody>
		    </Table>
    	</div>
    </template>
    
    <template v-else>
    	<div class="flex flex-col justify-center items-center text-center min-h-screen">
	    	<div>
				<p class="text-2xl">Контрагенты еще не добавлены</p>
	    	</div>
	    	<div>
		    	<p class="text-xl">Добавьте первого контрагента</p>
	    	</div>
	      	<Button @click="dialog.showModal()" class="mt-4 w-min">Добавить</Button>
    	</div>
    </template>

    <dialog ref="dialog">
    	<div class="m-3">
	    	<form @submit.prevent="submit" class="flex flex-col">
		    	<span class="self-end" autofocus @click="closeModal()">X</span>
				<p class="text-xl">Добавление контрагента</p>
				<p class="text-sm">Введите ИНН, чтобы добавить контрагента</p>
		    	<div class="mt-4">
		    		<Input placeholder="ИНН" name="inn" v-model="form.inn"></Input>
				    <div v-if="errors.inn">{{ errors.inn }}</div>
		    	</div>
				<p class="text-sm mt-4">После нажатия на кнопку «Добавить», данные автоматически подгрузятся в таблицу</p>
		      	<Button type="submit" class="mt-4 w-min self-end">Добавить</Button>
	    	</form>
    	</div>
    </dialog>
</template>