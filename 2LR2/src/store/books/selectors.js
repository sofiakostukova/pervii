export const fetchItems = (store) => {
    const { dispatch } = store;
    dispatch('books/fetchItems');
};

export const fetchFilteredItems = ( store ) => {
    const { dispatch } = store;
    dispatch('books/fetchFilteredItems');
};

export const selectFilteredItems = ( store, author_id = 0 ) => {
    const { getters } = store;
    return  getters['books/items'];
}

export const selectItems = (store) => {
    const { getters } = store;
    return getters['books/items']
}

export const removeItem = (store, id) => {
    const { dispatch } = store;
    dispatch('books/removeItem', id);
}

export const addItem = (store, { name, author, description, price }) => {
    const { dispatch } = store;
    dispatch('books/addItem', { name, author, description, price });
}

export const updateItem = (store, { id, name, author, description, price }) => {
    const { dispatch } = store;
    dispatch('books/updateItem', { id, name, author, description, price });
}

export const selectItemById = (store, id) => {
    const { getters } = store;
    return getters['books/itemsByKey'][id] || {};
}