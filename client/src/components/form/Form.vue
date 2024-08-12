<template>
  <div
    class="max-w-96 w-full border-top-tricolor mx-10 md:mx-0 max-h-full bg-black opacity-60 sm:p-8 lg:p-12 rounded-lg shadow-md"
  >
    <form @submit.prevent="" class="space-y-6">
      <slot></slot>
    </form>
  </div>
</template>
<style scoped>
.border-top-tricolor {
  border-top-width: 3px; /* Border height */
  border-top-style: solid;
  border-image: linear-gradient(to right, #01ffc4 0%, #a100ff 50%, #ff0051 100%);
  border-image-slice: 1;
}
</style>
