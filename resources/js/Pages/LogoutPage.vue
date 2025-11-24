<script setup>
import { Inertia } from '@inertiajs/inertia';

Inertia.post(route('logout'), {}, {
    onFinish: () => window.location.href = '/home'
});
</script>

<template>
  <div>
    Logging out...
  </div>
</template>