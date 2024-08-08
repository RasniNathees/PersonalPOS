<template>
  <div class="p-2 text-white">
    <button
      :type="type"
      class="bg-gradient-to-r from-sky-500 to-purple-600 hover:from-emerald-500 hover:to-amber-500 transition-colors delay-300 px-6 py-2 rounded-lg"
    >
      <slot></slot>
    </button>
  </div>
</template>

<script setup lang="ts">
import { defineProps } from 'vue'

type buttonType = 'button' | 'submit' | 'reset'

defineProps({
  type: {
    type: String as () => buttonType,
    default: 'button'
  }
})
</script>
