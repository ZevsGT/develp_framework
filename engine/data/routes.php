<?PHP 

return [

	'' => [
		'controller' => 'main',
		'action' => 'index',
	],

	'admin' => [
		'controller' => 'admin',
		'action' => 'index',
	],

	'cart/add' => [
		'controller' => 'cart',
		'action' => 'cartadd',
	],

	'cart/del' => [
		'controller' => 'cart',
		'action' => 'cartdel',
	],

	'orders' => [
		'controller' => 'cart',
		'action' => 'orders',
	],

	'admin/login' => [
		'controller' => 'admin',
		'action' => 'login',
	],

	'admin/product/add' => [
		'controller' => 'admin',
		'action' => 'product_add',
	],

	'admin/product/all' => [
		'controller' => 'admin',
		'action' => 'product_all',
	],

	'admin/product/edit/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'product_edit',
	],

	'admin/orders/all' => [
		'controller' => 'admin',
		'action' => 'orders_all',
	],

	'admin/orders/info/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'orders_info',
	],

	'account/login' => [
		'controller' => 'account',
		'action' => 'login',
	],


	'category/{name:\w+}' => [
		'controller' => 'category',
		'action' => 'category',
	],

];
?>