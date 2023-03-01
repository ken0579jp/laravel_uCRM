<script setup>
  import { reactive } from 'vue'
  import { Inertia } from '@inertiajs/inertia'

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
    <input type="text" name="title" v-model="form.title"><br>
    <div v-if="errors.title">{{ errors.title }}</div>
    <input type="text" name="content" v-model="form.content"><br>
    <div v-if="errors.content">{{ errors.content }}</div>
    <button>送信</button>
  </form>

</template>

<!-- <script setup>
  import { ref } from 'vue'
  import { Link } from '@inertiajs/vue3'

  defineProps({
    errors: Object
  })

  const title = ref('')
  const content = ref('')


</script>

<template>

    <input type="text" name="title" v-model="title"><br>
    <div class="text-red-400" v-if="errors.title">{{ errors.title }}</div>
    <input type="text" name="content" v-model="content"><br>
    <div class="text-red-400" v-if="errors.content">{{ errors.content }}</div>
    <Link as="button" method="POST" :href="route('inertia.store')"
  :data="{
    title: title,
    content: content
  }"
  >DB保存テスト</Link>

</template> -->


