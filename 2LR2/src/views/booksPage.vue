<template>
  <Layout title="Книги">
    <bookList :author_id="author_id"/>
  </Layout>
</template>

<script>
import Layout from '@/components/Layout/Layout';
import bookList from '@/components/bookList/bookList';

export default {
  name: 'booksPage',
  components: {
    Layout,
    bookList,
  },
  props: {
    author_id: Number,
  }
}
</script>