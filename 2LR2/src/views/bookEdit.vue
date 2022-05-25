<template>
  <Layout :title="id ? 'Редактирование записи' : 'Создание записи'">
    <bookForm @submit="onSubmit" :id="id"  />
  </Layout>
</template>

<script>
import { useStore } from 'vuex';

import { updateItem, addItem } from '@/store/books/selectors';
import bookForm from '@/components/bookForm/bookForm';
import Layout from '@/components/Layout/Layout';

export default {
  name: 'bookEdit',
  props: {
    id: String,
  },
  components: {
    Layout,
    bookForm,
  },
  setup() {
    const store = useStore();
    return {
      onSubmit: ({ id, name, description, price, author }) => id ?
          updateItem(store, { id, name, author, description, price }) :
          addItem(store, { name, author, description, price  } )
    }
  }

}
</script>
