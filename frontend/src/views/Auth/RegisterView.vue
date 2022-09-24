<template>
  <div class="container">
    <div class="row" v-if="!authStore.success">
      <div class="col-4 offset-4">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">
                  Hesap Oluştur!
                </h1>
              </div>
              <form @submit.prevent="authStore.registerUser()">
                <div class="mb-3 row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control" id="exampleFirstName" placeholder="Adı" v-model="authStore.registerData.first_name" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="exampleLastName" placeholder="Soyadı" spellcheck="false" data-ms-editor="true" v-model="authStore.registerData.last_name" required>
                  </div>
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" id="exampleInputTel" placeholder="Tel" spellcheck="false" data-ms-editor="true" v-model="authStore.registerData.tel" required>
                </div>
                <div class="mb-3">
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" spellcheck="false" data-ms-editor="true" v-model="authStore.registerData.email" required>
                </div>
                <div class="mb-3 row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control" id="exampleInputPassword" placeholder="Şifre" v-model="authStore.registerData.password" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control" id="exampleRepeatPassword2" placeholder="Şifre Tekrar" v-model="authStore.registerData.password_confirmation" required>
                  </div>
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" id="exampleInputCode" placeholder="Code" spellcheck="false" data-ms-editor="true" v-model="authStore.registerData.code" required>
                </div>
                <div v-if="authStore.errors" class="mb-3">
                    <p v-for="(error, index) in authStore.errors" :key="index" class="mb-1 text-danger">{{ error[0] }}</p>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Kayıt Ol</button>
                </div>
              </form>
              <hr>
              <div class="text-center">
                <RouterLink to="/login" class="small">Giriş Yap</RouterLink>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div v-else>
      <div class="row my-5">
        <div class="col-12">
          <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">İşlem Başarılı!</h4>
            <p>Hesap başarıyla oluşturuldu! Öğrenci bilgilerini görüntülemek için kayıt olduğunuz bilgiler ile giriş yapabilirsiniz...</p>
            <hr>
            <p class="mb-0"><RouterLink to="/login" class="alert-link">Giriş Yap</RouterLink></p>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>

<script setup>
import { useAuthStore } from "../../stores/authStore";
import router from "../../router";

const authStore = useAuthStore()

router.beforeEach(() => {
  authStore.$reset()
})
</script>