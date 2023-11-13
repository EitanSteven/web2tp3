# **TP - 3**

## Integrantes (Comision de los Viernes):
- **Gil Eitan Steven** - EitanSteven2002@hotmail.com
- **Palavecino, Mariana Ayelen** – marianapalavecino5@gmail.com (No participó, se bajó de la materia).

## Documentacion de los endpoints de la API

A continuacion se explicara la funcionalidad de los endpoints de la API de libros y autores, divididos por los 4 verbos en orden: GET, POST, UPDATE, y DELETE.

## GET:

- Web2tp3/api/libros
- Web2tp3/api/autores

Traen todos los libros y autores de la base de datos.

- Web2tp3/api/libro/ID
- Web2tp3/api/autor/ID

Siendo "ID", un parametro numerico de indice que traera un solo elemento.

- Web2tp3/api/libros/ID

Este traera todos los libros del autor deseado, siendo "ID", el id del autor del que se quiere traer los libros.

- Web2tp33/api/autores&order=ORDER
- Web2tp33/api/autores&order=ORDER&sort=SORT

- Web2tp33/api/libros&order=ORDER
- Web2tp33/api/libros&order=ORDER&sort=SORT

Estos GETS, tanto para libros como autores, pueden ir con unas variables adicionales opcionales, siendo ORDER, uno de los campos por los cuales ordenar, como el Nombre_Autor, y si usas ORDER, puedes utilizar SORT, que puede recibir como variable valida "ASC", lo que traera los resultados de forma ascendente, o "DESC", que los traera de forma descendente.

## POST:

- Web2tp3/api/libros
- Web2tp3/api/autores

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

NOTA: Las Keys de los objetos deben escribirse exactamente asi.

Similar a los libros, en los autores, "Estado", es el valor booleano define si el autor permanece con vida en la actualidad o no.

## PUT:

- Web2tp3/api/libro/ID
- Web2tp3/api/autor/ID

Este edpoint espera que se le pase como ID, el autor o el libro que se desea editar, cambiando automaticamente el Stock o Estado por el contrario.

## DELETE:

- Web2tp3/api/libro/ID
- Web2tp3/api/autor/ID

Por ultimo, estos endpoints esperan el ID del libro o autor que se desea eliminar, cabe aclarar, que eliminar un autor eliminara todos sus libros.

## Temática: Librería y Autores

La temática elegida tiene como propósito establecer una categorización de libros para una pequeña tienda, con el fin de agilizar y mejorar la búsqueda de estos, al mismo tiempo que facilita el seguimiento de su inventario, reemplazando un proceso previo basado únicamente en registros en papel.

### **A continuación, definiríamos las relaciones entre estas entidades:**

- Un Autor puede escribir varios libros. Esto presenta una relación de "uno a muchos" (1-N).

![DiagramaER.png](DiagramaER.png)


