<template>
  <div class="container">
    <div class="row">
      <div class="col-4 offset-4">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Giriş Yap</h1>
            </div>
            <form @submit.prevent="authStore.loginUser()">
              <div class="mb-3">
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" spellcheck="false" data-ms-editor="true" v-model="authStore.loginData.email">
              </div>
              <div class="mb-3 ">
                <input type="password" class="form-control" id="exampleInputPassword" placeholder="Şifre" v-model="authStore.loginData.password">
              </div>
              <div v-if="authStore.errors" class="mb-3">
                <p v-for="(error, index) in authStore.errors" :key="index" class="mb-1 text-danger">{{ error[0] }}</p>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-success">
                  Giriş Yap
                </button>
              </div>
            </form>
            <hr>
            <div class="text-center">
              <RouterLink to="/register" class="small">Kayıt Ol</RouterLink>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useAuthStore } from "../../stores/authStore";

const authStore = useAuthStore()
</script>