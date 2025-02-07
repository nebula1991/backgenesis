import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import './bootstrap'; // Esto importa tu configuración predeterminada si la tienes


InertiaProgress.init();


createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
    return pages[`./Pages/Products/${name}.vue`];  // Asegúrate de que la ruta esté correcta
  },
  setup({ el, App, props }) {
    return createApp({ render: () => h(App, props) }).mount(el);
  },
});
