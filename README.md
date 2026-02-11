# 🏢 CRUD de Empleados – Patito S.A. de C.V.

## 📌 Descripción del Proyecto

La empresa **Patito S.A. de C.V.**, con más de 10 años de operación y presencia en múltiples sucursales a nivel nacional, enfrenta dificultades en la gestión de la información de su personal debido a la falta de una base de datos centralizada.

Este proyecto desarrolla un sistema web que permite administrar la información de empleados de forma segura, centralizada y eficiente, garantizando control de acceso y trazabilidad mediante autenticación de usuarios.

---
## DFD N1
Se incluye un diagrama de flujo conceptual de nivel 1 para representar la interacción entre actores, procesos y almacenamiento de datos.

<img width="578" height="561" alt="image" src="https://github.com/user-attachments/assets/9bb772d2-cfa1-4350-83c2-16025e0e0cf9" />


---
Este sistema permite:

- Registro e inicio de sesión de usuarios
- Crear, listar, editar y eliminar empleados (CRUD)
- Asociación de cada empleado a un usuario autenticado
- Protección de rutas mediante autenticación
- Validación de datos en backend
- Manejo de estado activo/inactivo mediante campo booleano

Cada usuario únicamente puede visualizar y administrar sus propios empleados.

## Nota HTTPS
El sistema fue desarrollado y probado en entorno local utilizando 
`http://127.0.0.1:8000`, por lo que no se configuró HTTPS debido a que se trata de un ambiente de desarrollo.

En un entorno de producción, se recomienda implementar HTTPS mediante un certificado SSL para garantizar la confidencialidad e integridad de los datos transmitidos.

Tecnologías utilizadas

- Laravel 10+
- Vue 3
- InertiaJS
- Axios
- MariaDB / MySQL
- TailwindCSS
- Node.js
- Composer
  
## 🗄 Base de Datos
### Tabla: users
- id
- name
- email
- password
- status (activo/inactivo)
- fecha último inicio de sesión
- timestamps

### Tabla: employees
- id
- user_id (FK)
- nombre
- telefono
- email
- calle
- numero
- colonia
- codigo_postal
- ciudad
- estado
- pais
- area
- puesto
- fecha_ingreso
- status (boolean)
- timestamps

---

## 🔐 Seguridad

- Rutas protegidas con middleware `auth`
- Validación de formularios en backend
- Relación segura entre usuario y empleados
- Control de acceso para edición y eliminación
- Contraseñas encriptadas automáticamente por Laravel

---

## 🚀 Instalación
Clonar el repositorio:
```bash
git clone https://github.com/vanessa541/patito.git
cd patito

Instalar dependencias PHP:
composer install
Instalar dependencias Node:
npm install

Copiar archivo de entorno:
cp .env.example .env
Configurar credenciales de base de datos en .env

Generar clave de aplicación:
php artisan key:generate

Ejecutar migraciones:
php artisan migrate

▶️ Ejecutar el proyecto
En una terminal:
php artisan serve
En otra terminal:
npm run dev

Abrir en el navegador:
http://127.0.0.1:8000
```

📌 Funcionalidades implementadas
- Registro de usuario
- Inicio de sesión (login)
- CRUD completo de empleados
  - Crear empleados
  - Listar empleados
  - Editar empleados
  - Eliminar empleados
  - Confirmación antes de eliminar registros
- Asociación empleado-usuario (relación 1:N)
- Protección de rutas mediante autenticación
- Validación de datos en backend

## 🌐 Rutas del Sistema

### 🔐 Autenticación (Laravel Breeze)

- Registro de usuario  
  `GET /register`

- Inicio de sesión  
  `GET /login`

- Cierre de sesión  
  `POST /logout`

- Dashboard (requiere autenticación)  
  `GET /dashboard`

---

### 👥 Gestión de Empleados (protegidas con middleware auth)

- Listar empleados  
  `GET /employees`

- Formulario para crear empleado  
  `GET /employees/create`

- Guardar nuevo empleado  
  `POST /employees`

- Formulario para editar empleado  
  `GET /employees/{id}/edit`

- Actualizar empleado  
  `PUT /employees/{id}`

- Eliminar empleado  
  `DELETE /employees/{id}`


