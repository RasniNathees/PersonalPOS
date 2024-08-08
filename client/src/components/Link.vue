<template>
  <div class="text-sm font-bold hover:text-sky-600 transition-colors delay-100">
    <RouterLink :to="{ name: props.routeName }">{{ props.linkText }}</RouterLink>
  </div>
</template>
<script setup lang="ts">
import { RouterLink } from 'vue-router'
import { defineProps } from 'vue'

const props = defineProps({
  linkText: {
    type: String,
    required: true
  },
  routeName: {
    type: String,
    required: true
  }
})
</script>
