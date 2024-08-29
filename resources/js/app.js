import "./bootstrap";
import $ from "jquery";
import "bootstrap";
import "flowbite";

window.$ = $;
window.jQuery = $;

import Alpine from "alpinejs";
import { formToJSON } from "axios";

window.Alpine = Alpine;
Alpine.start();
