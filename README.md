# Proyecto PHP
---

**Objetivo:**
Se debe realizar un sitio de productos que se administre desde un backend. Se utiliza HTML5, CSS, PHP, javaScript, MySQL.

**Características Frontend:**

El sitio web debe tener las siguientes funcionalidades
* **Home.**

Página principal del sitio, en donde se mostrarán en forma aleatorios 6
productos de los 10 mejor ranqueados o aquellos que fueron indicados como
destacados.

* **Listado de productos.**
Página donde se muestra el listado de los productos, los cuales pueden estar
catalogados por categorías, subcategorías y marcas.
Al tener la opción de categorías y subcategorías se debe poder ver un menú con
las categorías principales y al seleccionarlas se van viendo las subcategorías. Al mismo
tiempo que se va cambiando entre categorías se debe actualizar el listado de
productos basados en las categorías, mostrando primero los destacados y luego los
demás.
También se debe tener la opción de elegir el método de ordenamiento de los
productos, dichos ordenamientos pueden ser:

  * Destacados
  * Ranqueados: Mayor a menor
   * A->Z
   * Z->A
No se podrán mostrar los productos que estén inactivos o la marca y categoría
también lo estén.

* Detalle del producto
Página donde se puede ver la descripción de los productos. Los productos
deben tener como base el nombre, descripción, marca, modelo, ranqueo (promedio de
los ranqueos de los comentarios).
Se tiene que tener la opción de poner comentarios, para lo cual se deben poner
un email, descripción, y ranquear el producto entre 1 y 5. Cuando el comentario es
ingresado no debe publicarse a primera sino que debe ser aprobado primero, tampoco
se puede poner con la misma IP de origen más de 1 comentario por día. Cuando se
agrega el comentario se informa por mail que su comentario será revisado.

* Contáctenos
Formulario por el cual una persona se pone en contacto con los
administradores de la página.
Este formulario debe tener las siguientes opciones:
  * Nombre y apellido
  * Email
  * Teléfono
  * Área de la empresa a quien se quiere mandar la consulta.
  * Comentario
---
**Características Backend**
El backend debe tener las siguientes funcionalidades

* Logueo por usuario
Los usuarios deben poder loguearse al sistemas por medio de un email y
contraseña.

* Sistema de perfil de usuarios
Al dar de alta un usuario se deben indicar el perfil del mismo. Para los perfiles
se debe tener un ABM de alta de perfil y en el mismo se selecciona a que secciones del
Backend puede tener de acceso.

* Sección de comentarios
En esta sección deben aparecer todos los comentarios que deben ser
aprobados, se debe mostrar el comentario, el ranqueo, fecha y el producto al cual fue
realizado. Dando la opción de activarlo. Se debe poder tener la opción de filtrar los
activos y los inactivos.

* Sección productos
Esta sección debe mostrar una tabla con los productos y tener la opción de
filtrarlos por la categoría y subcategoría. Desde esta tabla se deben tener las siguientes
opciones

  * Modificar
  * Activar/Inactivar un producto
  * Acceder a los comentarios de este producto.
También se debe tener la opción de acceder al alta de un producto nuevo
cargando los datos necesarios para el producto.

* Sección categorías

Esta sección debe mostrar una tabla con las categorías principales y se debe
tener las siguientes acciones
  * Modificar
  * Activar/ Inactivar
  * Acceder a los subcategorías, lo cual será como el listado de categorías
    principales.
También se debe tener la opción de acceder al alta de las categorías nuevas
cargando el nombre de la categoría y si es una subcategoría cual es la padre.

* Sección Marcas
Esta sección debe mostrar una tabla con las marcas y se debe tener las
siguientes acciones
  * Modificar
  * Activar/ Inactivar
 
 También se debe tener la opción de acceder al alta de las marcas nuevas
cargando el nombre de la misma.


