import './bootstrap';

import Alpine from 'alpinejs';

import './admin/common/modal';
import 'flowbite'
import axios from 'axios';

window.Alpine = Alpine;

Alpine.start();

if (document.getElementById('users-page')) {
    import('./admin/users/index');
}
