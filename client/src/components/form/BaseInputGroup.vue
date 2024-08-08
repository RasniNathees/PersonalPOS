<template>
  <div class="flex flex-col text-white mx-5 md:mx-0 space-y-2 mb-4">
    <label :for="labelFor">
      {{ labelFor.toLocaleUpperCase() }}
    </label>
    <input
      :type="type"
      :name="name"
      @input="$updateInputVlaue"
      :value="modelValue"
      class="p-2 px-4 rounded-2xl bg-white/15 focus:outline-none focus:ring focus:border-blue-500"
    />
  </div>
</template>

<script setup lang="ts">
import { defineProps, defineOptions } from 'vue'

defineOptions({
  inheritAttrs: false
})

defineProps({
  labelFor: {
    type: String,
    required: true
  },
  name: {
    type: String,
    required: true
  },
  type: {
    type: String,
    default: 'text'
  },
  modelValue: {
    type: [String, Number],
    default: ''
  }
})

//set v-model for parent component
const emit = defineEmits(['update:modelValue'])
const $updateInputVlaue = (event: Event) => {
  const input = event.target as HTMLInputElement
  emit('update:modelValue', input.value)
}
</script>
