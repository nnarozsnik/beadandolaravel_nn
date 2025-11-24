<!-- resources/js/Components/LogoutButton.vue -->
<script setup>
import { Inertia } from '@inertiajs/inertia'

const logout = () => {
    Inertia.post(route('logout'), {}, {
        onFinish: () => window.location.href = '/home'
    })
}
</script>

<template>
  <button @click="logout" class="btn btn-link">Kijelentkezés</button>
</template>