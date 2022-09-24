<script setup>
import { RouterLink, RouterView } from "vue-router"
import { useMainStore } from "./stores/mainStore"

const mainStore = useMainStore()

</script>

<template>
  <header class="bg-light shadow">
    <div class="container">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="#" style="padding: 20px 0">Education</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <RouterLink to="/" class="nav-link" active-class="active">ANASAYFA</RouterLink>
              </li>
              <li class="nav-item">
                <RouterLink to="/about" class="nav-link" active-class="active">HAKKIMIZDA</RouterLink>
              </li>
              <li class="nav-item">
                <RouterLink to="/contact" class="nav-link" active-class="active">İLETİŞİM</RouterLink>
              </li>
            </ul>
            <div v-if="!mainStore.isAuthenticated">
              <RouterLink to="/login" class="btn btn-success me-2">Giriş Yap</RouterLink>
              <RouterLink to="/register" class="btn btn-primary">Yeni Hesap</RouterLink>
            </div>
            <div v-if="mainStore.isAuthenticated">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <RouterLink to="/panel" class="nav-link">Üye Paneli</RouterLink>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link" @click.prevent="mainStore.logout()">Çıkış Yap</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <RouterView />
</template>

