<template>
  <Layout title="Авторы">
    <authorList />
  </Layout>
</template>

<script>
import Layout from '@/components/Layout/Layout';
import authorList from '@/components/authorList/authorList';

export default {
  name: 'authorsPage',
  components: {
    Layout,
    authorList,
  }
}
</script>