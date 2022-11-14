import React from 'react'
import { render } from 'react-dom'
import { createInertiaApp } from '@inertiajs/inertia-react'
import { InertiaProgress } from '@inertiajs/progress';
import NProgress from 'nprogress';
import { Inertia } from '@inertiajs/inertia';

createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  setup({ el, App, props }) {
    render(<App {...props} />, el)
  },
});

InertiaProgress.init({
  delay: 250,
  color: '#29d',
  includeCSS: true,
  showSpinner: true,
});
Inertia.on('progress', (event) => {
  if (NProgress.isStarted() && event.detail.progress.percentage) {
      NProgress.set((event.detail.progress.percentage / 100) * 0.9)
  }
})
Inertia.on('finish', (event) => {
  if (event.detail.visit.completed) {
      NProgress.done()
  } else if (event.detail.visit.interrupted) {
      NProgress.set(0)
  } else if (event.detail.visit.cancelled) {
      NProgress.done()
      NProgress.remove()
  }
});