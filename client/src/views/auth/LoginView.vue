<template>
  <GuestLayout class="flex justify-center items-center">
    <Form>
      <div class="mt-24 mb-18 text-center">
        <h1 class="text-3xl font-bold mb-2 text-white">Login</h1>
        <h3 class="text-md italic tracking-tight text-white/80">
          The best experiences are just a click away. Let’s get you logged in
        </h3>
      </div>

      <div class="space-y-6 mt-6">
        <BaseInputGroup labelFor="email" name="email" type="email" v-model="formData.email" />
        <BaseInputGroup
          labelFor="password"
          name="password"
          type="password"
          v-model="formData.password"
        />
      </div>
      <div class="text-white flex justify-between flex-1 px-6 sm:px-0">
        <BaseCheckbox label="Remember Me" v-model="formData.rememberMe" />
        <Link linkText="Forgot Password" routeName="Forgot Password" />
      </div>

      <div class="flex justify-center">
        <BaseFormButton buttonType="button" @click="login">Login</BaseFormButton>
      </div>
    </Form>
  </GuestLayout>
</template>

<script setup lang="ts">
// GUI
import GuestLayout from '@/components/layout/GuestLayout.vue'
import Form from '@/components/form/Form.vue'
import BaseInputGroup from '@/components/form/BaseInputGroup.vue'
import BaseFormButton from '@/components/form/BaseFormButton.vue'
import BaseCheckbox from '@/components/form/BaseCheckbox.vue'
import Link from '@/components/Link.vue'

import { reactive, onMounted, computed } from 'vue'
import { useAuthStore } from '@/stores/auth'
import { useRouter } from 'vue-router'

// types
import type { Icredentials } from '@/types/Credentials'

import { useForm } from 'vee-validate'
import * as yup from 'yup'

const formData = reactive<Icredentials>({
  email: '',
  password: '',
  rememberMe: false
})

const schema = yup.object({
  email: yup.string().email('Invalid email').required('Email is required'),
  password: yup.string().required('Password is required')
})
const { handleSubmit } = useForm({
  validationSchema: schema
})
const auth = useAuthStore()
const router = useRouter()

const login = handleSubmit(async (): Promise<void> => {
  await auth.login(formData)
  const isAuthenticated = auth.getIsAuthenticated()
  if (isAuthenticated) {
    router.push({ name: 'Dashboard' })
  }
})

onMounted(() => {
  const isAuthenticated = computed(() => auth.getIsAuthenticated())
  if (isAuthenticated) {
    router.push({ name: 'Dashboard' })
  }
})
</script>
