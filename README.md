# Tv FlexDan

Plataforma de streaming demostrativa inspirada en Netflix, desarrollada con Laravel y Livewire.

## Descripción General

**Tv FlexDan** es una aplicación web diseñada para mostrar un catálogo dinámico de películas, series y canales de televisión argentinos. Es un proyecto de carácter **demostrativo** y educativo que busca replicar la experiencia de usuario (UX) y la estética visual de plataformas líderes como Netflix, enfocándose en la fluidez de la interfaz sin recargas de página.

---

## Tecnologías Utilizadas

El proyecto utiliza un stack moderno y eficiente:

- **Laravel 10+**: Core del backend.
- **Livewire v3/v4**: Para la interactividad en tiempo real sin salir de PHP.
- **Blade**: Motor de plantillas para la estructura base.
- **Tailwind CSS**: Para un diseño responsivo y estilizado (v3).
- **TMDB API**: Fuente de metadatos para películas y series.
- **Guzzle / Laravel HTTP Client**: Para el consumo de APIs externas.
- **Cache**: Implementación de almacenamiento temporal para optimizar el rendimiento y las cuotas de API.

---

## Funcionalidades Principales

- **Home Dinámica**: Banner principal con contenido en tendencia y carruseles por categoría.
- **Carruseles Livewire**: Navegación horizontal fluida para películas y series populares.
- **Catálogo Filtrable**: Listados completos de películas y series con filtros por género.
- **Vistas de Detalle**: Información completa, ratings, fechas de estreno y reparto principal.
- **Canales de TV Argentinos**: Grid interactivo con datos mockeados y detalles en modales con efecto glassmorphism.
- **Carga Asíncrona**: Navegación y filtrado instantáneo gracias a la potencia de Livewire.

---

## Requisitos Previos

Antes de comenzar, asegúrate de tener instalado:

- **PHP 8.1+**
- **Composer**
- **Node.js & npm**
- **Docker / Laravel Sail** (recomendado para el entorno local)

---

## Instalación del Proyecto

Sigue estos pasos para configurar el proyecto en tu entorno local:

1. **Clonar el repositorio:**
   ```bash
   git clone https://github.com/usuario/tv-flexdan.git
   cd tv-flexdan
   ```

2. **Instalar dependencias de PHP:**
   ```bash
   composer install
   ```
   o si usas Sail:
   ```bash
   ./vendor/bin/sail composer install
   ```

3. **Configurar el entorno:**
   ```bash
   cp .env.example .env
   ```

4. **Generar la clave de la aplicación:**
   ```bash
   php artisan key:generate
   ```

5. **Instalar dependencias de Frontend:**
   ```bash
   npm install
   ```

6. **Compilar assets:**
   ```bash
   npm run dev
   ```

---

## Levantar el Proyecto en Local

Si utilizas **Laravel Sail (Docker)**:
```bash
./vendor/bin/sail up -d
./vendor/bin/sail npm run dev
```

Si prefieres usar los servidores locales:
```bash
php artisan serve
npm run dev
```
La aplicación estará disponible en `http://localhost`.

---

## Variables de Entorno

El proyecto requiere configurar las siguientes variables en tu archivo `.env`:

```env
# Configuración de TMDB (Obligatoria para ver películas/series)
TMDB_API_KEY=tu_api_key_aqui
TMDB_BASE_URL=https://api.themoviedb.org/3
TMDB_IMAGE_BASE_URL=https://image.tmdb.org/t/p
TMDB_CACHE_TTL=7200
```
> [!IMPORTANT]  
> Sin una `TMDB_API_KEY` válida, las secciones de películas y series no mostrarán contenido real. Puedes obtener una gratis en [themoviedb.org](https://www.themoviedb.org).

---

## Estructura del Proyecto (Resumen)

- **`app/Services/TMDBService.php`**: Lógica central para interactuar con TMDB y manejo de caché.
- **`app/Livewire/`**: Contiene todos los componentes interactivos (Hero, Carousels, Grids, Details).
- **`app/Data/Channels.php`**: Fuente de datos estática para los canales de TV argentinos.
- **`resources/views/components/layouts/app.blade.php`**: Layout principal con diseño Dark Mode.
- **`tailwind.config.js`**: Configuración personalizada con colores de marca y fuentes.

---

## Uso de APIs Externas

Este proyecto utiliza la API de **The Movie Database (TMDB)** exclusivamente para la obtención de metadatos (pósters, sinopsis, reparto). 
- **No se realiza streaming de video.**
- Los enlaces o botones de "reproducir" son puramente estéticos o de carácter demostrativo.

---

## Consideraciones Legales

- **Fin Educativo**: Este proyecto fue creado con fines de aprendizaje y demostración técnica.
- **Sin Fines de Lucro**: No se debe utilizar para fines comerciales.
- **Derechos de Autor**: Todos los logotipos de canales y pósters de películas son propiedad de sus respectivos dueños.

---

## Próximas Mejoras

- [ ] Implementación de un sistema de "Mi Lista" (Watchlist) persistente en DB.
- [ ] Autenticación de usuarios y perfiles personalizados.
- [ ] Búsqueda global de contenido.
- [ ] Integración de trailers reales mediante embeds de YouTube.

---

## Autor / Créditos

- **Proyecto**: Tv FlexDan
- **Inspiración**: Netflix / Laravel Branding
- **Desarrollado con ❤️ usando Laravel y Livewire.**
