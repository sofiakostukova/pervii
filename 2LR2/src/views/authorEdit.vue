<template>
  <Layout :title="id ? 'Редактирование записи' : 'Создание записи'">
    <authorForm
        :id="id"
        @submit="onSubmit"
    />
  </Layout>
</template>

<script>
import { useStore } from 'vuex';

import { updateItem, addItem } from '@/store/authors/selectors';
import Layout from '@/components/Layout/Layout';
import authorForm from '@/components/authorForm/authorForm';
export default {
  name: 'authorEdit',
  props: {
    id: String,
  },
  components: {
    Layout,
    authorForm,
  },
  setup() {
    const store = useStore();
    return {
      onSubmit: ({ id, author }) => id ?
          updateItem(store, { id, author }) :
          addItem(store, { author }),
    };
  }
}
</script>