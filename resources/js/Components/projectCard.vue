<template>
  <div class="group bg-white dark:bg-gray-800 shadow-lg rounded p-1 w-3xl">
    <div class="relative">
      <slot name="image"></slot>
    </div>
    <div class="p-2">
      <slot />
    </div>
  </div>
</template>