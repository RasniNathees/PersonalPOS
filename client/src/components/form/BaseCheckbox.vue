<template>
  <div class="flex space-x-1 font-bold text-sm gap-2 flex-1 items-center">
    <input
      type="checkbox"
      :checked="modelValue"
      @input="$handelCheck"
      name=""
      id=""
      class="hover:cursor-pointer w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
    />
    <label>{{ props.label }}</label>
  </div>
</template>

<script setup lang="ts">
import { defineProps } from 'vue'

const props = defineProps({
  label: {
    type: String,
    default: ''
  },
  modelValue: {
    type: Boolean,
    default: false
  }
})

const emit = defineEmits(['update:modelValue'])
const $handelCheck = (event: Event) => {
  const input = event.target as HTMLInputElement
  emit('update:modelValue', input.checked)
}
</script>
