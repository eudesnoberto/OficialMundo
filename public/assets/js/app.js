import Alpine from 'alpinejs'
import categorias from './categorias';
import subcategorias from './subcategorias';

window.Alpine = Alpine
categorias();
subcategorias();
Alpine.start();