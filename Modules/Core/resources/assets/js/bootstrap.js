/**
 * We include the Bootstrap library to leverage its responsive design
 * framework and pre-built UI components. Bootstrap simplifies the
 * process of creating visually appealing and consistent user interfaces.
 * Make sure to include Bootstrap stylesheets and scripts in your project.
 */

import 'bootstrap';

/**
 * We include the jQuery library to facilitate DOM manipulation and
 * simplify JavaScript event handling. jQuery provides a concise syntax
 * for interacting with the Document Object Model, making it easier to
 * develop dynamic and interactive features in our web application.
 * Note: Ensure jQuery is loaded before any scripts that depend on it.
 */

import jquery from 'jquery';
window.$ = jquery;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * This file contains the initialization of Editor.js and its tools.
 * Editor.js is a modern block-style editor.
 * The tools included are Header, List, and ImageTool.
 * They are made available globally in the window object.
 */

import EditorJS from "@editorjs/editorjs";
import Header from '@editorjs/header';
import Paragraph from '@editorjs/paragraph';
import List from '@editorjs/list';
import ImageTool from '@editorjs/image';
import CodeTool from '@editorjs/code';
import LinkTool from '@editorjs/link';
window.EditorJs = EditorJS;
window.Header = Header;
window.Paragraph = Paragraph;
window.List = List;
window.ImageTool = ImageTool;
window.CodeTool = CodeTool;
window.LinkTool = LinkTool;

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
//     wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });
