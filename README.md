<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


#Artweb

Artweb es una aplicación web desarrollada con Laravel (backend) y Vue + Inertia (frontend).
El objetivo principal de este módulo es implementar un sistema de autenticación y un CRUD completo utilizando el patrón MVC, como base para una futura plataforma artística más completa.

# Link Video 

En el siguiente video se puede ver el funcionamiento general de la aplicación, incluyendo el login, el registro y el CRUD de intereses artísticos:

#https://youtu.be/BEMvlJ9Q9zQ

#Descripción del proyecto

Artweb busca ser una plataforma para artistas, usuarios y organizadores de eventos culturales.
En esta primera versión se implementa la base del proyecto:

Sistema de autenticación de usuarios (login, registro, logout).

 * Rutas protegidas: solo usuarios autenticados pueden acceder a ciertas secciones.

 * Perfil de usuario.

*  CRUD de "intereses artísticos".

* Aplicación del patrón MVC.

* Uso de Laravel como backend y Vue con Inertia como frontend SPA.

Este módulo será la base para futuras funcionalidades como galería de obras, estadísticas, recomendaciones personalizadas y gestión de eventos.

#Tecnologías utilizadas

Backend: Laravel 10
Frontend: Vue 3 + Inertia.js
Autenticación: Breeze
Estilos: Tailwind CSS (personalizados con paleta elegante)
Base de datos: MySQL / MariaDB
Patrón: MVC (Modelo - Vista - Controlador)

#Funcionalidades implementadas

* Autenticación

* Registro de usuario.

* Inicio de sesión.

* Cierre de sesión.

* Rutas protegidas mediante middleware.

* Redirección automática al login si no estás autenticado.

* CRUD de Intereses Artísticos

#Cada usuario puede guardar información como:

* Edad

* Estilo artístico

* Fandom favorito

* Nivel de artista

* Descripción personal

#Operaciones disponibles:

* Crear

* Ver

* Editar

* Eliminar

