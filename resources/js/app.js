import './bootstrap';

import './admin/common/modal';
import 'flowbite';
import axios from 'axios';
import { showNotification } from "./helpers/notification.js";

window.notify = showNotification;

// If you want lazy-load a page-specific JS
if (document.getElementById('users-page')) {
    import('./admin/users/index');
}
