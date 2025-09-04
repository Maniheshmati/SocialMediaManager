import './bootstrap';

import Alpine from 'alpinejs';

import './admin/common/modal';
import 'flowbite'
import axios from 'axios';
import { showNotification } from "./helpers/notification.js";

window.Alpine = Alpine;
window.notify = showNotification;

Alpine.start();

if (document.getElementById('users-page')) {
    import('./admin/users/index');
}
