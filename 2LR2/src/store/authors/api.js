import Api from "@/api";

class authors extends Api {

    /**
     * Вернет список всех 
     * @returns {Promise<Response>}
     */
    authors = () => this.rest('/authors/list.json');

    /**
     * Удалит поставщика по id
     * @param id
     * @returns {Promise<*>}
     */
    remove = ( id ) => this.rest('/authors/delete-item', {
        method: 'POST',
        'Content-Type': 'application/json',
        body: JSON.stringify({ id }),
    }).then(() => id) // then - заглушка, пока метод ничего не возвращает

    /**
     * Создаст новую запись в таблице
     * @param name объект поставщика, взятый из FormCity
     * @returns {Promise<Response>}
     */
    add = ( name ) => this.rest('authors/add-item', {
        method: 'POST',
        'Content-Type': 'application/json',
        body: JSON.stringify(name),
    }).then(() => ({...name, id: new Date().getTime()})) // then - заглушка, пока метод ничего не возвращает

    /**
     * Отправит измененную запись
     * @param name объект группы, взятый из Formauthor
     * @returns {Promise<*>}
     */
    update = ( name ) => this.rest('authors/update-item', {
        method: 'POST',
        'Content-Type': 'application/json',
        body: JSON.stringify(name),
    }).then(() => name) // then - заглушка, пока метод ничего не возвращает
}

export default new authors();
