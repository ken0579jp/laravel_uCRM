<!-- <script setup>
  import { reactive } from 'vue'
  import { Inertia } from '@inertiajs/inertia'

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
    <input type="text" name="title" v-model="form.title"><br>
    <input type="text" name="content" v-model="form.content">
    <button>送信</button>
  </form>

</template> -->

<script setup>
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'

const form = reactive({
title: null,
content: null })

const submitFunction = () => { 
  Inertia.post('/inertia', form)
}
</script>

<template>
<form @submit.prevent="submitFunction">
<input type="text" name="title" v-model="form.title"><br>
<input type="text" name="content" v-model="form.content"> 
<button>送信</button>
</form> 
</template>