# book-searcher

Este es un servicio web en PHP que permite buscar libros por título o autor en un archivo `dataset.json`. La búsqueda se realiza con un texto exacto y la respuesta se proporciona en formato JSON, con dos arrays: uno de libros y otro de autores.

## Requisitos

Para que este servicio funcione correctamente, debes tener un archivo `dataset.json` en el mismo directorio que el archivo PHP (`webservice.php`).

### Ejemplo de archivo `dataset.json`:

```json
[
  {
    "titulo": "Titulo",
    "autor": "Nombre Apellido",
    "isbn": "1234567",
    "fecha_nov": "20160201",
    "portada": "http://image.jpg"
  },
  {
    "titulo": "Titulo",
    "autor": "Nombre Apellido",
    "isbn": "1234567",
    "fecha_nov": "20160201",
    "portada": "http://image.jpg"
  },
  {
    "titulo": "Titulo",
    "autor": "Nombre Apellido",
    "isbn": "1234567",
    "fecha_nov": "20160201",
    "portada": "http://image.jpg"
  }
]
```

## Parámetros de entrada

texto: El texto a buscar. Este parámetro se pasa a través de la URL como una cadena de texto

## Respuesta

La respuesta es un objeto JSON que contiene dos arrays:
libros: Los libros que coinciden con el texto de búsqueda en el campo titulo.
autores: Los autores que coinciden con el texto de búsqueda en el campo autor. Además, para cada autor, se incluye un array con los dos libros más recientes (según la fecha de publicación).

## Ejemplo de llamada

http://localhost/webservice.php?texto=Nombre%20Apellido
