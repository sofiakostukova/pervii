import Api from "@/api";

class books extends Api {

    /**
     * Вернет список всех 
     * @returns {Promise<Response>}
     */
    books = () => this.rest('/books/list.json');
    booksFiltered = () => this.rest('/books/filtered-list.json');

    /**
     * Удалит товар по id
     * @param id
     * @returns {Promise<*>}
     */
    remove = ( id ) => this.rest('/books/delete-item', {
        method: 'POST',
        'Content-Type': 'application/json',
        body: JSON.stringify({ id }),
    }).then(() => id) // then - заглушка, пока метод ничего не возвращает

    /**
     * Создаст новую запись в таблице
     * @param book объект товара, взятый из Formbook
     * @returns {Promise<Response>}
     */
    add = ( book ) => this.rest('/books/add-item', {
        method: 'POST',
        'Content-Type': 'application/json',
        body: JSON.stringify(book),
    }).then(() => ({...book, id: new Date().getTime()})) // then - заглушка, пока метод ничего не возвращает

    /**
     * Отправит измененную запись
     * @param book объект товара, взятый из Formbook
     * @returns {Promise<*>}
     */
    update = ( book ) => this.rest('/books/update-item', {
        method: 'POST',
        'Content-Type': 'application/json',
        body: JSON.stringify(book),
    }).then(() => book) // then - заглушка, пока метод ничего не возвращает

}

export default new books();