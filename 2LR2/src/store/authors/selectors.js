export const fetchItems = ( store ) => {
    const { dispatch } = store;
    dispatch('authors/fetchItems');
};

export const selectItems = ( store ) => {
    const { getters } = store;
    return getters['authors/items']
}

export const removeItem = ( store, id ) => {
    const { dispatch } = store;
    dispatch('authors/removeItem', id);
}

export const addItem = ( store, { name } ) => {
    const { dispatch } = store;
    dispatch('authors/addItem', { name });
}

export const updateItem = ( store, { id, name }) => {
    const { dispatch } = store;
    dispatch('authors/updateItem', { id, name });
}

export const selectItemById = (store, id) => {
    const { getters } = store;
    return getters['authors/itemsByKey'][id] || {};
}