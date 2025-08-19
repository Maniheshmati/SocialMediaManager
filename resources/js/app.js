import './bootstrap';

import Alpine from 'alpinejs';

import './admin/common/modal';

window.Alpine = Alpine;

Alpine.start();

if (document.getElementById('users-page')) {
    import('./admin/users/index');
}
