<script setup>
import Layout from './Layout.vue'
import { router, Link } from '@inertiajs/vue3'
import { Button } from '@/components/ui/button'
import {
  FormControl,
  FormField,
  FormItem,
  FormLabel,
  FormDescription,
  FormMessage,
} from '@/components/ui/form'
import { Input } from '@/components/ui/input'
import { useForm } from 'vee-validate'
import { toTypedSchema } from '@vee-validate/zod'
import * as z from 'zod'

const formSchema = toTypedSchema(z.object({
	name: z.string(),
  email: z.string().email(),
  password: z.string(),
  password_confirmation: z.string(),
}))

defineProps({ errors: Object })

const form = useForm({
  validationSchema: formSchema,
})

const onSubmit = form.handleSubmit((values) => {
  router.post('/register', values)
})
</script>

<template>
	<Layout>
		<template #header><h1 class="mt-2">Регистрация</h1></template>

    <form @submit.prevent="onSubmit">
    	<div class="w-full mt-4">
        <FormField v-slot="{ componentField }" name="name">
          <FormItem>
            <FormLabel>Email</FormLabel>
            <FormControl>
              <Input placeholder="name" v-bind="componentField"></Input>
            </FormControl>
            <!-- todo: Записывать ошибки, возвращенные по api тоже в FormMessage -->
            <FormDescription v-if="errors.name">{{ errors.name }}</FormDescription>
            <FormMessage/>
          </FormItem>
        </FormField>
      </div>
      <div class="w-full mt-4">
        <FormField v-slot="{ componentField }" name="email">
          <FormItem>
            <FormLabel>Email</FormLabel>
            <FormControl>
              <Input placeholder="example@einzelwerk.ru" v-bind="componentField"></Input>
            </FormControl>
            <!-- todo: Записывать ошибки, возвращенные по api тоже в FormMessage -->
            <FormDescription v-if="errors.email">{{ errors.email }}</FormDescription>
            <FormMessage/>
          </FormItem>
        </FormField>
      </div>
      <div class="w-full mt-4">
        <FormField v-slot="{ componentField }" name="password">
          <FormItem>
            <FormLabel>Пароль</FormLabel>
            <FormControl>
              <Input type="password" placeholder="*****" v-bind="componentField"></Input>
            </FormControl>
            <!-- todo: Записывать ошибки, возвращенные по api тоже в FormMessage -->
            <FormDescription v-if="errors.password">{{ errors.password }}</FormDescription>
            <FormMessage/>
          </FormItem>
        </FormField>
      </div>
      <div class="w-full mt-4">
        <FormField v-slot="{ componentField }" name="password_confirmation">
          <FormItem>
            <FormLabel>Повторите пароль</FormLabel>
            <FormControl>
              <Input type="password" placeholder="*****" v-bind="componentField"></Input>
            </FormControl>
            <FormMessage/>
          </FormItem>
        </FormField>
      </div>
      <Button type="submit" class="w-full mt-4">Создать аккаунт</Button>
   </form>

   <template #footer>
     Уже есть аккаунт? <Link href="/login" class="underline">Войти</Link>
   </template>
  </Layout>
</template>