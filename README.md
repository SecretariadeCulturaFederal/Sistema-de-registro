# Sistema de Gestión de Contenidos (CMS) v2 - Laravel

El presente proyecto desarrollado en Laravel tiene como objetivo gestionar registros para una convocatoria específica. Proporciona un formulario de registro que recopila información personal y de proyecto, así como archivos adjuntos. Además, incluye funcionalidades como la generación de folios, el envío de correos electrónicos de confirmación y la gestión de usuarios y roles.

## Características Principales

### 1. Formulario de Registro Personalizable

- Ofrece un formulario de registro que recopila información personal y de proyecto.
- Permite la personalización de campos para adaptarse a las necesidades específicas de la convocatoria.

### 2. Generación de Folios

- Asigna automáticamente un número de folio único a cada registro.
- Facilita la búsqueda y seguimiento de los registros a través de los folios asignados.

### 3. Envío de Correos Electrónicos de Confirmación

- Envía correos electrónicos de confirmación a los usuarios después de la presentación de un formulario.
- Proporciona una comunicación eficiente y transparente con los registrantes.

### 4. Gestión de Usuarios y Roles

- Permite la creación de usuarios con roles personalizables.
- Controla el acceso a funciones específicas según el rol del usuario.

### 5. Almacenamiento Seguro de Archivos Adjuntos

- Ofrece un sistema de almacenamiento seguro para los archivos adjuntos proporcionados en los formularios.
- Garantiza la integridad y confidencialidad de los archivos cargados.



## Requerimentos

Asegúrate de que tu entorno cumple con los siguientes requisitos antes de comenzar la instalación:
- **PHP 8.0:** Debes tener PHP instalado y configurado en tu servidor web.
- **[Composer](https://getcomposer.org/)** para gestionar las dependencias de Laravel.
- Un **servidor web** compatible con Laravel, como Apache o Nginx.
- **Base de Datos**: Necesitarás una base de datos para almacenar los contenidos del CMS. Asegúrate de contar con una base de datos compatible con Laravel, como MySQL o PostgreSQL.




## Instalación
**Archivos**
- Copie el contenido de la carpeta `CMS` en tu servidor web.
   - Puedes instalar los archivos en la raíz de tu servidor o en una carpeta específica según tus preferencias.


**Instalacion de la base de de datos**
- Instale la base de datos con el script que se ubica dentro de la carpeta CMS_v2.

**Configuración del Archivo `.env`**

El archivo `.env` debe ser completado con los valores específicos de tu entorno local para que la aplicación funcione correctamente. 

**1. Edita el archivo `.env`**: Abre el archivo `.env` en tu editor de texto y completa los siguientes campos con la información específica de tu entorno local:
  
   - `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`: Establece los valores de tu base de datos local.
   - `MAIL_MAILER`, `MAIL_HOST`, `MAIL_PORT`, `MAIL_USERNAME`, `MAIL_PASSWORD`, `MAIL_ENCRYPTION`, `MAIL_FROM_ADDRESS`, `MAIL_FROM_NAME`: Configura la información de tu servidor de correo electrónico (SMTP) si es necesario.

**2. Valores sensibles**: Es fundamental que no compartas información sensible en repositorios públicos ni al compartir el proyecto con otros usuarios. Esto incluye contraseñas de bases de datos y credenciales de correo electrónico. Mantén estos valores confidenciales y no los incluyas en ningún archivo de código fuente o repositorio público.


## Acceso al CMS

Para poder acceder al CMS (tu-dominio/login) se ha creado un usuario y contraseña que se proporcionará mediante correo electrónico.

## Problemas y Soluciones Comunes

- Si encuentras problemas durante la instalación, asegúrate de revisar los registros de Laravel, que se encuentran en la carpeta `storage/logs`.


## Licencia

Este proyecto está bajo la [Licencia MIT](LICENSE).
