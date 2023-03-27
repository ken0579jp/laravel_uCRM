<script setup>
  import { reactive } from 'vue';
  import { Inertia } from '@inertiajs/inertia';

  defineProps({
    errors: Object
  })

  const form = reactive({
    title: null,
    content: null,
  })
  
  const submitFunction = () => {
    Inertia.post('/inertia', form)
  }


</script>

<template>
  <form @submit.prevent="submitFunction">
    <input type="text" name="titile" v-model="form.title"><br>
    <div class="bg-300" v-if="errors.title">{{ errors.title }}</div>
    <input type="text" name="content" v-model="form.content"><br>
    <div v-if="errors.content">{{ errors.content }}</div>
    <button>送信</button>
  </form>  
</template>