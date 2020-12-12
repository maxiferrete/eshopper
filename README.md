1- clonar el repositorio git clone https://github.com/maxiferrete/eshopper.git
2- composer install
3- crear el archivo .env
4- crear el schema en workbench
5- ejecutar las migrations php artisan migrate
6- Ejecutar los seeders php artisan DB:seed --class=ConditionSeed
7- ejecutar los factories de Brand, Category, Subcategory desde tinker
	php artisan tinker
	Luego desde tinker ejecutar 
	$brand = new App\Models\Brand;
	$brand->createBrand();
	
	$cat = new App\Models\Category
	$cat->createCategory() 
	
	Las subcategorias se crean junto con las categorias.
	
8- ejecutar el server 
