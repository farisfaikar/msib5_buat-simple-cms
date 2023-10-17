import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// --- Custom JavaScript --- //

import { Dismiss } from 'flowbite';

const targetEl = document.getElementById('alert-success');
const triggerEl = document.getElementById('trigger-hide-alert-succes');

const dismiss = new Dismiss(targetEl, triggerEl);

setTimeout(() => {
  dismiss.hide();
}, 2000);
