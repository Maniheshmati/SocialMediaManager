import './bootstrap';

import Alpine from 'alpinejs';

import './admin/common/modal';
import 'flowbite'

window.Alpine = Alpine;

Alpine.start();

if (document.getElementById('users-page')) {
    import('./admin/users/index');
}
