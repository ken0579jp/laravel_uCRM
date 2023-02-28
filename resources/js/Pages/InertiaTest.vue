<script setup>

  import { Link } from '@inertiajs/vue3';
  import { ref } from 'vue'

  defineProps({
   errors: Object,
   'blogs': Array
  })

  const newTitle = ref('');
  const newContent = ref('');

</script>

<template>
  Inertiaテストです。<br>
  <a href="/">aタグ経由です</a><br>
  <Link href="/">link経由です</Link><br>
  <Link :href="route('inertia.index')">名前付きルート経由です</Link><br>
  <Link :href="route('inertia.show', { id: 50 })">ルートパラメータのテストです</Link><br>

  <div class="mb-8"></div>

  <input type="text" name="newTitle" v-model="newTitle">{{ newTitle }}<br>
  <div v-if="errors.title">{{  errors.title }}</div><br>
  <input type="text" name="newContent" v-model="newContent">{{ newContent }}<br>
  <div v-if="errors.content">{{ errors.content }}</div>

  <Link as="button" method="POST" :href="route('inertia.store')"
  :data="{
    title: newTitle,
    content: newContent
  }"
  >DB保存テスト</Link>
  <div class="mb-8"></div>

  <div v-if="$page.props.flash.message" class="bg-blue-300">
  {{ $page.props.flash.message }}
 </div>
 <ul>
  <li v-for="blog in blogs" :key="blog.id">
  件名:<Link class="text-blue-400" :href="route('inertia.show', {id: blog.id})">{{ blog.title }}</Link>
  本文:{{ blog.content }}
  </li>
 </ul>

</template>


