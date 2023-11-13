# **TP - 3**

## Integrantes (Comision de los Viernes):
- **Gil Eitan Steven** - EitanSteven2002@hotmail.com
- **Palavecino, Mariana Ayelen** – marianapalavecino5@gmail.com

## Documentacion de los endpoints de la API

A continuacion se explicara la funcionalidad de los endpoints de la API de libros y autores, divididos por los 4 verbos en orden: GET, POST, UPDATE, y DELETE.

## GET:

- Web2Tp/api/libros
- Web2Tp/api/autores

Traen todos los libros y autores de la base de datos.

- Web2Tp/api/libro/ID
- Web2Tp/api/autor/ID

Siendo "ID", un parametro numerico de indice que traera un solo elemento.

- Web2Tp/api/libros/ID

Como ultimo GET, este traera todos los libros del autor deseado, siendo "ID", el id del autor del que se quiere traer los libros.

## POST:

- Web2Tp/api/libros
- Web2Tp/api/autores

Para realizar una insercion, en el body se debe enviar un objeto como los siguientes respectivamente:

{
    "Titulo": "Nuevo Libro POST API",
    "Genero": "Indefinid0",
    "ID_Autor": "1",
    "Stock": 0
}

Siendo en los libros, "Stock", un valor booleano diferenciado con 0 y 1 para saber si hay o no Stock de dicho libro.

{
    "Nombre_Autor": "Nombre del Autor",
    "Nacionalidad": "Nacionalidad del Autor",
    "Biografia": "Breve biografia del autor",
    "Estado": 1
}

Similar a los libros, en los autores, "Estado", es el valor booleano define si el autor permanece con vida en la actualidad o no.

## PUT:

- Web2Tp/api/libro/ID
- Web2Tp/api/autor/ID

Este edpoint espera que se le pase como ID, el autor o el libro que se desea editar, cambiando automaticamente el Stock o Estado por el contrario.

## DELETE:

- Web2Tp/api/libro/ID
- Web2Tp/api/autor/ID

Por ultimo, estos endpoints esperan el ID del libro o autor que se desea eliminar, cabe aclarar, que eliminar un autor eliminara todos sus libros.

## Temática: Librería y Autores

La temática elegida tiene como propósito establecer una categorización de libros para una pequeña tienda, con el fin de agilizar y mejorar la búsqueda de estos, al mismo tiempo que facilita el seguimiento de su inventario, reemplazando un proceso previo basado únicamente en registros en papel.

### **A continuación, definiríamos las relaciones entre estas entidades:**

- Un Autor puede escribir varios libros. Esto presenta una relación de "uno a muchos" (1-N).

![DiagramaER.png](DiagramaER.png)


