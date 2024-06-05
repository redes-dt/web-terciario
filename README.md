
# Proyecto Redes y Comunicación

Como proyecto elegimos la publicacion del modulo de inscripción de alumnos de la pagina web del terciario, el cual estamos desarrollando en Practica Profesionalizante 2, y como infraestructura elegimos desplegar en la nube de AWS una Instancia EC2,la cual hace de Front, y una base de datos RDS a la cual se conecta el Front.




## Instalación

Mediante consola, permitiendo el puerto 22 de ssh en la policy de seguridad en AWS, instalamos Nginx, como servidor web, y PHP con los siguientes comandos:

Primero actualizamos el servidor
```bash
sudo apt update
sudo apt upgrade
```
Instalamos Nginx
```bash
sudo apt install nginx
```
Permitimos la conexion de los puertos en el firewall, en este caso el puerto 80
```bash
sudo ufw allow 'Nginx HTTP'
```
Instalamos PHP
```bash
sudo apt install php-fpm php-mysql
```
Cargamos los archivos de nuestra web en la ruta, con WinSCP
```bash
cd /var/www/html
```
Cambiamos la propiedad de la carpeta a nuestro usuario
```bash
sudo chown -R $USER:$USER /var/www/html
```
Reiniciamos Nginx
```bash
sudo systemctl reload nginx
```
## Autores

- [@NicolasCoria](https://github.com/NicolasCoria)
- [@RoyMart24](https://github.com/RoyMart24)
- [@DrRichard0](https://github.com/DrRichard0)
- [@JuanmaVitti](https://github.com/JuanmaVitti)
- [@Fivan25](https://github.com/Fivan25)


## 



[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)

[![GPLv3 License](https://img.shields.io/badge/License-GPL%20v3-yellow.svg)](https://opensource.org/licenses/)

[![AGPL License](https://img.shields.io/badge/license-AGPL-blue.svg)](http://www.gnu.org/licenses/agpl-3.0)

