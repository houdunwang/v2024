<script setup lang="ts"></script>

<template>
  <main class="bg-gray-50 text-xs py-2 px-3 opacity-80 flex justify-between">
    <section>向军大叔作品</section>
    <section class="flex justify-between gap-2">
      <div class="link active">转码</div>
      <div class="link">配置</div>
    </section>
  </main>
</template>

<style lang="scss" scoped>
.link {
  @apply opacity-80;
  &.active {
    @apply opacity-90 font-bold;
  }
}
</style>
