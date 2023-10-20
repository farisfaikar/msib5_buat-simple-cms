import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// --- Custom JavaScript --- //

import { Dismiss } from "flowbite";

// Dismiss
const targetDismiss = document.getElementById("alert-success");
const triggerDismiss = document.getElementById("trigger-hide-alert-succes");

const dismiss = new Dismiss(targetDismiss, triggerDismiss);

setTimeout(() => {
    dismiss.hide();
}, 2000);
