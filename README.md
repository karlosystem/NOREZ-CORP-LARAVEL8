# NOREZ CORP S.A.C. – Website Corporativo

<p align="center">
  <strong>Plataforma web corporativa desarrollada con Laravel 8</strong>
</p>

---

## 📌 Descripción del proyecto

**Norez Corp S.A.C.** es un sitio web corporativo desarrollado para una empresa especializada en publicidad exterior, publicidad gráfica, impresión y soluciones visuales para empresas y negocios.

La plataforma permite presentar los servicios de la empresa, mostrar proyectos realizados, comunicar información corporativa y facilitar el contacto con potenciales clientes a través de formularios y canales de comunicación digitales.

El proyecto cuenta con un panel administrativo que permite gestionar contenidos del sitio web, facilitando la actualización de información y la administración de diferentes secciones de la plataforma.

🌐 **Sitio web:** [https://norez-corp.com/](https://norez-corp.com/)

---

## 🚀 Tecnologías utilizadas

| Tecnología | Descripción |
|---|---|
| PHP | Lenguaje de programación backend |
| Laravel 8 | Framework de desarrollo web |
| MySQL | Sistema de gestión de base de datos |
| Blade | Motor de plantillas de Laravel |
| HTML5 | Estructura de páginas web |
| CSS3 | Diseño y estilos |
| JavaScript | Interactividad del frontend |
| Bootstrap | Framework de diseño web |
| Composer | Gestión de dependencias PHP |
| NPM | Gestión de dependencias frontend |
| Laravel Mix | Compilación de recursos frontend |
| Git | Control de versiones |

---

## ✨ Características principales

### 🌐 Sitio web público

- Página de inicio corporativa.
- Presentación de la empresa.
- Sección de proyectos y trabajos realizados.
- Catálogo de servicios publicitarios.
- Presentación de soluciones de publicidad exterior.
- Información corporativa.
- Formulario de contacto.
- Solicitud de cotizaciones.
- Presentación de clientes y referencias.
- Sección de noticias y contenidos informativos.
- Diseño adaptable a diferentes dispositivos.

### 🏢 Servicios presentados

Entre los servicios que ofrece la empresa a través de su plataforma:

- Paneles publicitarios en vía pública.
- Backing, displays y roll screen publicitarios.
- Módulos de venta y exhibición.
- Letreros luminosos publicitarios.
- Cajas luminosas para negocios.
- Letras corporativas publicitarias.
- Soluciones de publicidad gráfica y visual.

### ⚙️ Panel administrativo

El sistema incluye funcionalidades de administración de contenidos para facilitar el mantenimiento de información del sitio web.

- Gestión de contenidos.
- Administración de información corporativa.
- Gestión de elementos y contenidos relacionados con el sitio.
- Administración de información publicada.

---

## 🖥️ Capturas de pantalla

### Página de inicio

<!-- Agregar captura de pantalla de la página principal -->

### Servicios

<!-- Agregar captura de pantalla de la sección de servicios -->

### Panel administrativo

<!-- Agregar captura de pantalla del panel de administración -->

---

## 📂 Estructura del proyecto

El proyecto está organizado siguiendo la estructura de aplicaciones Laravel.

```text
NOREZ-CORP-LARAVEL8/
│
├── app/
│   ├── Http/
│   ├── Models/
│   └── ...
│
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
│   ├── views/
│   ├── css/
│   ├── js/
│   └── ...
│
├── routes/
├── storage/
├── tests/
│
├── artisan
├── composer.json
├── composer.lock
├── package.json
├── webpack.mix.js
└── README.md
```

---

## 🛠️ Requisitos de instalación

Para ejecutar el proyecto en un entorno local se recomienda disponer de:

- PHP compatible con Laravel 8.
- Composer.
- MySQL o MariaDB.
- Apache.
- Node.js y NPM.
- Git.

El proyecto puede ejecutarse en un entorno de desarrollo como XAMPP.

---

## ⚙️ Instalación y configuración

### 1. Clonar el repositorio

```bash
git clone https://github.com/karlosystem/NOREZ-CORP-LARAVEL8.git
```

### 2. Acceder al directorio

```bash
cd NOREZ-CORP-LARAVEL8
```

### 3. Instalar dependencias PHP

```bash
composer install
```

### 4. Configurar el archivo de entorno

Copiar el archivo de configuración de entorno:

```bash
cp .env.example .env
```

Configurar los parámetros de conexión a la base de datos en el archivo `.env`.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_base_datos
DB_USERNAME=usuario
DB_PASSWORD=contraseña
```

### 5. Generar la clave de aplicación

```bash
php artisan key:generate
```

### 6. Instalar dependencias frontend

```bash
npm install
```

### 7. Compilar recursos frontend

```bash
npm run dev
```

Para generar recursos optimizados:

```bash
npm run production
```

### 8. Ejecutar el proyecto

```bash
php artisan serve
```

El sitio estará disponible en:

```text
http://127.0.0.1:8000
```

---

## 🔐 Seguridad

Este repositorio contiene el código fuente del proyecto.

Por seguridad, los siguientes elementos no deben publicarse:

- Archivo `.env`.
- Credenciales de bases de datos.
- Claves privadas.
- Datos de acceso a servicios externos.
- Información confidencial de clientes.

---

## 🌍 Producción

El sitio web se encuentra publicado en:

**[https://norez-corp.com/](https://norez-corp.com/)**

---

## 👨‍💻 Autor

Desarrollado como proyecto de desarrollo web utilizando Laravel 8 y tecnologías web complementarias.

---

## 📄 Licencia

Este repositorio se publica con fines de documentación y presentación de un proyecto de desarrollo web.

El uso, distribución o reutilización del código debe respetar los derechos y licencias de los componentes, recursos y materiales incorporados al proyecto.
