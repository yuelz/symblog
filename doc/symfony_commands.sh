
# Este comando funciona para descargar una versión de Symfony2 (2.1.3) y crear un proyecto con el framework. Descarga todos los vendors preconfigurados.
composer create-project symfony/framework-standar-edition myproject/ 2.1.3

# Este comando permite generar un nuevo bundle dentro del proyecto symfony2
php app/console generate:bundle --namespace=Symblogger/BlogBundle --format=yml

# Este comando permite que la función assets vincule correctamente los recursos
php app/console assets:install web

# comando que permite limpiar la caché
php app/console cache:clear

# 1.- Mapea la BD en un archivo yml
php app/console doctrine:mapping:convert yml ./src/Symblogger/BlogBundle/Resources/config/doctrine/metadata/orm --from-database --force

# 2.- Una vez generado el archivo yml de mapeo a la BD este comando permite generar las entidades(entities) correspondientes
php app/console doctrine:mapping:import SymbloggerBlogBundle annotation

# 3.- Este permite generar los getters y setters de las entidades
php app/console doctrine:generate:entities SymbloggerBlogBundle

# Esta tarea sólo crea la base de datos, esta no crea las tablas dentro de la base de datos. Si existe una base de datos con el mismo nombre, la tarea generará un error y la base de datos existente quedará intacta.
php app/console doctrine:database:create

# Para crear las tablas en nuestra base de datos, puedes ejecutar la siguiente tarea de Doctrine.
php app/console doctrine:schema:create

# Permite hacer carga de Datafixtures cuyos archivos de accesorios deben estar ubicados en el directorio DataFixtures/ORM/ dentro del bundle
php app/console doctrine:fixtures:load